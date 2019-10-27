<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use App\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }

    public function closePage(Request $request){


        if($request->getMethod()=="POST"){

            array_filter ($request->request->all(),function ($v){
                if($v!='_token') {
                    $v = preg_split("/__/", $v, 2);
                    DB::table('controller_role')
                        ->updateOrInsert(
                            ['controller_id' => $v[0],'role_id'=>$v[1]],
                            ['role_id' => $v[1],'check'=>1]
                        );
                }
            },ARRAY_FILTER_USE_KEY );

            DB::table('controller_role')->where('check', '=', 0)->delete();
            DB::table('controller_role')->where('check', '=', 1)->update(['check' => 0]);

            $request->session()->flash('success', 'Access to controllers updated successfully!');

            return redirect()->route('closePage');
        }
       $roles =  DB::table('roles')->get()->toArray();
        $controllers = Controller::All();

        return view('admin.closePage',['roles'=>$roles,'controllers'=>$controllers]);
    }
}
