<?php

declare (strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'images' => 'mimes:jpg,jpeg,png'
        ];
    }

    public function authorize()
    {
        return true;
    }
}