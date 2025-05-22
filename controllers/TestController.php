<?php

require 'app/function/Database.php'; //! Mysql


class TestController
{

    private static $tableName = "test"; //! Sql Tablo Name

    public static function home($req = [])
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

    public static function all($req = [])
    {

        //! Params Okuma
        //echo "<pre>"; print_r($_GET); die(); //! Tüm Params
        
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;           // Sayfa numarası
        $rowcount = isset($_GET["rowcount"]) ? (int)$_GET["rowcount"] : null; // Sayfa başı gösterilecek veri
        $order = isset($_GET["order"]) ? $_GET["order"] : 'desc';           // Sıralama (asc | desc)
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
            'title'=> 'Tüm Veriler',
            'table'=> self::$tableName,
            'status' => $DB_Get ? 1 : 0,
            'msg' => $DB_Get ? 'Veri Listelendi' : 'Veri Yok',
            'size_total' => $DB_Count,  
            'size' => count($DB_Get),
            'total_page' => $Total_Page,
            'now_page' => $page,
            'rowcount' => $rowcount,
            'order' => $order,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);
        
    }

    public static function find($req = null){
        //echo "Controller find"; echo "<br>";echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Gelen Veriler
        $getUrl = $req['getUrl'];
        //echo "<pre>"; print_r($getUrl);  // Tüm Veriler        

        //! Hangi Veri
        $id = intval($getUrl['id']);
        //echo "id: " . $id;  // Tekil Veri

        //! Veri Tabanı İşlemleri - Arama
        $DB= DB::table(self::$tableName)->where('id', '=', $id); //! Tablo
        $DB_Get= $DB->first() ?? []; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();

        //! Veri Tabanı İşlemleri - Arama - Son


        //! Return
        $return = array(
            'title'=> 'Veri Arama',
            'table'=> self::$tableName,
            'status' => $DB_Get ? 1 : 0,
            'msg' => $DB_Get ? 'Veri Bulundu' : 'Veri Bulunamadı',
            'id' => $id,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);
    }

    public static function find_post($req = null){
        //echo "Controller Find Post"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler


        //! Hangi Veri
        $id = intval($postAll['id']);
        //echo "id: " . $id;  // Tekil Veri

        //! Veri Tabanı İşlemleri - Arama
        $DB= DB::table(self::$tableName)->where('id', '=', $id); //! Tablo
        $DB_Get= $DB->first() ?? []; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();

        //! Veri Tabanı İşlemleri - Arama - Son


        //! Return
        $return = array(
            'title'=> 'Veri Arama',
            'table'=> self::$tableName,
            'status' => $DB_Get ? 1 : 0,
            'msg' => $DB_Get ? 'Veri Bulundu' : 'Veri Bulunamadı',
            'id' => $id,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);

    }
    
    public static function find_multi_post($req = null){
        //echo "Controller Find Post"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

       //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll); die(); // Tüm Veriler 

        //! Hangi Veriler
        $ids = $postAll['ids']; //! "68,65,64";
        $idArray = explode(',', $ids); // ['68', '65', '64']
        //echo "<pre>"; print_r($idArray); die(); // Hangileri
        
        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor
        //echo "<pre>"; print_r($data); die();

        //! Veri Tabanı İşlemleri - Güncelle
        $DB= DB::table(self::$tableName)->whereIn('id', $idArray); //! Tablo
        $DB_Get= $DB->get() ?? null; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();


        //! Return
        $return = array(
            'title'=> 'Veri Arama',
            'table'=> self::$tableName,
            'status' => $DB_Get ? 1 : 0,
            'msg' => $DB_Get ? 'Veri Bulundu' : 'Veri Bulunamadı',
            'ids' => $idArray,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);

    }
    
    public static function find_user($req = null){
        //echo "Controller Find User Post"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler

        //! Hangi Veri
        $created_byId = intval($postAll['created_byId']);
        //echo "created_byId: " . $created_byId;  // Tekil Veri

        //! Gelen Veriler Son


        //! Params
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;           // Sayfa numarası
        $rowcount = isset($_GET["rowcount"]) ? (int)$_GET["rowcount"] : null; // Sayfa başı gösterilecek veri
        $order = isset($_GET["order"]) ? $_GET["order"] : 'desc';           // Sıralama (asc | desc)
        //echo "rowcount:"; echo $rowcount; die();

        //! Güvenlik & Varsayılan Ayar
        $page = max($page, 1); // 0 ve negatif sayfalara karşı koruma
        $rowcount = max($rowcount, 1);
        $order = strtolower($order) === 'desc' ? 'desc' : 'asc'; // Sadece asc veya desc kabul edilir

        //! Sayfalama Hesabı
        $offset = ($page - 1) * $rowcount;

        //! Veri Tabanı İşlemleri
        $DB = DB::table(self::$tableName); //! Tablo
        $DB = $DB->where('created_byId', '=', $created_byId); //! Arama
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
            'title'=> 'Tüm Veriler',
            'table'=> self::$tableName,
            'created_byId' => $created_byId,
            'status' => $DB_Get ? 1 : 0,
            'msg' => $DB_Get ? 'Veri Listelendi' : 'Veri Yok',
            'size_total' => $DB_Count,  
            'size' => count($DB_Get),
            'total_page' => $Total_Page,
            'now_page' => $page,
            'rowcount' => $rowcount,
            'order' => $order,
            'DB'=> $DB_Get,
        );
        
        echo json_encode($return);

        //! ---

    

        
        //! Veri Tabanı İşlemleri - Arama
        $DB= DB::table(self::$tableName)->where('created_byId', '=', $created_byId); //! Tablo
        $DB_Get= $DB->get() ?? []; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();

        //! Veri Tabanı İşlemleri - Arama - Son




    }

    public static function add($req = null){
        //echo "Controller Add"; echo "<br>";

        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler

        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor
        //echo "<pre>"; print_r($data); die();

        //! Veri Tabanı İşlemleri - Kaydet
        $insert_Id = DB::table(self::$tableName)->insertGetId([
            'name' => $data->name ?? null,
            'surname' => $data->surname ?? null,
            'created_byId' => $data->created_byId ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        //! Veri Tabanı İşlemleri - Kaydet - Son


        //! Return
        $return = array(
            'title'=> 'Veri Ekleme',
            'table'=> self::$tableName,
            'status' => 1,
            'msg' => 'Veri Eklendi',
            'insert_Id' => intval($insert_Id),
        );
        
        echo json_encode($return);

    }

    public static function delete($req = null){
        //echo "Controller delete"; echo "<br>";
        //echo "<pre>"; print_r($req);  // Tüm Veriler

        //! Gelen Veriler
        $postAll = $req['postAll'];
        $getUrl = $req['getUrl'];
        //echo "<pre>"; print_r($getUrl);  // Tüm Get Veriler

        $id = intval($getUrl['id']);
        //echo "id: " . $id;  // Tekil Veri

        //! Veri Tabanı İşlemleri - Sil
        $DB= DB::table(self::$tableName); //! Tablo
        $deleteControl= DB::table(self::$tableName)->where('id', '=', $id)->delete();
        
        //! Return
        $return = array(
            'title'=> 'Veri Sil',
            'table'=> self::$tableName,
            'status' => $deleteControl ? 1 : 0,
            'msg' => 'Veri Silindi',
            'id' => $id,
        );
        
        echo json_encode($return);

    }
    
    public static function multi_delete($req = null){
        //echo "Controller multi_delete"; echo "<br>";
        //echo "<pre>"; print_r($req);  die(); // Tüm Veriler

        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll);  // Tüm Get Veriler
        
        //! Hangi Veriler
        $ids = $postAll['ids']; //! "68,65,64";
        $idArray = explode(',', $ids); // ['68', '65', '64']
        echo "<pre>"; print_r($idArray); die(); // Hangileri

        //! Veri Tabanı İşlemleri - Sil
        $deleteControl = DB::table(self::$tableName)->whereIn('id', $idArray)->delete();
        
        //! Return
        $return = array(
            'title'=> 'Veri Sil',
            'table'=> self::$tableName,
            'status' => $deleteControl ? 1 : 0,
            'msg' => 'Veri Silindi',
            'ids' => $idArray,
        );
        
        echo json_encode($return);

    }
    
    public static function edit($req = null){
        //echo "Controller edit"; echo "<br>";
        //echo "<pre>"; print_r($req);  die(); // Tüm Veriler

        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll);  // Tüm Veriler 
        
        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor
        //echo "<pre>"; print_r($data); die();

        //! Hangi Veri
        $id = intval($postAll['id']);
        //echo "id: " . $id;  // Tekil Veri

        //! Veri Tabanı İşlemleri - Güncelle
        $DB= DB::table(self::$tableName)->where('id', '=', $id); //! Tablo
        $DB_Get= $DB->first() ?? null; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();
        
        //! Güncelleme 
        $updateControl= 0;

        if($DB_Get) {
            $updateControl= $DB->update([
                'name' => $data->name,
                'surname' => $data->surname,
                'updated_status' => 1,
                'updated_byId' => $data->updated_byId,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        //! Veri Tabanı İşlemleri - Güncelle - Son


        //! Return
        $return = array(
            'title'=> 'Veri Güncelle',
            'table'=> self::$tableName,
            'status' => $updateControl ? 1 : 0,
            'msg' => $updateControl ?  'Veri Güncellendi' : 'Veri Güncellenemedi',
            'id' => $id,
        );
        
        echo json_encode($return);

    }

    public static function edit_delete($req = null){
        //echo "Controller edit_delete"; echo "<br>";
        //echo "<pre>"; print_r($req);  die(); // Tüm Veriler


        //! Gelen Veriler
        $postAll = $req['postAll'];
        //echo "<pre>"; print_r($postAll); die(); // Tüm Veriler 

        //! Hangi Veriler
        $ids = $postAll['ids']; //! "68,65,64";
        $idArray = explode(',', $ids); // ['68', '65', '64']
        //echo "<pre>"; print_r($idArray); die(); // Hangileri
        
        $postJson = json_encode($postAll); // JSON string
        $data = json_decode($postJson); // Tekrar decode edip eriş sonra objesi oluşturuyor
        //echo "<pre>"; print_r($data); die();

        //! Veri Tabanı İşlemleri - Güncelle
        $DB= DB::table(self::$tableName)->whereIn('id', $idArray); //! Tablo
        $DB_Get= $DB->get() ?? null; //! Veri Var Mı Kontrol Ediyor
        //echo "<pre>"; print_r($DB_Get); die();
 
        
        //! Güncelleme 
        $updateControl= 0;

        if($DB_Get) {
            $updateControl= $DB->update([
                'deleted_status' => 1,
                'deleted_byId' => $data->deleted_byId,
                'deleted_at' => date('Y-m-d H:i:s'),
                'updated_status' => 1,
                'updated_byId' => $data->deleted_byId,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        //! Veri Tabanı İşlemleri - Güncelle - Son


        //! Return
        $return = array(
            'title'=> 'Veri Güncelle',
            'table'=> self::$tableName,
            'status' => $updateControl ? 1 : 0,
            'msg' => $updateControl ?  'Veri Güncellendi' : 'Veri Güncellenemedi',
            'ids' => $idArray,
        );
        
        echo json_encode($return);

    }
    

}
