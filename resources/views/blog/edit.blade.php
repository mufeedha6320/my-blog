@extends('templates.main')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Update Blog Post</h2>

        <div class="blog-form">
            <form action="{{ route('blog.update', encrypt($blog->id) ) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" id="title" name="title" required value="{{ $blog->title }}">
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label">Blog Content</label>
                    <textarea class="form-control" id="editor" name="content" rows="5" required>{{ $blog->content }}</textarea>
                </div>


                <button type="submit" class="btn btn-primary w-100">Update Blog</button>
            </form>
        </div>
    </div>

@endsection
