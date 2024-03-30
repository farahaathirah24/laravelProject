@extends('template/templateMain')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
                <div class="card">
                    <div class="card-header">{{ __('Search Movies') }}</div>

                    <div class="card-body">
                        <form method="GET" action="{{ route('movies.search') }}">
                            <div class="mb-3">
                                <label for="query" class="form-label">{{ __('Movie Title') }}</label>
                                <input id="query" type="text" class="form-control" name="query" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(isset($movies) && count($movies) > 0)
        <div class="row mt-4">
            @foreach($movies as $movie)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie['title'] }}</h5>
                        <p class="card-text">{{ $movie['overview'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
