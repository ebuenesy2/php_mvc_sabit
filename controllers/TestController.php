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
        
        $page = isset($_GET["page"]) ? $_GET["page"] : 1; //! Sayfa Sayısı
        $rowcount = isset($_GET["rowcount"]) ? $_GET["rowcount"] : 1; //! Sayfa Başı Gösterecek Veri
        $order = isset($_GET["order"]) ? $_GET["order"] : 1; //! Sıralama [desc => Büyükten Küçüğe ] [asc => Küçükten Büyüğe ]
        //echo "rowcount:"; echo $rowcount; die();
        

        //! Veri Tabanı İşlemleri
        $DB = DB::table(self::$tableName); //! Tablo
        $DB_Count = $DB->count(); //! Sayısı


        $DB = $DB->orderBy('id', $order); //! Sıralama



        $DB_Get = $DB->get(); //! Veri Çekme

        echo "<pre>"; print_r($DB_Get); die(); //! Tüm Params


        //! Toplam Sayfa
        
       

        $test = DB::table(self::$tableName)
            //->join('users', 'test.created_byId', '=', 'users.id')
            //->select('test.id', 'test.title', 'users.name as user_name','users.departman')
            //->where('test.deleted_status', '=', 0)
            ->orderBy('test.id', 'ASC')
            //->limit($perPage)
            //->offset($offset)
            ->get(true); // true = JSON olarak döner

        print_r($test); die();
        
    }

}
