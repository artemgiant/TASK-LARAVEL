<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
       $users =  DB::table('roles')->get();

        $controllers = [];
        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();
            if (array_key_exists('controller', $action))
            {
                $controllers[] = $action['controller'];
            }
        }

        return view('admin.closePage',['users'=>$users,'controllers'=>$controllers]);
    }
}
