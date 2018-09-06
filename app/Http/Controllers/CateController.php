<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Cate::where('name','like','%'.request()->key.'%')->get();
        return view('/cate/list',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/cate/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Cate;
        $cate->name = $request->name;
        if($cate->save()){
            return redirect('/cate')->with('true','添加成功');
        }else{
            return back('/cate')->with('false','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cates = cate::findOrFail($id);
        return view('/cate/edit',['cates'=>$cates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cates = Cate::findOrFail($id);
        $cates -> name = $request -> name;
        if($cates->save()){
            return redirect('/cate')->with('true','更新成功');
        }else{
            return back('/cate')->with('true','更新失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cates = Cate::findOrFail($id);
        if($cates->delete()){
            return redirect('/cate')->with('true','删除成功');
        }else{
            return redirect('/cate')->with('false','删除失败');
        }

    }
}
