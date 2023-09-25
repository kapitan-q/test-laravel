<?php

namespace App\Http\Controllers;

use App\Repositories\DataRepository;
use App\Repositories\Interfaces\DataRepositoryInterface;

class FilterSetupController extends Controller
{
    private $dataRepository;

    public function __construct(DataRepositoryInterface $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function index()
    {
        return response()->json([
            'priceRange' => $this->dataRepository->getPriceRange()
        ]);
    }
}
