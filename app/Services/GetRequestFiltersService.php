<?php
namespace App\Services;

use App\Requests\FilteringRequest;
use Illuminate\Http\Request;

/**
 * Class GetRequestFiltersService
 * @package App\Services
 */

class GetRequestFiltersService{
    /**
     * @var Request
     */
    private $request;

    /**
     * GetRequestFiltersService constructor.
     * @param FilteringRequest $request
     */
    public function __construct(FilteringRequest $request)
    {
        $this->request = $request;
        $this->filtersArray = config('json-data-sources.filters');

    }
    public function passesFilteringCriteria($value,$filtersData){
        foreach ($filtersData as $filtersDatum){
            if( $filtersDatum && $this->request->{$filtersDatum['key']} ){
                if($filtersDatum['filter']::filterRecord($this->request->{$filtersDatum['key']},$value) == false){
                    return false;
                }
            }
        }
        return true;
    }
    public function getFiltersByAttribute($attribute){
        $filters =[];
        foreach ($this->filtersArray as $key=> $value) {
            if($value['attribute'] == $attribute){

                $filters[] = $value;
            }
        }
        return  $filters;
    }
    public function providerApplicable($provider){
        if($this->request->provider){
            $providerFilters[] = $this->filtersArray['provider'];
            return $this->passesFilteringCriteria($provider,$providerFilters);
        }
        return true;
    }

}

?>
