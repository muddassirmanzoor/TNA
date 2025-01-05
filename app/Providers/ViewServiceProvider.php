<?php

namespace App\Providers;

use App\Services\LocationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
            View::composer('*', function ($view) {
                if (Auth::check() && !Auth::user()->hasRole('interviewer') && !Auth::user()->hasRole('invigilator')) {

                    $districts = LocationService::getDistricts();
                    $teacherTypes = LocationService::getTeacherTypes();
                    $teacherQualification = LocationService::getTeacherQualification();

                    $view->with('districts', $districts);
                    $view->with('teacherTypes', $teacherTypes);
                    $view->with('teacherQualification', $teacherQualification);
                }
            });
    }
}
