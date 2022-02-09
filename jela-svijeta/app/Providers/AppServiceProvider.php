<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{

    private function and($b1, $b2) {
        return $b1 && $b2;
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('integer_null', function ($attribute, $value, $parameters, $validator) {
            return is_numeric($value) && is_int($value + 0) || $value === 'NULL' || $value === '!NULL';
        });

        Validator::extend('integer_array', function ($attribute, $value, $parameters, $validator) {
            $array = explode(',', $value);
            if (array_reduce(array_map('is_numeric', $array), 'self::and' , True) == False) return false;
            else {
                return array_reduce(
                    array_map(function ($item) {
                        return is_int($item + 0);
                    }, $array), 'self::and' , True);
            }
        });

        Validator::extend('with_array', function ($attribute, $value, $parameters, $validator) {
            $array = explode(',', $value);
            $allowed_attributes = ['category', 'tags', 'ingredients'];
            return is_array($array) && 
                    array_reduce(array_map(
                        function ($item) use ($allowed_attributes) {
                            return in_array($item, $allowed_attributes);
                        }, $array), 'self::and' , True);
        });
    }
}