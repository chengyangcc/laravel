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
     <div class="head-top">
      <img src="/index/images/head.jpg" />
      <dl>
       <dt><a href="user.html"><img src="/index/images/touxiang.jpg" /></a></dt>
       <dd>
        <h1 class="username">三级分销终身荣誉会员</h1>
        <ul>
         <li><a href="prolist.html"><strong>{{$goodscount}}</strong><p>全部商品</p></a></li>
         <!-- <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏本店</p></a></li> -->
         <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
         <div class="clearfix"></div>
        </ul>
       </dd>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="get" class="search">
      <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" />
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="{{url ('index/login')}}">登录</a></li>
      <li><a href="{{url ('/reg')}}" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <div id="sliderA" class="slider">
       @foreach ($goodshot as $v)
      <img src="{{env ('IMG')}}{{$v->goods_img}}" />
      @endforeach
     
     </div><!--sliderA/-->
     <ul class="pronav">
     @foreach ($cate as $v)
      <li><a href="{{url ('index/prolist/'.$v->cid)}}">{{$v->cat_name}}</a></li>
      @endforeach
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div class="index-pro1">
     @foreach ($goods as $v)
      <div class="index-pro1-list">
       <dl>
        <dt><a href="{{url ('index/proinfo_index/'.$v->gid)}}"><img src="{{env ('IMG')}}{{$v->goods_img}}" width="100" height="100"/></a></dt>
        <dd class="ip-text"><a href="{{url ('index/proinfo_index/'.$v->gid)}}">{{$v->goods_name}}</a><span>数量：{{$v->goods_number}}</span></dd>
        <dd class="ip-price"><strong>¥{{$v->shop_price}}</strong> <span>¥@php echo $v->shop_price+500 @endphp</span></dd>
       </dl>
      </div>
      @endforeach

      <div class="clearfix"></div>
     </div><!--index-pro1/-->
     <div class="prolist">
      @foreach ($goodsnew as $v)
      <dl>
       <dt><a href="{{url ('index/proinfo_index/'.$v->gid)}}"><img src="{{env ('IMG')}}{{$v->goods_img}}" width="100" height="100" /></a></dt>
       <dd>
        <h3><a href="{{url ('index/proinfo_index/'.$v->gid)}}">{{$v->goods_name}}</a></h3>
        <div class="prolist-price"><strong>¥{{$v->shop_price}}</strong> <span>¥@php echo $v->shop_price*2 @endphp</span></div>
        <div class="prolist-yishou"><span>5.0折</span> <em>数量：{{$v->goods_number}}</em></div>
       </dd>
       <div class="clearfix"></div>
      </dl>
      @endforeach
     </div><!--prolist/-->
     <div class="joins"><a href="fenxiao.html"><img src="/index/images/jrwm.jpg" /></a></div>
     <div class="copyright">Copyright &copy; <span class="blue">这是就是三级分销底部信息</span></div>
     
     @include('index/public');
     </div><!--footNav/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/index/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/index/js/bootstrap.min.js"></script>
    <script src="/index/js/style.js"></script>
    <!--焦点轮换-->
    <script src="/index/js/jquery.excoloSlider.js"></script>
    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
  </body>
</html>