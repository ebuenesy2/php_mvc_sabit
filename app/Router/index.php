<?php

class Route
{
    // URL Parçalama
    public static function parse_url()
    {
        $dirname = dirname($_SERVER['SCRIPT_NAME']);
        $dirname = $dirname != '/' ? $dirname : null;
        $request_uri = str_replace($dirname, '', $_SERVER['REQUEST_URI']);
        $request_uri = strtok($request_uri, '?'); // query string'i ayıkla
        return rtrim($request_uri, '/') ?: '/';
    }

    // URL Arama ve eşleştirme
    public static function searchForUrl($routes, $currentPath)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $postRaw = file_get_contents('php://input');
        $postJson = json_decode($postRaw, true);
        $postAll = $postJson ?? $_POST;

        $getUrl = [];

        foreach ($routes as $index => $route) {
            if ($route['method'] !== $method) continue;

            // Parametreli route'ları eşleştirmek için
            $pattern = preg_replace('/:\w+/', '([^\/]+)', $route['path']);
            $pattern = "@^" . $pattern . "$@";

            if (preg_match($pattern, $currentPath, $matches)) {
                array_shift($matches);

                // parametreleri al
                preg_match_all('/:([\w]+)/', $route['path'], $paramKeys);
                if (!empty($paramKeys[1])) {
                    foreach ($paramKeys[1] as $i => $key) {
                        $getUrl[$key] = $matches[$i] ?? null;
                    }
                }

                return [
                    'id' => $index,
                    'url' => $currentPath,
                    'method' => $method,
                    'status' => 1,
                    'postAll' => $method == 'POST' ? $postAll : [],
                    'getUrl' => $getUrl
                ];
            }
        }

        return [
            'id' => null,
            'url' => $currentPath,
            'method' => $method,
            'status' => 0,
            'postAll' => [],
            'getUrl' => []
        ];
    }

    // Router çalıştır
    public static function run()
    {
        require 'router.php';
        require 'app/error/index.php';

        $uri = self::parse_url();
        $result = self::searchForUrl($routes, $uri);

        //echo "uri: "; echo $uri; die();
        //echo "<pre>"; print_r($result); die();

        if ($result['status'] == 1) {
            $route = $routes[$result['id']];

            //echo "<pre>";  print_r($route); die();

            $controllerName = $route['controller'];
            $methodName = $route['controller_method'] ?? 'index';

            $controllerFile = 'controllers/' . $controllerName . '.php';

            if (file_exists($controllerFile)) {
                require_once $controllerFile;

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    if (method_exists($controller, $methodName)) {
                        //$params = $route['method'] == 'POST' ? $result['postAll'] : $result['getUrl'];
                        $params = $result;
                        call_user_func([$controller, $methodName], $params);
                    } else { errors::notFound("Metot bulunamadı",$methodName); die();  }
                } elseif (function_exists($controllerName)) {
                    // Eğer bu bir fonksiyonsa (sınıf değil)
                    //$params = $route['method'] == 'POST' ? $result['postAll'] : $result['getUrl'];
                    $params = $result;
                    call_user_func($controllerName, $params);
                } else { errors::notFound("Controller bulunamadı",$controllerName); die();  }
            } else { errors::notFound("Controller dosyası yok",$controllerFile); die(); }
        } else {  errors::notFound("Route bulunamadı",$uri); die();  }
    }
}
