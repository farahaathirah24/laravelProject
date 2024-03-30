@extends('template/templateMain')

@section('content')
    <div class="container">
        <h1>Comments for Blog Post "{{ $blog->title }}"</h1>
        @if ($comments->isNotEmpty())
            <ul>
                @foreach ($comments as $comment)
                    <li>{{ $comment->content }}</li>
                @endforeach
            </ul>
        @else
            <p>No comments yet.</p>
        @endif
    </div>
@endsection
