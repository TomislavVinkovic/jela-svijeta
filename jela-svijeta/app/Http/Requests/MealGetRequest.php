<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MealGetRequest extends FormRequest
{

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'lang' => 'required|in:hr,en',
            'per_page' => 'numeric|min:1',
            'page' => 'numeric|min:1',
            'category' => 'integer_null',
            'tags' => 'integer_array', //custom validation rule
            'with' => 'with_array', // custom validation rule
            'diff_time' => 'numeric' //custom validation rule
        ];
    }

    //messages that will be sent to the user depending on the error
    public function messages() {
        return [
            'lang.required' => 'Specifying a language is required',
            'per_page.numeric' => 'The per page value must be an integer',
            'page.numeric' => 'The page value must be an integer',
            'category.integer_null' => 'The category value must be either an integer, NULL or !NULL',
            'tags.integer_array' => 'The tags value must be an array of integers',
            'with.with_array' => 'The with value must be an array, and it must consist only of the following values: ["category", "tags", "ingredients"]',
            'diff_time.numeric' => 'diff_time must be a valid unix timestamp'
        ];
    }
}