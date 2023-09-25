<?php 

namespace App\Repositories;

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
}