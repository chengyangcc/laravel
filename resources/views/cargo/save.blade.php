<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('admin/cargoadd_do')}}" method="post"  enctype="multipart/form-data">
    @csrf
        货物名称：<input type="text" name="gname"><br>    
        货物图片：<input type="file" name="gimg"><br>
        货物数量：<input type="text" name="gnumber"><br>
        <input type="submit" value="提交" >
        


    </form>
</body>
</html>