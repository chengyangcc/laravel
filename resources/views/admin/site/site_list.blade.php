<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品牌-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="/admin/css/bootstrap.min.css">
<!-- <script type="text/javascript" src="../admin/js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../admin/img/coin02.png" /><span><a href="{{route('main')}}">首页</a>&nbsp;-&nbsp;<a
					href="javaScript:void(0)">品牌管理</a>&nbsp;-</span>&nbsp;品牌展示
			</div>
		</div>

		<div class="page">
			<!-- banner页面样式 -->
			<div class="connoisseur">
				<div class="conform">
						<div class="cfD">
					<form>

							网站名称 <input type="text" name="s_name" value="{{$s_name}}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
								<button class="button">搜索</button>
					</form>

					
						</div>
						<div class="cfD" align="right">
					<a  class="addA addA1" href="{{route('site')}}">添加品牌+</a>

						</div>

				</div>
				<!-- banner 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="170px" class="tdColor">网站名称</td>
							<td width="135px" class="tdColor">网站网址</td>
							<td width="145px" class="tdColor">链接类型</td>
							<td width="140px" class="tdColor">图片LOGO</td>
							<td width="140px" class="tdColor">网站联系人</td>
							<td width="145px" class="tdColor">网站描述</td>
							<td width="145px" class="tdColor">是否显示</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach($res as $v)
						<tr>
							<td class="sid">{{$v->sid}}</td>
							<td>{{$v->s_name}}</td>
							<td>{{$v->s_url}}</td>
							<td>@if($v->s_type==1)LOGO链接 @else 文字链接@endif</td>
							<td width="300px"><img src="{{env('IMG')}}{{$v->s_logo}}" height="40"></td>
							<td>{{$v->s_contact}}</td>
							<td>{{$v->s_contact}}</td>
							<td width="300px">@if($v->is_show==1)是 @else 否@endif</td>
							<td><a href="{{url ('admin/site_edit/'.$v->sid)}}"><img class="operation"
									src="/admin/img/update.png"></a> <img class="operation delban"
								src="/admin/img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging">{{ $res->appends($query)->links()}} </div>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->
		</div>

	</div>


	<!-- 删除弹出框 -->
	<div class="banDel">
		<div class="delete">
			<div class="close">
				<a><img src="../admin/img/shanchu.png" /></a>
			</div>
			<p class="delP1">你确定要删除此条记录吗？</p>
			<p class="delP2">
			<input type="hidden" name="sid" value="" id="sid">
				<a href="javascript:deletes()" class="ok yes">确定</a><a class="ok no">取消</a>
			</p>
		</div>
	</div>
	<!-- 删除弹出框  end-->
</body>
<script type="text/javascript">
// 广告弹出框
$(".delban").click(function(){
  $(".banDel").show();
  var sid=$(this).parent().siblings('.sid').text();
	$('#sid').val(sid);	
	
});
function deletes()
{
	var sid=$('#sid').val();
	$.ajax({
            url:"{{url ('admin/site_del')}}",
            dataType:'json',
            data:{sid:sid},
            success:function(res){
				location.href="{{route ('site_list')}}";
            }
          })
}
$(".close").click(function(){
  $(".banDel").hide();
});
$(".no").click(function(){
  $(".banDel").hide();
});
// 广告弹出框 end
</script>
</html>