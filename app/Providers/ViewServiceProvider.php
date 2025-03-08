<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\CourseDetails;
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
        View::composer('student.*', function ($view) {
            if (Auth::check()) {
                $coursedetails = CourseDetails::where('course_id', Auth::user()->course_id)
                    ->where('status', 1)
                    ->orderBy('priority', 'asc')
                    ->get();

                $message_count = Message::where('phone', Auth::user()->phone)->count();
                $messages = Message::where('phone', Auth::user()->phone)->latest()->take(3)->get();

                // Share these variables with all views
                $view->with('coursedetails', $coursedetails)
                     ->with('message_count', $message_count)
                     ->with('messages', $messages);
            }
        });
    }

}
