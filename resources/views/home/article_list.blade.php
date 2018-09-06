@extends('/layouts/index')



@section('search')
<div class="search">
        <form action="/home/article_list" method="get" name="searchform" id="searchform">
          <input name="key" id="keyboard" class="input_text" value="请输入文章内容关键字搜索" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入文章内容关键字搜索'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入文章内容关键字搜索'}" type="text">
          <input class="input_submit" value="搜索" type="submit">
        </form>
      </div>
@endsection

@section('link')
    <div class="links">
        <h2>友情链接</h2>
        @foreach($links as $v)
        <ul>
          
          <a href="{{$v->url}}">{{$v->name}}</a>
          
        </ul>
        @endforeach
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
<main class="r_box">
  @foreach($articles as $v)
  <li><i><a href="/home/{{$v->id}}.html"><img src="/app{{$v->img}}"></a></i>
      <h3><a href="/home/{{$v->id}}.html">{{$v->name}}</a></h3>
      <p>{{$v->join}}</p>
    </li>
    @endforeach
    <style>
                    .pagination{
                        padding-left: 0;
                        margin: 1.5rem 0;
                        list-style: none;
                        color: #999;
                        text-align: left;
                        padding: 0;
                    }

                    .pagination li{
                        display: inline-block;
                        padding:0px;
                        margin:0px;
                        background:none;
                    }

                    .pagination li a, .pagination li span{
                        color: #23abf0;
                        border-radius: 3px;
                        padding: 6px 12px;
                        position: relative;
                        display: block;

                        text-decoration: none;
                        line-height: 1.2;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 0;
                        margin-bottom: 5px;
                        margin-right: 5px;
                    }

                    .pagination .active span{
                        color: #23abf0;
                        border-radius: 3px;
                        padding: 6px 12px;
                        position: relative;
                        display: block;
                        text-decoration: none;
                        line-height: 1.2;
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 0;
                        margin-bottom: 5px;
                        margin-right: 5px;
                        background: #23abf0;
                        color: #fff;
                        border: 1px solid #23abf0;
                        padding: 6px 12px;
                    }
                    .am-cf{
                      margin-left:20%;
                    }
                </style>
                <div class="am-cf">
                    <div class="am-fr">
                        {{ $articles->appends(request()->all())->links() }}
                    </div>
                </div>
</main>
@endsection
