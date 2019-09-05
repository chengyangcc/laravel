<form action="{{route ('do')}}" method="post" enctype="multipart/form-data">
    @csrf
    <p>姓名<input type="text" name="name"></p>
    <p><input type="file" name="photo"></p>
    <p>性别<input type="radio" name="sex" value="0">男<input type="radio" name="ses" value="1">女</p>
    <p>年龄<input type="number" name="age"></p>
    
    <p><button>提交</button></p>
</form>