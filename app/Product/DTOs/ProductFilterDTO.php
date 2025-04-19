<?php

namespace App\Product\DTOs;

class ProductFilterDTO
{
    public array $properties = [];

    public int $page = 1;

    public int $perPage = 40;
}
