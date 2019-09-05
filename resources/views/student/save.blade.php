<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <form action="{{url ('studen/save_do')}}" method="post">
        @csrf
            学生姓名：<input type="text" name="sname"><br>
            学生年龄：<select name="sage" id="">
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
            </select><br>
            学生地址：<select name="shi" id="">
                        <option value="北京市">北京市</option>
                        <option value="石家庄">石家庄</option>
                    </select>
                    <select name="qu" id="">
                        <option value="昌平区">昌平区</option>
                        <option value="房山区">房山区</option>
                    </select>
                    <select name="zhen" id="">
                        <option value="沙河镇">沙河镇</option>
                    </select><br>
                    <input type="submit" value="提交">
                    
        </form>
</body>
</html>