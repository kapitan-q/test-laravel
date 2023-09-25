<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\Interfaces\DataRepositoryInterface;

class DataController extends Controller
{
    private $dataRepository;

    public function __construct(DataRepositoryInterface $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $requestData = $request->json();

        $items = $this->dataRepository->filterBy([
            'name'      => $requestData->getString('name'),
            'bedrooms'  => $requestData->getDigits('bedrooms'),
            'bathrooms' => $requestData->getDigits('bathrooms'),
            'garages'   => $requestData->getDigits('garages'),
            'storeys'   => $requestData->getDigits('storeys'),
            'price'     => $requestData->all('price'),
        ]);

        return response()->json( $items );
    }
}
