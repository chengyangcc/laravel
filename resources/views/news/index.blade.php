<table border=1>
<a href="{{url('admin/add')}}">添加</a>
    <tr>
        <td>标题</td>
        <td>点击数量</td>
        <td>点击</td>
</tr>
@foreach($data as $k=>$v)
    <tr>
        <td><a href="{{url('admin/address/'.$v->id)}}">{{$v->title}}</a></td>
        <td class="num{{ $v->id }}">{{$v->number}}</td>
        <td><a href="javascript:void(0) " class="dian" nid="{{ $v->id }}">{{ $v->flag }}</a>  </td>
    </tr>
    @endforeach
</table>
<script src="/js/jq.js"></script> 
 <script type="text/javascript">
	$('.dian').click(function(){
		obj = $(this);
        var id  = $(this).attr('nid');
		flag = obj.html()
		$.ajax({
			url:"{{url('admin/dian')}}",
			data:{'id': id, 'flag': flag},
			success:function(msg) {
				$('.num' + id).html(msg)
				if (flag == '点赞' & id==id) {
					obj.html('取消点赞')
				} else {
					obj.html('点赞')
				}
				
			}
		});
	});
</script>