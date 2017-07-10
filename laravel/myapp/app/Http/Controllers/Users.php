<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Users extends Controller
{

    public function index()
    {
        /*$users = new User();
        echo $users->all();*/

        $users = new User();
        //echo 'here in controller';exit();
        $user_data['users'] = $users->viewAllUsers();
        return view('register/manage', $user_data);
    }

    public function add()
    {
        return view('register/add');
    }

    public function save(Request $request)
    {
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->number = $request->input('number');
        $saved = $users->save();
        if ($saved)
        echo 'data saved';
    }

    public function view($id)
    {
        $users = new User();
        $user_data['data'] = $users->find($id);
        return view('register/view', $user_data);
    }

    public function edit($id)
    {
        $users = new User();
        $user_data['data'] = $users->find($id);
        return view('register/edit', $user_data);
    }

    public function update($id)
    {
        $users = new User();
        $user_data = $users->find($id);
        $user_data->name = 'ahsan';
        $updated = $user_data->update();
        exit();
    }

    public function delete($id)
    {
        $users = new User();
        //$users->customFunction();
        $user_data = $users->find($id);
        $user_data->delete();
        exit();
        /*if ($users->customFunction())
            echo 'deleted';
        exit();*/
    }


    public function viewAll()
    {
        $users = new User();
        //echo 'here in controller';exit();
        $user_data['users'] = $users->viewAllUsers();
        return view('register/manage', $user_data);
    }


    public function customFuncController($id)
    {
        $users = new User();
        //echo 'here in controller';exit();
        return $users->customFunction($id);
    }

    public function viewSingle($id)
    {
        $users = new User();
        //echo 'here in controller';exit();
        return $users->viewSingle($id);
    }


    public function customSave(Request $request)
    {
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->number = $request->input('number');
        $data['name'] = $users->name;
        $data['email'] = $users->email;
        $data['number'] = $users->number;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $users->customSave($data);
        return redirect('users');

        // To retun to saome named route in routes file:
        // return redirect()->route('login');
    }

    public function customUpdate(Request $request)
    {
        $users = new User();
        $id = $request->input('id');
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->number = $request->input('number');
        $data['name'] = $users->name;
        $data['email'] = $users->email;
        $data['number'] = $users->number;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $users->customUpdate($data, $id);
        return redirect('users');

        // To retun to saome named route in routes file:
        // return redirect()->route('login');
    }

    public function customDeleteSingle($id)
    {
        $users = new User();
        $users->customDeleteSingle($id);
        return redirect('users');
        // To retun to saome named route in routes file:
        // return redirect()->route('login');
    }

    public function customDeleteAll()
    {
        $users = new User();
        return $users->customDeleteAll();
    }


}
