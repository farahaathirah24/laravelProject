<div class="sidebar-widget">
    <h3>Recent Posts</h3>
    <ul>
        @foreach($recentPosts as $post)
            <li><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
</div>
