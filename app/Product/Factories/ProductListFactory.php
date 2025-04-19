<?php

namespace App\Product\Factories;

use App\Product\DTOs\ProductFilterDTO;
use Illuminate\Http\Request;

class ProductListFactory
{
    public static function fromRequest(Request $request): ProductFilterDTO
    {
        $dto = new ProductFilterDTO();

        $dto->properties = $request->get('properties', []);
        $dto->page = (int) $request->get('page');
        $dto->perPage = (int) $request->get('perPage');

        return $dto;
    }
}
