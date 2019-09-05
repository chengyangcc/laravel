<form action="{{url('admin/add_do')}}" method="post">
    <a href="{{url('admin/newindex')}}">列表展示</a>
    @csrf
    <p>标题：
        <input type="text" name="title">
    </p>
    <p>作者：
        <input type="text" name="name">
    </p>
    <p>内容：
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </p>
    <p><input type="submit" value="添加"></p>
</form>