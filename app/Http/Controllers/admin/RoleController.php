<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function listRoleAction(Request $request){
        $roles = Role::all();
        return view('admin.openPage',['roles'=>$roles]);
    }
    public function createRole(Request $request){

        if($request->getMethod()=="POST"){

            $data =   $request->request->all();

            $this->validate($request, [ 'name' => 'required|unique:roles']);
            $user = User::find(['email'=>$data['users']])->first();
            $role =  new Role();
            $role->name =  mb_strtoupper($data['name']);
            $role->description  = $data['name']??'';
            $role->save();
            if(!empty($user))$role->users()->attach($user);
            $request->session()->flash('success', 'Role updated successfully!');

            return redirect()->route('listRole');

        }
        $users = User::all();
        $data = array('');
        if(!empty($users)){
            foreach ($users as $user){
                $data[] =$user->email;
            }
        }
        return view('admin\role\createRole',['users'=>$data]);
    }

}
