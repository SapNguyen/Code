<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <title>Document</title>
    <style>
        td{
            padding-left:20%;
        }
    </style>
</head>
<body>
    <main>
    <form action="/main" method="post">
        @csrf
        <h1 align=center>LOGIN </h1>
        <table align=center width=500 border=0>
            @include('error')
            <tr>
                <td>User:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>
                    <input type=submit name=cmd value="Đăng ký">
                </td>
                <td>
                    
                    <input type=reset value="Reset">
                </td>

            </tr>
        </table>
    </form>
    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mật khẩu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logins as $login)
                <tr>
                    <td>{{$login->id}}</td>
                    <td>{{$login->name}}</td>
                    <td>{{$login->email}}</td>
                    <td>{{$login->password}}</td>
                    <td>{{$login->soluongsv}}</td>
                    
                </tr>
            @endforeach
            <tr></tr>
        </tbody>
    </table> --}}
    </main>
</body>
</html>