<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/cargoupdate/'.$data->id)}}" method="post"  enctype="multipart/form-data">
    @csrf
        出库名称：<input type="text" name="gname" value="{{$data->gname}}"><br>    
        出库数量：<input type="text" name="gnumber"><br>
        <input type="submit" class="out" value="出库" >
    </form>
</body>
</html>
<script src="/js/jq.js"></script>
<script>
$('.out').click(function(){
    // alert(123);
    var number=$('[name="gnumber"]').val();
    var gnumber={{$data->gnumber}};
    if(number>gnumber){
        alert('出库数量大于库存，请修改出库数量');
        event.preventDefault();
    }
})
</script>