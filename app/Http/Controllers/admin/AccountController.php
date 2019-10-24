<?php

namespace App\Http\Controllers\admin;

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
       $controllers =  DB::table('controllers')->get();
//       $related = DB::table('controller_role');

        $test = new Controller();
        $test =  $test->reletedRoles();
        dump($test);die;
//        $controllers
//        $controllers = [];
//        foreach (Route::getRoutes()->getRoutes() as $route)
//        {
//            $action = $route->getAction();
//            if (array_key_exists('controller', $action))
//            {
//                $controllers[] = $action['controller'];
//            }
//        }

            dump($controllers[0]);die;
        return view('admin.closePage',['roles'=>$roles,'controllers'=>$controllers]);
    }
}
