<div class="student-task">
    <div class="student-task-posts-container">
        @foreach ($posts as $post)
        <div class="student-task-post-container">
            <a class="student-task-post-title" href="{{ $post['link'] }}">{{ $post['title'] }}</a>
            <div class="student-task-post-author-info-container">
                <span class="student-task-post-author-name">{{ $post['lecturer'] }}</span>
                |
                <span class="student-task-post-date">{{ $post['post_date'] }}</span>
            </div>
            <p class="student-task-post-description">{{ Str::limit($post['description'], 355) }}</p>
            <a class="student-task-post-detail" href="/home/{{ $post['id'] }}">lihat detail</a>
        </div>
        @endforeach
    </div>
</div>