<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="{{ asset('icons/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/student/navbar.scss') }}">
    <link rel="stylesheet" href="{{ asset('css/student/post.scss') }}">
</head>
<body>
    <x-student.navbar></x-student.navbar>
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
        <!-- Pagination -->
<div class="pagination">
    @if ($posts->onFirstPage())
        <span>Previous</span>
    @else
        <a href="{{ $posts->previousPageUrl() }}">Previous</a>
    @endif

    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
        @if ($page == $posts->currentPage())
            <span>{{ $page }}</span>
        @else
            <a href="{{ $url }}">{{ $page }}</a>
        @endif
    @endforeach

    @if ($posts->hasMorePages())
        <a href="{{ $posts->nextPageUrl() }}">Next</a>
    @else
        <span>Next</span>
    @endif
</div>

<!-- Showing Results -->
<div class="showing-results">
    <p>Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results</p>
</div>

<script src="{{ asset('js/event.js') }}"></script>

</body>
</html>