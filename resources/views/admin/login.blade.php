<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin index Examples</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/admin/static/assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="/admin/static/assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/admin/static/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/admin/static/assets/css/admin.css">
  <link rel="stylesheet" href="/admin/static/assets/css/app.css">
</head>

<body data-type="login">
	<style>
							#tishi2{
                                width:75%;
                                margin:10px auto;
                                background:#f14;
                                height:50px;
                                border-radius:10px;
                                color:white;
                                font-size:16px;
                                text-align:center;
                                line-height:50px;
                            }
                            #tishi1{
                                width:75%;
                                margin:10px auto;
                                background:green;
                                height:50px;
                                border-radius:10px;
                                color:white;
                                font-size:16px;
                                text-align:center;
                                line-height:50px;
                            }

	</style>
  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block  tpl-login-max">
		<div class="myapp-login-logo-text">
							@if(Session::has('true'))
                    		<div id='tishi1'>{{Session::get('true')}}</div>
							@endif
							@if(Session::has('false'))
                    		<div id='tishi2'>{{Session::get('false')}}</div>
                    		@endif
			<div class="myapp-login-logo-text">
				Welcome<span> Login</span> <i class="am-icon-skyatlas"></i>
				
			</div>
		</div>

		<div class="login-font">
			<i>welcome to my website</i>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<form method='post' action='/admin/login' class="am-form">
				<fieldset>
					<div class="am-form-group">
						<input type="text" class="" name='name' id="doc-ipt-email-1" placeholder="用户名">
					</div>
					<div class="am-form-group">
						<input type="password" class="" name='password' id="doc-ipt-pwd-1" placeholder="密码">
					</div>
					<p><button type="submit" class="am-btn am-btn-default">登录</button></p>
				</fieldset>
				{{csrf_field()}}
			</form>
		</div>
	</div>
</div>

  <script src="/admin/static/assets/js/jquery.min.js"></script>
  <script src="/admin/static/assets/js/amazeui.min.js"></script>
  <script src="/admin/static/assets/js/app.js"></script>
</body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT>