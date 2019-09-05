<link rel="stylesheet" href="/css/bootstrap.min.css">
<form>
<input type="text" name="name" value="{{$name}}">
<input type="text" name="age" value="{{$age}}">
<input type="submit" value="提交">
</form>

@foreach($data as $v)
<p>姓名：{{$v->name}} 年龄：{{$v->age}} 性别：@if($v->sex==0)男@else 女 @endif 图片：<img src='{{env("IMG")}}{{$v->photo}}' height="40"></p>
@endforeach
<p>{{ $data->appends($query)->links()}}</p>