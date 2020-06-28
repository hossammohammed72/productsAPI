<?php

namespace App\Http\Controllers;

use App\Services\ProductListingService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductListingService
     */
    private $productListingService;
    /**
     * ProductController constructor.
     * @param ProductListingService $productListingService
     */
    public function __construct(ProductListingService $productListingService)
    {
        $this->productListingService = $productListingService;
    }

    /**
     * @param Request $request
     */
    public function index(Request $request){

        $productData = $this->productListingService->list();
        return response()->json($productData,200);
    }
}
