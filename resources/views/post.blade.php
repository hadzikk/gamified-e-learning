<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="{{ asset('css/post.scss') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="task-container">
        @foreach ($posts as $post)
        <div class="task-post">
            <div class="task-post-navigation">
                <div class="task-level-container">
                    <span class="task-level-label">{{ $post['level'] }}</span>
                    @if ($post['level'] == 'basic')
                    <i class="fa-regular fa-chess-pawn"></i>
                    @elseif ($post['level'] == 'advance')
                    <i class="fa-regular fa-chess-knight"></i>
                    @else
                    <i class="fa-regular fa-chess-queen"></i>
                    @endif
                </div>

                <div class="task-subject-wrapper">
                    <span class="task-subject">{{ $post['subject'] }}</span>
                </div>
            </div>
            <p class="task-post-title">{{ $post['title'] }}</p>
            {{-- <p style="font-size: 12px; color: gray;">{{ $post->created_at->diffForHumans() }}</p> --}}
            <div class="task-post-footer">
                <span class="task-post-author">{{ $post->user->first_name }} {{ $post->user->last_name }} <span style="text-transform: capitalize;">{{ $post->user->degree }}</span></span>
                <a class="task-preview-link" href="review/{{ $post['slug'] }}">lihat detail</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>