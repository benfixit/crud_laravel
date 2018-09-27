<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $commonInfo = [
            'author' => 'Inya Chukwuemeka',
            'company' => "Codeline",
            'task_name' => 'Codeline Laravel Test'
        ];

        View::share('_common_info', $commonInfo);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
