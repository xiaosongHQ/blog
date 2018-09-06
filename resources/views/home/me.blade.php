@extends('/layouts/index')

@section('me')
	<div class="about_me">
        <h2>关于我</h2>
        <ul>
          <i><img src="/home/images/me.jpg"></i>
          <p><b>i幺妹</b><br> &nbsp; {!!$sets['join']!!}</p>
        </ul>
      </div>
@endsection
@section('content')
<main class="r_box">
	{!!$sets->content!!}
</main>
@endsection
