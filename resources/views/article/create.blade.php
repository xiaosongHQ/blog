@extends('layouts.admin')
@section('content')
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
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
                        <span class="am-icon-code"></span> 文章添加
                    </div>
                    


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-12">

                            <form action="/article" method="post" enctype="multipart/form-data" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="name" placeholder="输入文章名称">
                                    </div>
                                </div>
                                
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章分类</label>
                                        <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 0}" name='cate_id' style="display: none;">
                                            @foreach($cates as $v)
                                            <option value="{{$v['id']}}">{{$v['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章简介</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="join" placeholder="输入文章简介">
                                    </div>
                                </div>

                <div class="am-form-group">
                    <label for="user-name" class="am-u-sm-3 am-form-label">文章标签</label>
                    <div class="am-u-sm-9" style='font-size:14px;'>
                    @foreach($tags as $v)
                        <label><input type='checkbox' value='{{$v['id']}}' name='tag_id[]'>{{$v['name']}}</label> &nbsp; 
                    @endforeach
                    </div>
                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章主图</label>
                                    <div class="am-u-sm-9" style="font-size:14px;">
                                        <input type="file" id="image" name="img">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">文章内容</label>
                                    <div class="am-u-sm-9">
                                        <script id="editor" type="text/plain" name="content" style="width:100%;height:300px;"></script>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" name="submit" class="am-btn am-btn-primary">发布</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>
             <script>
                    var ue = UE.getEditor('editor');
                $(function(){
                    $('form').submit(function(){
                        if(!$('#image').val()){
                            alert('请上传图片');
                            return false;
                        }
                    });
                });
                </script>
@endsection