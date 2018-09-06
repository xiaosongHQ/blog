@extends('layouts.admin')
@section('content')
<div class="tpl-portlet-components">
                <div class="portlet-title">
                    <div class="caption font-green bold">
                        <span class="am-icon-code"></span> 友情链接添加
                    </div>
                    


                </div>
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form action="/link" method="post" class="am-form am-form-horizontal">
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">链接名称</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="name" placeholder="输入友链名称">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">链接地址</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="user-name" name="url" placeholder="输入友链URL">
                                    </div>
                                </div>

                                

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary">提交</button>
                                    </div>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>

            </div>
@endsection