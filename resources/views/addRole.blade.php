<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
`   @endif
    <form action="/addRole" method="POST">
        @csrf
        <label for="">Nama</label>
        <input type="text" name="name" placeholder="Isi Nama"><br>
        <label for="">jabatan</label>
        <input type="text" name="role" placeholder="Role sebagai apa"><br>
        <label for="">Id Role</label>
        <input type="text" name="IdRole" placeholder="Id untuk role ke brp"><br>
        <input type="submit" value=submit>
    </form>
    <table border=1>
        <tr>
            <th>name</th>
            <th>Jabatan</th>
            <th>Id ROle</th>
            <th>Action</th>
        </tr>
        @foreach($roles as $role)
        <tr>
        <td>{{$role->name}}</td>
        <td>{{$role->role}}</td>
        <td>{{$role->role_id}}</td>
        <td><a href="{{url('addRole/'.$role->id.'/edit')}}">Edit</a> <a href="">Delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
