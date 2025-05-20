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

        print_r($req); die();

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
