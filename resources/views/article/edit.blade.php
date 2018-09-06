@extends('layouts.admin')
@section('content')
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="tpl-portlet-components">
                            @if(Session::has('true'))
                            <div id='tishi1'>{{Session::get('true')}}</div>
                            @endif
                            @if(Session::has('false'))
                            <div id='tishi2'>{{Session::get('false')}}</div>
                            @endif
                <div class="portlet-title">

                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 文章修改
                    </div>
                
                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-12">

                            <form action="/article/{{$articles['id']}}" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="{{$articles['name']}}" id="user-name" name="name" placeholder="输入文章名称">
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章分类</label>
                                        <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 0}" name='cate_id' style="display: none;">
                                            @foreach($cates as $v)
                                            <option {{$articles['cate_id']==$v['id'] ? 'selected' : ''}} value="{{$v['id']}}">{{$v['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章简介</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" value="{{$articles['join']}}" name="join" placeholder="输入文章简介">
                                    </div>
                                </div>

                <div class="am-form-group">
                    <label for="user-name" class="am-u-sm-3 am-form-label">文章标签</label>
                    <div class="am-u-sm-9" style='font-size:14px;'>
                    @foreach($tags as $v)

                        <label><input type='checkbox' {{in_array($v['id'],$articles->tags()->pluck('tag_id')->toArray()) ? 'checked' : ''}} value='{{$v['id']}}' name='tag_id[]'>{{$v['name']}}</label> &nbsp; 

                    @endforeach
                    </div>
                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章主图</label>
                                    <div class="am-u-sm-9" style="font-size:14px;">
                                        <input type="file" id="user-name" name="img">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章内容</label>
                                    <div class="am-u-sm-9">
                                        <script id="editor" type="text/plain" name="content" style="width:100%;height:300px;">{!!$articles['content']!!}</script>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary">提交修改</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>
             <script>
                    var ue = UE.getEditor('editor');
                </script>
@endsection