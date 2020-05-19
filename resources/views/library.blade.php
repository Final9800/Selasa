<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('addBook')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Judul</label>
        <input type="text" name="judul" placeholder="Isi Judul Buku"><br>
        <label for="">Pengarang</label>
        <input type="text" name="author" placeholder=" Nama pengarang Buku"><br>
        <label for="">Cover Buku</label>
        <input type="file" name="coverBook"><br>
        <input type="submit" value=submit>
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Cover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td><img style="height:300px;" src="{{url('storage/'.$book->cover) }}"></td>
               </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
