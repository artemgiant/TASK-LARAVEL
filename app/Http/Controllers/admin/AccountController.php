<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use App\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{

    public function index(){
        return view('admin.pages');
    }
    public function openPage(){

        return view('admin.openPage');
    }
    public function closePage(Request $request){
        if($request->getMethod()=="POST"){
          dump(  $request->request->all());

            array_filter ($request->request->all(),function ($v){
                if($v!='_token') {
                    $v = preg_split("/__/", $v, 2);
                    DB::table('controller_role')
                        ->updateOrInsert(
                            ['controller_id' => $v[0]],
                            ['role_id' => $v[1],'check'=>1]
                        );
                }
            },ARRAY_FILTER_USE_KEY );

            DB::table('controller_role')->where('check', '=', 0)->delete();
            DB::table('controller_role')->where('check', '=', 1)->update(['check' => 0]);

            return redirect()->route('closePage');
        }
       $roles =  DB::table('roles')->get()->toArray();
        $controllers = Controller::All();

        return view('admin.closePage',['roles'=>$roles,'controllers'=>$controllers]);
    }
}
