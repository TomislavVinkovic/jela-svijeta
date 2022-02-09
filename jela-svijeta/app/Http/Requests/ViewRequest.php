<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViewRequest extends FormRequest
{
    protected $redirect = '?lang=en';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lang' => 'required'
        ];
    }
}