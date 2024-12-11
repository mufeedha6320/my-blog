@extends('templates.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $blog->title }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">By {{ $blog->user->name }} on {{ $blog->created_at->format('F j, Y') }}</p>
                    <p>{!! $blog->content !!}</p>

                    <hr>
                    <h5 class="mb-2">Reviews</h5>
                    @foreach($blog->reviews as $review)
                        <div class="review">
                            <strong>{{ $review->user->name }}</strong> -
                            <p class="ml-2">{{ $review->content }}</p>
                        </div>
                    @endforeach

                    @auth
                    <form action="{{ route('review.store', encrypt($blog->id) ) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Write Your Review</label>
                            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                    @else
                        <p>You need to <a href="{{ route('user.login') }}">log in</a> to submit a review.</p>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
