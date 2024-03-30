@extends('template/templateMain')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Create New Blog</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <!-- Hidden user_id input, you can remove it if not needed -->
                <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                <button type="submit" class="btn btn-primary">Create <i class="ph-paper-plane-tilt ms-2"></i></button>
            </form>
        </div>
    </div>
@endsection
