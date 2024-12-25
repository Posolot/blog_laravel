<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
class PublishScheduledPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:publish-scheduled-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish scheduled posts';
    /**
     * Execute the console command.
     */
    public function handle()
    {
         Post::where('is_published', false)
            ->where('published_at', '<=', now())
            ->update(['is_published' => true]);

        $this->info('Scheduled posts published.');
    }
}
