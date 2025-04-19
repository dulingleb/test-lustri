<?php

namespace App\Product\Queries;

use App\Product\DTOs\ProductFilterDTO;
use App\Product\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductQuery
{
    private const int DEFAULT_PER_PAGE = 40;
    private const int DEFAULT_PAGE = 1;

    public function getProductsList(ProductFilterDTO $dto): LengthAwarePaginator
    {
        $query = Product::query();

        foreach ($dto->properties as $optionName => $values) {
            $query->whereHas('properties', function ($q) use ($optionName, $values) {
                $q->where('name', $optionName)
                    ->whereIn('value', $values);
            });
        }

        return $query->paginate(
            perPage: $dto->perPage ?: self::DEFAULT_PER_PAGE,
            page: $dto->page ?: self::DEFAULT_PAGE
        );
    }
}
