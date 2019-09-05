<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品牌-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<script type="text/javascript" src=/admin/js/jquery.min.js"></script>
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

							品牌名称 <input type="text" name="brand_name" value="{{$brand_name}}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							是否上线<label><input
								type="radio" name="is_show" value="1" @if ($is_show=='1') checked @endif />&nbsp;是</label><label><input
								type="radio" name="is_show" value="0" @if ($is_show==='0') checked @endif />&nbsp;否</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="button">搜索</button>
					</form>

					
						</div>
						<div class="cfD" align="right">
					<a  class="addA addA1" href="{{route('brand')}}">添加品牌+</a>

						</div>

				</div>
				<!-- banner 表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="170px" class="tdColor">品牌LOGO</td>
							<td width="135px" class="tdColor">品牌名称</td>
							<td width="145px" class="tdColor">排序</td>
							<td width="140px" class="tdColor">品牌网址</td>
							<td width="140px" class="tdColor">是否上线</td>
							<td width="145px" class="tdColor">品牌描述</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($data as $v)
						<tr>
							<td>{{$v->brand_id}}</td>
							<td><div class="onsImg">
									<img src="{{env('IMG')}}{{$v->brand_logo}}">
								</div></td>
							<td>{{$v->brand_name}}</td>
							<td>{{$v->brand_order}}</td>
							<td width="300px">{{$v->brand_url}}</td>
							<td>
							@if($v->is_show==1)上线 @else 下线 @endif</td>
							<td width="300px">{{$v->brand_desc}}</td>
							<td><a href="connoisseuradd.html"><img class="operation"
									src="/admin/img/update.png"></a> <img class="operation delban"
								src="/admin/img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging">{{$data->appends(['brand_name'=>$brand_name,'is_show'=>$is_show])->links()}}</div>
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