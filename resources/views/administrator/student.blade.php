<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator - Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="{{ asset('css/administrator/dashboard.scss') }}">
</head>
<body>
    <table border="0" cellspacing="0" cellpadding="0" border="1">
        <tr>
            <th>id</th>
            <th>profile_picture</th>
            <th>username</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>degree</th>
            <th>email</th>
            <th>password</th>
            <th>role</th>
            <th>score</th>
            <th>remember_token</th>
            <th>created_at</th>
            <th>updated_at</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->profile_picture }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->degree }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->score }}</td>
            <td>{{ $user->remember_token }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>