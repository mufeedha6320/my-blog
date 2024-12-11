<?php

namespace App\Jobs;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DeleteReviewJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reviews;

    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    public function handle()
    {
        foreach ($this->reviews as $review) {
            Review::find($review->id)->delete();
        }
    }
}
