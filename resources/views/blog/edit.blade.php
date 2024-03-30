@extends('template/templateMain')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Blog Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('blogs.update', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Title') }}</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">{{ __('Content') }}</label>
                                <textarea id="content" class="form-control" name="content" required>{{ $post->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
