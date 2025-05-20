<?php

require 'app/function/Database.php'; //! Mysql

class TestController
{
    public function home($req = [])
    {
        echo "Mysql Anasayfa GET<br>";
    }

    public function all($req = [])
    {
        
        $test = DB::table('test')
            ->join('users', 'test.created_byId', '=', 'users.id')
            ->select('test.id', 'test.title', 'users.name as user_name','users.departman')
            //->where('test.deleted_status', '=', 0)
            ->orderBy('id', 'ASC')
            //->limit($perPage)
            //->offset($offset)
            ->get(true); // true = JSON olarak döner

        print_r($test);
        
        
    }

}
