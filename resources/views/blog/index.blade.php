@extends('template/templateMain')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">List of Blog Posts</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog <i class="ph-paper-plane-tilt ms-2"></i></a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
    @endif
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card h-100">
                <div class="card-header">
                Author: {{ $post->user->name }}
                </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>

                        <br/>
                        <a href="{{ route('blogs.comments', $post->id) }}">View all comments</a>
                        <form method="POST" action="{{ route('comment.store') }}">
                        @csrf
                        <textarea class="form-control" name="content" id="content" rows="3" placeholder="Type your comment..." required></textarea>
                        <br/>
                        <input type="hidden" name="blog_id" value="{{ $post->id }}">
                            <div class="d-flex align-items-center">
								<div>
								 <a href="#" class="btn btn-light btn-icon border-transparent rounded-pill btn-sm me-1" data-bs-popup="tooltip" title="" data-bs-original-title="Formatting">
								            	<i class="ph-text-aa"></i>
								 </a>
								<a href="#" class="btn btn-light btn-icon border-transparent rounded-pill btn-sm me-1" data-bs-popup="tooltip" title="" data-bs-original-title="Emoji">
								        		<i class="ph-smiley"></i>
								</a>
								 <a href="#" class="btn btn-light btn-icon border-transparent rounded-pill btn-sm me-1" data-bs-popup="tooltip" title="" data-bs-original-title="Send file">
								<i class="ph-paperclip"></i>
								 </a>
							 </div>

                        <button type="submit" class="btn btn-sm btn-primary ms-auto">Add Comment</button>
                        </form>
									</div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('blogs.edit', $post->id) }}" class="btn btn-secondary me-2">
                    Edit<i class="ph-pencil ms-2"></i> 
                    </a>
                    <form action="{{ route('blogs.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                        Delete<i class="ph-trash-simple ms-2"></i> 
                        </button>
                    </form>
                </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Display pagination links -->
    <div class="mt-4 pagination-sm">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
@endsection
