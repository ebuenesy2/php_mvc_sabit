<?php

require 'app/function/Database.php'; //! Mysql


class TestController
{

    private static $tableName = "test"; //! Sql Tablo Name

    public function home($req = [])
    {
        //! Return
        $return = array(
            'title'=> 'Anasayfa Get - api - Mysql - Php',
            'table'=> self::$tableName,
            'status' => 1,
            'msg' => 'Anasayfa',
            'size' => 0,
            'DB'=> [],
        );
        
        echo json_encode($return);
        
    }

    public function all($req = [])
    {

        //! Params Okuma
        //echo "<pre>"; print_r($_GET); die(); //! Tüm Params
        
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;           // Sayfa numarası
        $rowcount = isset($_GET["rowcount"]) ? (int)$_GET["rowcount"] : null; // Sayfa başı gösterilecek veri
        $order = isset($_GET["order"]) ? $_GET["order"] : 'asc';           // Sıralama (asc | desc)
        //echo "rowcount:"; echo $rowcount; die();

        //! Güvenlik & Varsayılan Ayar
        $page = max($page, 1); // 0 ve negatif sayfalara karşı koruma
        $rowcount = max($rowcount, 1);
        $order = strtolower($order) === 'desc' ? 'desc' : 'asc'; // Sadece asc veya desc kabul edilir

        //! Sayfalama Hesabı
        $offset = ($page - 1) * $rowcount;

        //! Veri Tabanı İşlemleri
        $DB = DB::table(self::$tableName); //! Tablo
        $DB_Count = $DB->count(); //! Toplam Sayısı

        if( isset($_GET["rowcount"])  ) { $DB = $DB->limit($rowcount)->offset($offset); }  //! Sayfalandırma

        $DB = $DB->orderBy('id', $order); //! Sıralama
        $DB_Get = $DB->get(true); //! Veri Çekme
        $DB_Get = json_decode($DB_Get); //! Json Verisine Dönüştür
        //echo "<pre>"; print_r($DB_Get); die(); //! Tüm Params

        //! Toplam Sayfa Hesabı
        $Total_Page = ceil($DB_Count / $rowcount);

        
        //! Return
        $return = array(
            'title'=> 'Tüm Veriler - Test',
            'table'=> self::$tableName,
            'status' => 1,
            'msg' => 'Anasayfa',
            'size' => count($DB_Get),
            'size_total' => $DB_Count,
            'total_page' => $Total_Page,
            'now_page' => $page,
            'rowcount' => $rowcount,
            'order' => $order,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);
        
    }

    public static function find($req = null){
        echo "Controller find"; echo "<br>";echo "<br>";

        
        //! Tüm veriler
        //echo "<pre>"; print_r($req); die();
        echo "id: "; echo $req['id']; //! Tek Veri Okuma
    }

    public static function find_post($req = null){
        echo "Controller Test Post"; echo "<br>";

        //! Post Okuma
        //echo "<pre>"; print_r($req); // Tüm POST verileri
        //echo "name: " . $req['name'];  // Tekil veri


        //! Json
        $postJson = json_encode($req); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor

        echo "<pre>"; print_r($data);         // tüm veri
        //echo "name: "; echo $data->name ?? 'yok';           // eğer array içindeki object varsa
        //echo $data[0]->id ?? 'yok';           // eğer array içindeki object varsa

    }

    public static function add($req = null){
        echo "Controller Add"; echo "<br>";

        //! Post Okuma
        //echo "<pre>"; print_r($req); // Tüm POST verileri
        //echo "name: " . $req['name'];  // Tekil veri


        //! Json
        $postJson = json_encode($req); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor

        echo "<pre>"; print_r($data);         // tüm veri
        //echo "name: "; echo $data->name ?? 'yok';           // eğer array içindeki object varsa
        //echo $data[0]->id ?? 'yok';           // eğer array içindeki object varsa

    }
    

}
