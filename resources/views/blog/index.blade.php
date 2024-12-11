@extends('templates.main')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="mt-2">
                <h3 class="text-center mb-4"><b>Blog Posts</b></h3>

                <div class="list-group">
                    @if ($blogs->isEmpty())
                        <div class="alert alert-info text-center">
                            <strong>No blogs found! Be the first blogger.</strong>
                        </div>
                    @else
                        @foreach($blogs as $blog)
                            <a href="{{ route('display', encrypt($blog->id)) }}" class="list-group-item list-group-item-action mb-1">
                                <h2 class="mb-1"><b>{{ $blog->title }}</b></h2>
                                <div>{!! Str::limit($blog->content, 150) !!}</div>
                                <small>By {{ $blog->user->email }}</small>
                            </a>
                        @endforeach
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-4 mb-3">
                    {{ $blogs->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
