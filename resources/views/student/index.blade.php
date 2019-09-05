<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method=""> <input type="hidden" name="status" value="2"> <input type="submit" class="li" value="离校"> </form>
    <table border="1">
        <tr>
            <td>学生姓名</td>
            <td>学生年龄</td>
            <td>学生地址</td>
            <td>编辑</td>
        </tr>
        @foreach ($data as $v)
        <tr>
            <td>{{$v->sname}}</td>
            <td>{{$v->sage}}</td>
            <td>{{$v->shi}}{{$v->qu}}{{$v->zhen}}</td>
            <td>
                <a href="{{url ('studen/del/'.$v->id)}}">删除</a>
                <a href="{{url ('studen/up/'.$v->id)}}">修改</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
<script src="/js/jq.js"></script>
<script>
    $('.li').click(function(){
        var status=$('[name="status"]').val()
        if(status==1){
            $('[name="status"]').val(2)
        }
        // if(status==2){
        //     $('[name="status"]').val(1)
        // }
    })
</script>