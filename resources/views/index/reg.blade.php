<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="/index/images/favicon.ico" />
    
    <!-- Bootstrap -->
    <link href="/index/css/bootstrap.min.css" rel="stylesheet">
    <link href="/index/css/style.css" rel="stylesheet">
    <link href="/index/css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/index/images/head.jpg" />
     </div><!--head-top/-->
     <form action="{{url ('/reg_do')}}" method="post" class="reg-login">
      <h3>已经有账号了？点此<a class="orange" href="{{url ('index/login')}}">登陆</a></h3>
      <div class="lrBox">
        @csrf
       <div class="lrList"><input type="text" name="tel" placeholder="输入手机号码或者邮箱号" /></div>@php echo($errors->first('tel')) ;@endphp
       <div class="lrList2"><input type="text" name="code" placeholder="输入短信验证码" /> <button class="button">获取验证码</button></div>
       <div class="lrList"><input type="password" name="pwd" placeholder="设置新密码（6-18位数字或字母）" /></div>@php echo($errors->first('pwd')) ;@endphp
       <div class="lrList"><input type="password" name="pwds_confirmation" placeholder="再次输入密码" /></div>@php echo($errors->first('pwds_confirmation')) ;@endphp
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="submit" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     @include('index/public');
     </div><!--footNav/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <script src="/js/jq.js"></script>
    <script>  
      $('.button').click(function(){
        event.preventDefault();
        // alert(123);
        var email=$('[name="tel"]').val();
        if(email==""){
          alert('请输入正确的手机号或邮箱');
        }
        $.ajax({
          url:"{{url ('/email')}}",
          data:{email:email},
          success:function(res){
          }
        })
      })
    </script>
  </body>
</html>
