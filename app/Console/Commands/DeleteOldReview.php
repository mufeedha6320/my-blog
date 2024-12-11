<?php

namespace App\Console\Commands;

use App\Jobs\DeleteReviewJob;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteOldReview extends Command
{
    protected $signature = 'delete:old-reviews';
    protected $description = 'Delete old reviews';

    public function handle()
    {
        $reviews = DB::table('reviews')
                ->where('created_at', '<', Carbon::now()->subDays(7))
                ->get();

        DeleteReviewJob::dispatch($reviews);

        return 0;
    }

}
