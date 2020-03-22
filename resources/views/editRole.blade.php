<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action="{{url('addRole/'.$viewRole->id.'/update')}}" method="POST">
        @csrf
        <label for="">Nama</label>
    <input type="text" name="name" value="{{$viewRole->name}}"><br>
        <label for="">jabatan</label>
        <input type="text" name="role" value="{{$viewRole->role}}"><br>
        <label for="">Id Role</label>
        <input type="text" name="IdRole" value="{{$viewRole->role_id}}"><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
