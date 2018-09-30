@extends('layouts.index');

@section('content')
<style>
	#riji_list{
		width:500px;
		margin:0 auto;

	}
	#riji_list td{
		padding:10px;
	}
</style>
<a href="/home/riji/create"><button>写日记</button></a><hr>
<table id="riji_list">
	<tr>
		<td>TIME</td>
		<td>TITLE</td>
		<td>TAG</td>
		<td>HEART</td>
		<td>GUANLI</td>
	</tr>
	@foreach($rijis as $v)

	<tr>
		<td>{{mb_substr($v->created_at,0,10)}}</td>
		<td>{{$v->title}}</td>
		<td>{{$v->tag}}</td>
		<td>{{$v->heart}}</td>
		<td><button>编辑</button><button>删除</button></td>
	</tr>
@endforeach
</table>

<div class="am-cf" style="height:40px !important;">
        <div class="am-fr" style="float:right;height:40px !important;"> 
            {{ $rijis->appends(request()->all())->links() }}
        </div>
    </div>

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
@endsection