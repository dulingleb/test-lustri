<?php

namespace App\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'properties' => ['sometimes', 'array'],
            'properties.*' => ['array'],
            'properties.*.*' => ['string'],
        ];
    }
}
