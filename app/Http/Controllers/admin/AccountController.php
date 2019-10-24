<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use App\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class AccountController extends Controller
{

    public function index(){
        return view('admin.pages');
    }
    public function openPage(){

        return view('admin.openPage');
    }
    public function closePage(){
       $roles =  DB::table('roles')->get()->toArray();
        $controllers = Controller::All();

        return view('admin.closePage',['roles'=>$roles,'controllers'=>$controllers]);
    }
}
