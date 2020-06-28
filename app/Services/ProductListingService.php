<?php
namespace App\Services;

use App\Repositories\ProductRepository;

/**
 * Class ProductListingService
 * @package App\Services
 */
class ProductListingService{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * ProductListingService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    /**
     *
     */
    public function list(){
        return $this->productRepository->listAll();
    }
}

?>
