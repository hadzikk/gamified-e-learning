<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posted</title>
</head>
<body>
    @foreach ($posts as $post)
        <div>
            <span>{{ $post->id }}</span>
            <span>{{ $post->user_id }}</span>
            <span>{{ $post->user->first_name }}</span>
            <span>{{ $post->title }}</span>
            <span>{{ $post->subject }}</span>
            <span>{{ $post->level }}</span>
        </div>
    @endforeach
</body>
</html>