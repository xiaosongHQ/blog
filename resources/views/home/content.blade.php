@extends('/layouts/index')


@section('search')
<div class="search">
        <form action="/home/article_list" method="get" name="searchform" id="searchform">
          <input name="key" id="keyboard" class="input_text" value="请输入文章内容关键字搜索" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入文章内容关键字搜索'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入文章内容关键字搜索'}" type="text">
          <input class="input_submit" value="搜索" type="submit">

        </form>
      </div>
@endsection


@section('fenlei')
<div class="fenlei">
        <h2>文章分类</h2>
        <ul>
          @foreach($cates as $v)
          <li><a href="/home/article_list?cate_id={{$v->id}}">{{$v->name}}（{{$v->articles()->count()}}）</a></li>
          @endforeach
        </ul>
      </div>
@endsection


@section('content')
<main>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{$articles->name}}</h3>
        <div class="bloginfo">
          <ul>
            <li class="author">作者：<a href="/">iYM</a></li>
            <li class="lmname">分类：<a href="/">{{$articles->cate->name}}</a></li>
            <li class="timer">时间：{{substr($articles->created_at,0,10)}}</li>
            <li class="view">{{$articles->views}}阅</li>
          </ul>
        </div>
        <div class="tags">
          @foreach($articles->tags as $v)
          <a href="/home/article_list?tag_id={{$v->id}}">{{$v->name}}</a> &nbsp;
          @endforeach
        </div>
        <div class="news_about">
          {!!$articles->content!!}
          <br>
          &nbsp; </div>
      </div>
   
      <div class="newsview" style="padding:20px;float:right">
            <div class="share-component" data-disabled="google,twitter,facebook" data-description="Share.js - 一键分享到微博，QQ空间，腾讯微博，人人，豆瓣"></div>
        </div>
      
    </div>
  </main>
@endsection
