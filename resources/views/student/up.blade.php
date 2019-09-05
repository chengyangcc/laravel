<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <form action="{{url ('studen/up_do/'.$data->id)}}" method="post">
        @csrf
            学生姓名：<input type="text" name="sname" value="{{$data->sname}}"><br>
            学生年龄：<select name="sage" id="">
            <option value="18" @if($data->sage==18) selected @endif>18</option>
                        <option value="19" @if($data->sage==19) selected @endif>19</option>
                        <option value="20" @if($data->sage==20) selected @endif>20</option>
                        <option value="21" @if($data->sage==21) selected @endif>21</option>
                        <option value="22" @if($data->sage==22) selected @endif>22</option>
                        <option value="23" @if($data->sage==23) selected @endif>23</option>
                        <option value="24" @if($data->sage==24) selected @endif>24</option>
                        <option value="25" @if($data->sage==25) selected @endif>25</option>
                        <option value="26" @if($data->sage==26) selected @endif>26</option>
                        <option value="27" @if($data->sage==27) selected @endif>27</option>
                        <option value="28" @if($data->sage==28) selected @endif>28</option>
            </select><br>
            学生地址：<select name="shi" id="">
                        <option value="北京市" @if($data->shi=='北京市') selected @endif>北京市</option>
                        <option value="石家庄" @if($data->shi=='石家庄') selected @endif>石家庄</option>
                    </select>
                    <select name="qu" id="">
                        <option value="昌平区" @if($data->qu=='昌平区') selected @endif>昌平区</option>
                        <option value="房山区" @if($data->qu=='房山区') selected @endif>房山区</option>
                    </select>
                    <select name="zhen" id="">
                        <option value="沙河镇" @if($data->zhen=='沙河镇') selected @endif >沙河镇</option>
                    </select><br>
                    <input type="submit" value="提交">
                    
        </form>
</body>
</html>