<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public function customFunction($id)
    {
        echo $id;
        echo 'here in model';exit();
    }

    public function customSave($data)
    {
        $id = DB::table('users')->insertGetId($data);
        return $id;
    }

    public function viewAllUsers()
    {
        $users = DB::table('users')->select('*')->get();
        //$users = DB::table('users')->select('name', 'number')->get();
        return $users;
    }


    public function viewSingle($id)
    {
        $returnArr = array();
        $user = DB::table('users')->where('id', $id)->first();
        $returnArr['name'] = $user->name;
        $returnArr['email'] = $user->email;
        $returnArr['number'] = $user->number;
        echo '<pre>';print_r($returnArr);exit();
    }

    public function customUpdate($data, $id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public function customDeleteSingle($id)
    {
        DB::table('users')->where('id', $id)->delete();
    }

    public function customDeleteAll()
    {
        DB::table('users')->delete();

    }

    public function truncateTable()
    {
        DB::table('users')->truncate();
    }

    public function checkIfAlreadyExist($email)
    {
        $returnArr = array();
        $user = DB::table('users')->where('email', $email)->first();
        if ($user)
        {
            return true;
        }else{
            return false;
        }
    }

}
