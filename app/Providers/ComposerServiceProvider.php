<?php

namespace App\Providers;
use View;
use App\Notification;
use Illuminate\Support\ServiceProvider;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view){

            $note = Notification::where(['estado'=>'0'])->get();
            $count = $note->count();
            $view->with('count_noteficaion', $count);
        });
    }
}
