<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Blade::directive('label', function ($label) {
			return "{{ Form::label(".$label.") }}";
        });
		
		Blade::directive('input', function ($input_name) {
			return "{{ Form::input('text', ".$input_name.", null, ['class' => 'form-control']) }}";
        });
		Blade::directive('email', function ($input_name) {
			return "{{ Form::input('email', ".$input_name.", null, ['class' => 'form-control']) }}";
        });
		Blade::directive('textarea', function ($textarea_name) {
			return "{{ Form::textarea(".$textarea_name.", null, ['class' => 'form-control']) }}";
       
        });
		Blade::directive('file', function ($file_name) {
			return "{{ Form::file(".$file_name.", ['class' => 'form-control','id' => 'myfile']) }}";
        });
		
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
