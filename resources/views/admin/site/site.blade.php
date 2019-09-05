<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品品牌添加-有点</title>
<link rel="stylesheet" type="text/css" href="/admin/css/css.css" />
<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
</head>
<body>
<form action="{{route('site_do')}}" method="post" enctype="multipart/form-data">
	@csrf
	<div id="pageAll">
		<div class="pageTop">
			<div class="page">
				<img src="/admin/img/coin02.png" /><span><a href="{{route ('main')}}">首页</a>&nbsp;-&nbsp;<a
					href="{{route('site_list')}}">商品品牌管理</a>&nbsp;-</span>&nbsp;品牌添加
			</div>
		</div>
		<div class="page ">
			<!-- 上传广告页面样式 -->
			<div class="banneradd bor">
				<div class="baTopNo">
					<span>品牌添加</span>
				</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站名称：<input type="text"
							class="input3" name="s_name" />@php echo($errors->first('s_name')) ;@endphp	
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站网址：<input type="text"
							class="input3" name="s_url" />@php echo($errors->first('s_url')) ;@endphp	
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;链接类型：<label><input
							type="radio" checked="checked" name="s_type" value="1" />&nbsp;LOGO链接</label><label><input
							type="radio" name="s_type" value="0" />&nbsp;文字链接</label>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;图片LOGO：
						<div class="vipHead vipHead1">
							<input  type="file" name="s_logo" />
						</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网站联系人：<input type="text"
							class="input3" name="s_contact" />
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;品牌描述：
						<div class="btext2">
							<textarea class="text2" name="s_desc"></textarea>
						</div>
					</div>
					<div class="bbD">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;是否显示：<label><input
							type="radio" checked="checked" name="is_show" value="1" />&nbsp;是</label><label><input
							type="radio" name="is_show" value="0" />&nbsp;否</label>
					</div>
					<div class="bbD">
						<p class="bbDP">
							<button class="btn_ok btn_yes" >提交</button>
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
<script src="/js/jq.js"></script>
<script>
	$('.btn_yes').on('click',function(){
		var s_name=$('[name="s_name"]').val();
		var s_url=$('[name="s_url"]').val();
		if(s_url==""){
			alert('网站网址不能为空');
			event.preventDefault();
		}
		var url=/(http|https):\/\/([\w.]+\/?)\S*/;
		if(!url.test(s_url)){
			alert('网站网址必须以http开头');
			event.preventDefault();
		}
		if(s_name==""){
			alert('网站名称不能为空');
			event.preventDefault();
		}
		var res=/^[a-zA-Z0-9_\u4e00-\u9fa5]+$/;
		if(!res.test(s_name)){
			alert('网站名称必须是中文字母数字下划线');
			event.preventDefault();
		}
	})
	$('[name="s_name"]').blur(function(){
		var s_name=$('[name="s_name"]').val();
		$.ajax({
			url:"{{url ('admin/only')}}",
			data:{s_name:s_name},
			dataType:'json',
			type:'post',
			headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	},
			success:function(res){
				if(res.ret==1){
					alert(res.msg);
					event.preventDefault();
				}
			}
		})
	})
</script>