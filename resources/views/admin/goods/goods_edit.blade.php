<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
					href="#">商品管理</a>&nbsp;-</span>&nbsp;商品添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>商品添加</span>
				</div>
				<form action="{{url ('admin/goods_update/'.$goods_data->gid)}}" method="post" enctype="multipart/form-data">
				<div class="baBody">
					@csrf
					<div class="bbD">
						商品名称：<input type="text" name="goods_name" value="{{$goods_data->goods_name}}" class="input3" />@php echo($errors->first('goods_name')) ;@endphp
					</div>
					<div class="bbD">
						商品数量：<input type="text" name="goods_number" value="{{$goods_data->goods_number}}" class="input3" />@php echo($errors->first('goods_number')) ;@endphp
					</div>
					<div class="bbD">
						商品价格：<input type="text" name="shop_price" value="{{$goods_data->shop_price}}" class="input3" />@php echo($errors->first('shop_price')) ;@endphp
					</div>
						<input type="hidden" name="goods_sn" value="{{$goods_data->goods_sn}}" class="input3" />
					<div class="bbD">
						商品图片：<input type="file" name="goods_img" />
					</div>
					<div class="bbD">
						商品品牌：<select class="input3" name="brand_id">
									<option></option>
									@foreach ($brand as $v)
													<option value="{{$v->brand_id}}" @if($v->brand_id==$goods_data->brand_id) selected @endif>{{$v->brand_name}}</option>
												@endforeach
								</select> @php echo($errors->first('brand_id')) ;@endphp	
					</div>
					<div class="bbD">
						商品分类：<select class="input3" name="cat_id">
						@foreach ($admin_cat as $v)
							<option value="{{$v->cid}}" @if($v->cid==$goods_data->cat_id) selected @endif >{{str_repeat('--',$v->level-1).$v->cat_name}}</option>
						@endforeach
								</select>@php echo($errors->first('cat_id')) ;@endphp
					</div>
					<div class="bbD">
						是否热卖：<label><input type="radio" 
						name="is_hot" value="0" @if($goods_data->is_hot==0) checked @endif/>&nbsp;是</label><label><input type="radio"
						name="is_hot" value="1" @if($goods_data->is_hot==1) checked @endif/>&nbsp;否</label>
					</div>
					<div class="bbD">
						是否新品：<label><input type="radio" 
							name="is_new" value="0" @if($goods_data->is_new==0) checked @endif/>&nbsp;是</label><label><input type="radio"
							name="is_new" value="1" @if($goods_data->is_new==1) checked @endif/>&nbsp;否</label>
					</div>
					<div class="bbD">
						是否上架：<label><input type="radio" 
							name="is_on_sale" value="0" @if($goods_data->is_on_sale==0) checked @endif/>&nbsp;是</label><label><input type="radio"
							name="is_on_sale" value="1" @if($goods_data->is_on_sale==1) checked @endif/>&nbsp;否</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
						<input type="submit" class="btn_ok btn_yes" value="提交"/>
						</p>
					</div>
				</div>
			</div>
			</form>
			<!-- 上传广告页面样式end -->
		</div>
	</div>
</body>
</html>