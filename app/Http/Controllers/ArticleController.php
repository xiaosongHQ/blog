<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Cate;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $articles = Article::orderBy('id','asc')
            ->where('content','like', '%'.request()->key.'%')
            ->paginate(8);
        return view('/article/list',['articles'=>$articles]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $cates = Cate::all();
        return view('/article/create',['tags'=>$tags,'cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $articles = new Article;
        $articles -> name = request() -> name;
        $articles -> join = request() -> join;
        $articles -> cate_id = request() -> cate_id;
        $articles -> content = request() -> content;
        $articles -> tag_id = 1;
        $articles -> user_id = 1;
        if($request->hasFile('img')){
            $articles -> img = '/'.request()->img->store('uploads/'.date('Ymd'));
        }else{
            return back()->with('false','必须上传图片');
        }
        DB::beginTransaction();//开启事务
        if($articles->save()){
            try{
                $articles->tags()->sync(request()->tag_id);
                DB::commit();//结束事务
                return redirect('/article')->with('true','添加成功');
            }catch(\Exception $e){
                DB::rollback();//回滚事务
                dd($e);
                return back()->with('false','添加失败!');
            }
        }else{
            return back()->with('false','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        // dd($articles);
        $tags = Tag::all();
        $cates = Cate::all();
        return view('/article/edit',['articles'=>$articles,'tags'=>$tags,'cates'=>$cates]);


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
        $articles = Article::findOrFail($id);
        $articles -> name = request() -> name;
        $articles -> join = request() -> join;
        $articles -> cate_id = request() -> cate_id;
        $articles -> content = request() -> content;
        $articles -> tag_id = 1;
        $articles -> user_id = 1;
        if($request->hasFile('img')){
            $articles -> img = '/'.request()->img->store('uploads/'.date('Ymd'));
        }else{
            return back()->with('false','必须上传图片');
        }
        DB::beginTransaction();//开启事务

        if($articles->save()){
            try{
                $articles->tags()->sync(request()->tag_id);
                DB::commit();//结束事务
                return redirect('/article')->with('true','更新成功');
            }catch(\Exception $e){
                DB::rollback();//回滚事务
                dd($e);
                return back()->with('false','更新失败!');
            }
        }else{
            return back()->with('false','更新失败');
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
        $articles = Article::findOrFail($id);
        $article_tags = DB::delete("delete from article_tag where article_id =".$id);
        if($articles->delete() && $article_tags > 0){
            return redirect('/article')->with('true','删除成功');
        }else{
            return back()->with('false','删除失败');
        }
    }
}
