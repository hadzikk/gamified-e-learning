<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/home.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/components/global/footer.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/post.scss') }}">
</head>
<body>
    <x-student.navbar>
        <x-slot:title>{{ $title }}</x-slot:title>
    </x-student.navbar>
    
    <div class="home">

    </div>

    <x-global.footer></x-global.footer>
    <script src="{{ asset('js/event.js') }}"></script>
</body>
</html>