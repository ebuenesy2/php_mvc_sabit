<?php

require 'app/function/Database.php'; //! Mysql


class TestController
{
    public function home($req = [])
    {
        $return = {
            'title': 'Anasayfa Get - api - Mysql - Php',
            'table': 'test',
            'status': 1,
            'msg': 'Anasayfa',
            'size': 0,
            'DB': [],
        }

        
    }

    public function all($req = [])
    {
        
        $test = DB::table('test')
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
