@extends('layouts.admin')
@section('content')
	<div class="tpl-block">

                    <div>
						
							@if(Session::has('true'))
                    		<div id='tishi1'>{{Session::get('true')}}</div>
							@endif
							@if(Session::has('false'))
                    		<div id='tishi2'>{{Session::get('false')}}</div>
                    		@endif
						
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href='/article/create' class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                    <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 删除</button>
                                    
                                </div>
                            </div>
                        </div>
                      
                        <div class="am-u-sm-12 am-u-md-3">
						<form method="get" action='/article'>
                            <div class="am-input-group am-input-group-sm">
                                <input type="text" name='key' value="{{request()->key}}" class="am-form-field">
                                <span class="am-input-group-btn">
            						<button class="am-btn  am-btn-default am-btn-success tpl-am-btn-success am-icon-search"></button>
          						</span>
                            </div>
                            

                        </form>
                        </div>
                    </div>
                    <div class="am-g">
                        <div class="am-u-sm-12">
                                <table class="am-table am-table-striped am-table-hover table-main">
                                    <thead>
                                        <tr>
                                            <th class="table-check"><input type="checkbox" class="tpl-table-fz-check"></th>
                                            <th class="table-id">ID</th>
                                            <th class="table-title">文章名称</th>
                                            <th class="table-title">文章分类</th>
                                            <th class="table-type">文章简介</th>
                                            <th class="table-type">获得赞数</th>
                                            <th class="table-type">浏览量</th>
                                            <th class="table-type">主图</th>
                                            <th class="table-type">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($articles as $v)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{$v['id']}}</td>
                                            <td>{{$v['name']}}</td>
                                            <td>{{$v->cate->name}}</td>
                                            <td>{{substr($v['join'],0,10)}}</td>
                                            <td>{{$v['zan']}}</td>
                                            <td>{{$v['liulan']}}</td>
                                            <td><img src="/app{{$v['img']}}" width='50' ></td>
                                            
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href='/article/{{$v['id']}}/edit'><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button></a>
                                                      <form style="float:right;" action="/article/{{$v['id']}}" method='post'>
                                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
													{{method_field('DELETE')}}
													{{csrf_field()}}
													</form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
									@endforeach
                                    </tbody>
                                </table>
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
                </style>
                                <hr>
                                <div class="am-cf">
                                    <div class="am-fr">
                                        {{ $articles->appends(request()->all())->links() }}
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
@endsection