<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员管理-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;-</span>&nbsp;管理员管理
			</div>
		</div>

		<div class="page">
			<!-- user页面样式 -->
			<div class="connoisseur">
				<div class="conform">
					<form id="form" action="{{route('useradd_do')}}" method="post" enctype="">
						<div class="cfD">
							@csrf
							<input class="userinput" type="text" name="uname" placeholder="输入用户名" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
							<input class="userinput vpr" type="password" name="upwd" placeholder="输入用户密码" />
							<button class="userbtn">添加</button>
						</div>
					</form>
				</div>
				

				<!-- user 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="400px" class="tdColor">用户名</td>
							<td width="630px" class="tdColor">添加时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach($res as $v)
						<tr height="40px">
							<td>{{$v->u_id}}</td>
							<td>{{$v->uname}}</td>
							<td>{{date('Y-m-d ',$v->utime)}}</td>
							<td><a href="connoisseuradd.html">
								<img class="operation"src="/admin/img/update.png"></a> 
								<img class="operation delban"src="/admin/img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging">此处是分页</div>
				</div>
				<!-- user 表格 显示 end-->
			</div>
			<!-- user页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
				<a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
});
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>
<script type="text/javascript" src="/admin/js/jq.js"></script>
<script>
		$('.userbtn').on('click',function(){
			event.preventDefault();
			var uname=$('[name="uname"]').val();
			if(uname==""){
				alert('用户名不能为空'); return;
			}
			var upwd=$('[name="upwd"]').val()
			if(upwd==""){
				alert('密码不能为空'); return;
			}
			var form =$('#form').serialize();
			$.ajax({
				url:"{{route('useradd_do')}}",
				data:form,
				type:'post',
				dataType:'json',
				success:function(res){
					if(res.ret==1){
						alert(res.msg);
						window.location.reload();
					}else{
						if ( typeof(res.msg.uname) != "undefined" && res.msg.uname !== null  ) {
							alert(res.msg.uname[0]);
						}
						if ( typeof(res.msg.upwd) != "undefined" && res.msg.upwd!== null  ) {
							alert(res.msg.upwd[0]);
						}
					}
				}
			})
		})
</script>