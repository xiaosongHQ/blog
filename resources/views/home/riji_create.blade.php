@extends('layouts.index');

@section('content')
<style>
#riji_table{
	margin:0px auto;
	width:500px;

}
#riji_table td{
	padding:20px;
}
input{

}
</style>
<h3>个人日记</h3>
<hr>
<form action="/home/riji" method="post">
<table id="riji_table" width="500" border='1' cellspacing="0">
	<caption style="margin:10px"><h2>成长日记</h2></caption>
	<tr>
		<td>TITLE</td>
		<td><input style="display:block;width:100%;height:30px;" type="text" name="title"></td>
	</tr>	
	
	<tr>
		<td>TAG</td>
		<td>
			<label for=""><input type="checkbox" name="tag[]" value="1">爱情 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="2">成长 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="3">工作 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="4">篮球 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="5">旅游 &nbsp; </label><br>
			<label for=""><input type="checkbox" name="tag[]" value="6">开心 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="7">记事 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="8">普通 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="9">心情 &nbsp; </label>
			<label for=""><input type="checkbox" name="tag[]" value="10">备注 &nbsp; </label>
		</td>
	</tr>
	
	<tr>
		<td>HEART</td>
		<td>
			<label for=""><input type="radio" name="heart" value="1">开心 &nbsp; </label>
			<label for=""><input type="radio" name="heart" value="2">良好 &nbsp; </label>
			<label for=""><input type="radio" name="heart" value="3">一般 &nbsp; </label>
			<label for=""><input type="radio" name="heart" value="4">还行 &nbsp; </label>
			<label for=""><input type="radio" name="heart" value="5">失落 &nbsp; </label>
		</td>
	</tr>

	<tr>
		<td>CONTENT</td>
		<td><textarea name="content" id="" cols="30" style="display:block;width:100%;" rows="10"></textarea></td>
	</tr>

	<tr>
		<td colspan="2" style="text-align:center;"><button style="width:200px;height:30px">存起来</button></td>
	</tr>	
</table>
{{csrf_field()}}
</form>
@endsection