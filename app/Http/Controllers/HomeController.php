<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Set;
use App\Tag;
use App\Cate;
use App\Link;
use App\Article;

class HomeController extends Controller
{
    public function index(){
    	$sets = Set::findOrFail(1);
    	$cates = Cate::all();
    	$links = Link::all();
    	$articles = Article::orderBy('id','desc')->take(7)->get();
    	return view('/home/index',compact('sets','links','cates','articles'));
    }
    public function me(){
    	$sets = Set::findOrFail(1);
    	$cates = Cate::all();
    	$links = Link::all();
    	return view('/home/me',compact('sets','links','cates'));
    }
    public function article_list(){
    	$sets = Set::findOrFail(1);
    	$cates = Cate::all();
    	$links = Link::all();
    	$articles = Article::orderBy('id','desc')->where('content','like','%'.request()->key.'%')->paginate(7);
    	if(!empty(request()->tag_id)){
            $tag = Tag::findOrFail(request()->tag_id);
            $articles = $tag->articles()->paginate(7);
        }
        if(!empty(request()->cate_id)){
            $cate = Cate::findOrFail(request()->cate_id);
            $articles = $cate->articles()->orderBy('id','desc')->paginate(7);
        }
    	return view('/home/article_list',compact('sets','links','cates','articles'));
    }
    public function show($id){
    	$cates = Cate::all();
    	$articles = Article::findOrFail($id);
    	return view('/home/content',compact('cates','articles'));
    	
    }
}
