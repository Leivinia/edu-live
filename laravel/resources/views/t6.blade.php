<form action="{{ url('day4/t6') }}" enctype="multipart/form-data" method="post">
    {{csrf_field()}}
    <input type="file" name="image" /> <br>
    <input type="submit" value="上传" />
</form>