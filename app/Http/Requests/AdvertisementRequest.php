<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'category' => 'required',
            'address' => 'required',
            'town' => 'required',
            'price' => 'required',
            'images' => 'mimes:jpg,jpeg,png'
        ];
    }

    public function authorize()
    {
        return true;
    }
}

