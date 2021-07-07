<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class TweetWin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $gift;
    protected $tweetContent;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Gift $gift)
    {
        $this->gift = $gift->withoutRelations();

        $intros = config('twitter.intros');
        $intro = $intros[array_rand($intros)];

        $this->tweetContent = "{$intro} Someone won a beautiful gift on snapwin ! There was a 1 in {$gift->win_probability} chance to happen! https://snapwin.it/activity";
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // pass
    }
}
