<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Repositories\Interfaces\DataRepositoryInterface;

class FilterSetupController extends Controller
{
    private $dataRepository;

    public function __construct(DataRepositoryInterface $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'priceRange' => $this->dataRepository->getPriceRange()
        ]);
    }
}
