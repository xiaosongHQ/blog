@extends('layouts.admin')
@section('content')

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 网站设置
                    </div>
                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-12">
                            @if(Session::has('true'))
                            <div id='tishi1'>{{Session::get('true')}}</div>
                            @endif
                            @if(Session::has('false'))
                            <div id='tishi2'>{{Session::get('false')}}</div>
                            @endif
                            <form action="/admin/set" method="post" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">博主名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" value="{{$sets['name']}}" name="name" placeholder="输入用户名称">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">博主简介</label>
                                    <div class="am-u-sm-9">
                                        
                                        <textarea name="join" cols="30" rows="3">{{$sets['join']}}</textarea>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站域名</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" value="{{$sets['url']}}" id="user-name" name="url" placeholder="输入网站域名">
                                    </div>
                                </div>

                                 <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站版权</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" value="{{$sets['banquan']}}" name="banquan" placeholder="输入网站版权">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">网站开关</label>
                                    <div class="am-u-sm-9" style="font-size:16px;">
                                        <input type="radio" {{$sets['down']=='1' ? 'checked' : ''}} value="1" id="user-name" name="down"">开启 &nbsp; 
                                        <input type="radio" {{$sets['down']=='0' ? 'checked' : ''}} value="0" id="user-name" name="down"">关闭
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">博主详细</label>
                                    <div class="am-u-sm-9">
                                          <script id="editor" type="text/plain" name="content" style="width:100%;height:300px;">{!!$sets['content']!!}</script>
                                    </div>
                                </div>
                                

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary">提交设置</button>
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
                </script>
@endsection