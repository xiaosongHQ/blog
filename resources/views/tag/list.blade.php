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
                                    <a href='/tag/create' class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                    <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 删除</button>
                                    
                                </div>
                            </div>
                        </div>
                      
                        <div class="am-u-sm-12 am-u-md-3">
						<form method="get" action='/tag'>
                            <div class="am-input-group am-input-group-sm">
                                <input value="{{request()->key}}" type="text" name='key' class="am-form-field">
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
                                            <th class="table-title">分类名称</th>
                                            <th class="table-type">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($tags as $v)
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td>{{$v['id']}}</td>
                                            <td>{{$v['name']}}</td>
                                            
                                            <td>
                                                <div class="am-btn-toolbar">
                                                    <div class="am-btn-group am-btn-group-xs">
                                                        <a href='/tag/{{$v['id']}}/edit'><button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button></a>
                                                      <form style="float:right;" action="/tag/{{$v['id']}}" method='post'>
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
                               
                                <hr>
                        </div>

                    </div>
                </div>
@endsection