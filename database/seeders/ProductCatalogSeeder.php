<?php

namespace Database\Seeders;

use App\Product\Models\Product;
use App\Property\Models\Property;
use Illuminate\Database\Seeder;

class ProductCatalogSeeder extends Seeder
{
    public function run()
    {
        $properties = [
            'Цвет' => ['Красный', 'Синий', 'Черный', 'Белый'],
            'Материал' => ['Дерево', 'Металл', 'Пластик', 'Стекло'],
            'Бренд' => ['IKEA', 'Philips', 'Leroy Merlin', 'H&M Home'],
            'Размер' => ['S', 'M', 'L', 'XL']
        ];

        $createdProperties = [];
        foreach ($properties as $name => $values) {
            $property = Property::create(['name' => $name]);
            $createdProperties[$name] = [
                'model' => $property,
                'values' => $values
            ];
        }

        $products = [
            'Настольная лампа' => ['Цвет' => ['Красный', 'Черный'], 'Материал' => ['Металл'], 'Бренд' => ['IKEA']],
            'Диван' => ['Цвет' => ['Синий', 'Белый'], 'Материал' => ['Дерево', 'Ткань'], 'Бренд' => ['Leroy Merlin']],
            'Стул' => ['Цвет' => ['Черный'], 'Материал' => ['Дерево'], 'Бренд' => ['IKEA', 'H&M Home']],
            'Шкаф' => ['Цвет' => ['Белый'], 'Материал' => ['Дерево', 'Стекло'], 'Бренд' => ['Leroy Merlin']],
            'Ковер' => ['Цвет' => ['Красный', 'Синий'], 'Материал' => ['Шерсть'], 'Бренд' => ['H&M Home']]
        ];

        foreach ($products as $name => $productProperties) {
            $product = Product::create([
                'name' => $name,
                'price' => rand(1000, 10000),
                'quantity' => rand(1, 50)
            ]);

            foreach ($productProperties as $propertyName => $values) {
                $property = $createdProperties[$propertyName]['model'];
                $availableValues = $createdProperties[$propertyName]['values'];

                foreach ($values as $value) {
                    if (in_array($value, $availableValues)) {
                        $product->properties()->attach($property->id, [
                            'value' => $value
                        ]);
                    }
                }
            }
        }
    }
}
