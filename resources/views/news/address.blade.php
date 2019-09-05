<table>
    <p>标题：
    {{$data->title}}
    </p>
    <p>作者：{{$data->name}}</p>
    <p>内容：{{$data->content}}</p>
    <p><input type="button" class="yes" value="点赞">  <input type="button" id="no" value="取消点赞"></p>
</table>
<script src="/js/jq.js"></script>
<script>
    $('.yes').click(function(){
        var id={{$data->id}};
        // alert(id);   
        $.ajax({
            url:"{{url('admin/dian')}}",
            data:{id:id},
            success:function(res){
                
            }
        })     
    })
    $('#no').click(function(){
        var id={{$data->id}};
        // alert(id);   
        $.ajax({
            url:"{{url('admin/qu')}}",
            data:{id:id},
            success:function(res){
                
            }
        })     
    })
</script>