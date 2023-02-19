<?php

namespace App\Controllers;

use App\Core\Controller;
use App\core\Validator;
use App\Core\QueryBuilder as DB;

class UsersController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        $this->response(200, [
            'message' => 'Data Users',
            'total' => count($users),
            'data' => $users
        ]);
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->get();

        if ($user) {
            $this->response(200, [
                'message' => 'Data User',
                'total' => count($user),
                'data' => $user
            ]);
        } else {
            $this->response(404, [
                'massage' => 'User not found'
            ]);
        }
    }

    public function store()
    {
        DB::table('users')->join('roles', 'users.role_id', '=', 'roles.id');

        $name = $this->input->post('name');
        $no_telp = $this->input->post('no_telp');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role_id = $this->input->post('role_id');

        $validator = Validator::validate([
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ], [
            'username' => $username,
            'password' => $password,
        ]);

        if ($validator->fails()) {
            $this->response(400, [
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        DB::table('users')->insert([
            'name' => $name,
            'no_telp' => $no_telp,
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id
        ]);
        $user = DB::table('users')->where('username', $username)->first();

        if ($user) {
            $this->response(201, [
                'message' => 'User created',
                'data' => $user
            ]);
        } else {
            $this->response(409, [
                'message' => 'User already exists'
            ]);
        }
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $no_telp = $this->input->post('no_telp');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $role_id = $this->input->post('role_id');

        $user = DB::table('users')->where('id', $id)->first();

        if ($user) {
            DB::table('users')->where('id', $id)->update([
                'name' => $name,
                'no_telp' => $no_telp,
                'username' => $username,
                'password' => $password,
                'role_id' => $role_id
            ]);
            $this->response(201, [
                'message' => 'User Updated',
                'data' => $user
            ]);
        } else {
            $this->response(404, [
                'message' => 'User not found'
            ]);
        }
    }

    public function destroy($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        if ($user) {
            DB::table('users')->where('id', $id)->delete('id', $id);
            $this->response(200, [
                'message' => 'User deleted',
                'data' => $user
            ]);
        } else {
            $this->response(404, [
                'message' => 'User not found'
            ]);
        }
    }
}
