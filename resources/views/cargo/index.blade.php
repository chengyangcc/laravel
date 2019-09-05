<table border="1"> 
    <tr>
        <td>名称</td>
        <td>图片</td>
        <td>数量</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    @foreach ($data as $v)
    <tr>
        <td>{{$v->gname}}</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v->gimg}}" height="50"></td>
        <td>{{$v->gnumber}}</td>
        <td>@php echo date("Y-m-d",$v->time) @endphp</td>
        <td><a href="{{url('admin/cargoup/'.$v->id) }}">出库</a></td>
    </tr>
    @endforeach

</table>