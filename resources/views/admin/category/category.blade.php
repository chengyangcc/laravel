<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>行家添加-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="img/coin02.png" /><span><a href="{{route ('main')}}">首页</a>&nbsp;-&nbsp;<a
					href="#">商品分类分类管理</a>&nbsp;-</span>&nbsp;商品分类添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>商品分类添加</span>
				</div>
				<div class="baBody">
					<form action="{{route ('category_do')}}" method="post">
					<div class="bbD">
						@csrf
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分类名称：<input type="text" name="cat_name"
							class="input3" />
					</div>
					<!-- <div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;任职机构：<input type="text"
							class="input3" />
					</div> -->
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;类：<select class="input3" name="parent_id">
						<option value="0">顶级分类</option>
						@foreach ($data as $v)
							<option value="{{$v->cid}}">@php echo str_repeat('--',$v->level-1).$v->cat_name @endphp</option>
						@endforeach
					</select>
					</div>
					
					
					
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" href="#">提交</button>
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