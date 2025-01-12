<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/administrator/dashboard.css') }}">
</head>
<body>
    @foreach ($users as $user)
    <div>
        <span>{{ $user->id }}</span>&nbsp;
        <span>{{ $user->profile_picture }}</span>&nbsp;
        <span>{{ $user->username }}</span>&nbsp;
        <span>{{ $user->first_name }}</span>&nbsp;
        <span>{{ $user->last_name }}</span>&nbsp;
        <span>{{ $user->degree }}</span>&nbsp;
        <span>{{ $user->email }}</span>&nbsp;
        <span>{{ $user->password }}</span>&nbsp;
        <span>{{ $user->role }}</span>&nbsp;
        <span>{{ $user->remember_token }}</span>&nbsp;
        <span>{{ $user->created_at }}</span>&nbsp;
        <span>{{ $user->updated_at }}</span>&nbsp;
    </div>
    @endforeach
</body>
</html>