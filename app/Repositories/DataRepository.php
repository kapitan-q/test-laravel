<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\DataRepositoryInterface;
use App\Models\Data;

class DataRepository implements DataRepositoryInterface
{
    public function getPriceRange(): array
    {
        return [ 
            'min' => Data::min('price'), 
            'max' => Data::max('price'),
        ];
    }

    public function filterBy(array $requestDto): Collection 
    {
        $query = Data::query();
        $query->select(['id', 'name', 'bedrooms_count', 'bathroom_count', 'garage_count', 'storey_count', 'price']);

        if (!empty($requestDto['name'])) {
            $query->where('name', 'like', '%'. $requestDto['name'] .'%');
        }

        foreach(['bedrooms' => 'bedroom_count', 'bathrooms' => 'bathroom_count', 'garages' => 'garage_count', 'storeys' => 'storey_count'] as $extName => $intName) {
            if (!empty($requestDto[ $extName ])) {
                $query->where($intName, $requestDto[ $extName ]);
            }
        }

        if (!empty($requestDto['price'])) {
            if (!empty($requestDto['price'][0])) {
                $query->where('price', '>=', $requestDto['price'][0]);
            }

            if (!empty($requestDto['price'][1])) {
                $query->where('price', '<=', $requestDto['price'][1]);
            }
        }

        return $query->get();
    }
}