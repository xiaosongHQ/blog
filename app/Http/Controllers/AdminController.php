<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
    	return view('admin');
    }

    public function create_set(){

    	if(count(Set::all())>0){
    		$sets = Set::findOrFail(1);
    	}else{
    		$sets = false;
    	}

    	return view('/set/create',['sets'=>$sets]);
    }

    public function set(){
    	if(count(Set::all())>0){
    		$set = Set::findOrFail(1);
    	}else{
    		$set = new Set;
    	}
    	$set -> name = request() -> name;
    	$set -> join = request() -> join;
    	$set -> content = request() -> content;
    	$set -> url = request() -> url;
    	$set -> down = request() -> down;
    	$set -> banquan = request() -> banquan;
    	if($set->save()){
    		return redirect('/admin/set')->with('true','设置已成功生效');
    	}else{
    		return redirect('/admin/set')->with('false','设置失败');
    	}
    }

    public function login(){
        return view('/admin/login');
    }

    public function dologin(){
        $users = User::where('name', request()->name)->first();

        if(!$users){
            return back()->with('error','登陆失败!');
        }
         if(Hash::check(request()->password, $users->password)){
             session(['username'=>$users->name, 'id'=>$users->id]);
             return redirect('/admin/index')->with('true','登陆成功');
         }else{
             return back()->with('false','登陆失败!');
         }
    }

    public function loginout(){
        request()->session()->flush();
        return redirect('/admin/login')->with('false','退出成功');
    }
}
