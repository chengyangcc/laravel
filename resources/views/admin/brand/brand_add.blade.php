<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品品牌添加-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
<form action="{{route('brand_do')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="../admin/img/coin02.png" /><span><a href="{{route ('main')}}">首页</a>&nbsp;-&nbsp;<a
					href="{{route('brand_list')}}">商品品牌管理</a>&nbsp;-</span>&nbsp;品牌添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>品牌添加</span>
				</div>
				<div class="baBody">
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌：
						<div class="vipHead vipHead1">
							<img src="/admin/img/actionIMG.png" />
							<p class="vipP">上传</p>
							<input class="file1" type="file" name="brand_logo" />
						</div>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌名称：<input type="text"
							class="input3" name="brand_name" />@php echo $errors->first('brand_name'); @endphp
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌网址：<input type="text"
							class="input3" name="brand_url" />@php echo $errors->first('brand_url'); @endphp
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：<input
							class="input3" type="text" name="brand_order" />按照倒序排序 @php echo $errors->first('brand_order'); @endphp
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌描述：
						<div class="btext2">
							<textarea class="text2" name="brand_desc"></textarea>@php echo $errors->first('brand_desc'); @endphp
						</div>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;是否显示：<label><input
							type="radio" checked="checked" name="is_show" value="1" />&nbsp;是</label><label><input
							type="radio" name="is_show" value="0" />&nbsp;否</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
						</p>
					</div>
				</div>
			</div>

			<!-- 上传广告页面样式end -->
		</div>
	</div>
	</form>
</body>
</html>