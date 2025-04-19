<?php

namespace App\Product\Controllers;

use App\Product\Factories\ProductListFactory;
use App\Product\Queries\ProductQuery;
use App\Product\Requests\ProductListRequest;
use App\Product\Resources\ProductResource;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index(ProductListRequest $request, ProductQuery $productQuery): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $dto = ProductListFactory::fromRequest($request);

        $products = $productQuery->getProductsList($dto);

        return ProductResource::collection($products);
    }
}
