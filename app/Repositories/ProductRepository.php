<?php
namespace App\Repositories;

use App\Interfaces\DataSourceInterface;

class ProductRepository{
    /**
     * @var DataSourceInterface
     */
        private $dataSource;
    /**
     * ProductRepository constructor.
     * @param DataSourceInterface $dataSource
     */
    public function __construct(DataSourceInterface $dataSource)
    {
    $this->dataSource = $dataSource;
    }
    public function listAll(){
        return $this->dataSource->get();
    }

}

?>
