<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\PostContract;
use App\Repository\PostRepository;
use App\Contract\CommentContract;
use App\Repository\CommentRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->useRepositories();
    }

    // TODO: Write Method Documentation
    protected function useRepositories()
    {
        $services = [
            PostContract::class => PostRepository::class,
            CommentContract::class  => CommentRepository::class,
        ];

        foreach ($services as $key => $value) {
            $this->app->singleton($key, $value);
        }
    }
}
