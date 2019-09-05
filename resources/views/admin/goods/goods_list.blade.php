<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题管理-有点</title>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" href="/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品管理</a>&nbsp;-</span>&nbsp;商品管理

			</div>

		</div>
		<a class="addA addA1" href="{{route ('goods')}}">添加商品+</a>

		<div class="page">
			<!-- topic页面样式 -->
			<div class="topic">
				<div class="conform">
					<form>
						<div class="cfD">
							商品名称：<input class="timeInput" type="text" name="goods_name" value="{{$goods_name}}"/>
								 商品品牌：<select name="brand_id">
												<option value=""></option>
												@foreach ($brand as $v)
													<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
												@endforeach
											</select>
								 商品分类：<select name="cat_id">
								 			<option value=""></option>
											 @foreach ($admin_cat as $v)
												<option value="{{$v->cid}}">{{str_repeat('__',$v->level-1).$v->cat_name}}</option>
											@endforeach
										  </select>
							商品上架：<select name="is_on_sale">
										<option value=""></option>
										<option value="0" @if($is_on_sale==0) selected @endif>是</option>
										<option value="1" @if($is_on_sale==1) selected @endif>否</option>
									 </select>
							 <input class="button" type="submit" value="搜索" />

						</div>
					</form>

						
				</div>
				<!-- topic表格 显示 -->
				<div class="conShow">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="66px" class="tdColor tdC">序号</td>
							<td width="125px" class="tdColor">商品名称</td>
							<td width="125px" class="tdColor">商品品牌</td>
							<td width="125px" class="tdColor">商品分类</td>
							<td width="125px" class="tdColor">商品货号</td>
							<td width="125px" class="tdColor">商品价格</td>
							<td width="100px"  class="tdColor">商品图片</td>
							<td width="125px" class="tdColor">商品数量</td>
							<td width="66px" class="tdColor">是否热卖</td>
							<td width="66px" class="tdColor">是否新品</td>
							<td width="66px" class="tdColor">是否上架</td>
							<td width="200px" class="tdColor">添加时间</td>
							<td width="130px" class="tdColor">操作</td>
						</tr>
						@foreach ($goods_data as $v)
						<tr>
							<td class="gid">{{$v->gid}}</td>
							<td>{{$v->goods_name}}</td>
							<td>{{$v->brand_name}}</td>
							<td>{{$v->cat_name}}</td>
							<td>{{$v->goods_sn}}</td>
							<td>{{$v->shop_price}}</td>
							<td><img src="{{env('IMG')}}{{$v->goods_img}}" height="60" alt=""></td>
							<td>{{$v->goods_number}}</td>
							<td>@if($v->is_hot==0)是@else 否@endif</td>
							<td>@if($v->is_new==0)是@else 否@endif</td>
							<td>@if($v->is_on_sale==0)是@else 否@endif</td>
							<td>{{date('Y-m-d H:i:s',$v->goods_time)}}</td>
							<td>
								<a href="{{url ('admin/goods_edit/'.$v->gid)}}">
									<img class="operation" src="img/update.png"></a> 
									<img class="operation delban" src="img/delete.png"></td>
						</tr>
						@endforeach
					</table>
					<div class="paging">{{ $goods_data->appends($query)->links()}}</div>
				</div>
				<!-- topic 表格 显示 end-->
			</div>
			<!-- topic页面样式end -->
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
				<input type="hidden" name="gid" value="" id="gid">
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
	var gid=$(this).parent().siblings('.gid').text();
	$('#gid').val(gid);	
	
});
function deletes()
{
	var gid=$('#gid').val();
	$.ajax({
            url:"{{url ('admin/goods_delete')}}",
            dataType:'json',
            data:{gid:gid},
            success:function(res){
				//   alert(123);
				location.href="{{route ('goods_list')}}";
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