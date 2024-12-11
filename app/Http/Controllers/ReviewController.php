<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteReviewJob;
use App\Models\Blog;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function DeleteReviews($review){
        DeleteReviewJob::dispatch($review);
    }

    public function store(Request $request, $blogId) {
        if(!Auth::check()){
            return redirect()->route('user.login')->with('message', 'You need to login!');
        }
        try{

            $request->validate([
                'content' => 'required|string|max:1000',
            ]);

            $blogId = decrypt($blogId);
            $blog = Blog::findOrFail($blogId);


            $review = new Review();
            $review->user_id = Auth::id();
            $review->blog_id = $blog->id;
            $review->content = $request->content;
            $review->save();

            return back();

        } catch(Exception $e){
            return redirect()->back()->with('message', 'Please try again later!');
        }
    }
}
