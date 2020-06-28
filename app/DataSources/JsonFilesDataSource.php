<?php
namespace App\DataSources;
use App\Interfaces\DataSourceInterface;
use App\Services\GetRequestFiltersService;
use Illuminate\Http\Request;

class JsonFilesDataSource implements DataSourceInterface {
    /**
     * @var Request
     */
    private $request;
    /**
     * @var GetRequestFiltersService
     */
    private $filteringService;
    /**
     * @var array
     */
    private $jsonDataSourcesFiles;

    /**
     * JsonFilesDataSource constructor.
     * @param Request $request
     * @param GetRequestFiltersService $filteringService
     */
    public function __construct(GetRequestFiltersService $filteringService)
    {
        $this->filteringService = $filteringService;
        $this->jsonDataSourcesFiles = config('json-data-sources.providers');
    }

    public function get(){

        return $this->readFormattingFiles();
    }
    public function readFormattingFiles(){

        $output = [];
        $arrayCount = 0;
        foreach ($this->jsonDataSourcesFiles as $provider=>$data){
            if($this->filteringService->providerApplicable($provider)){
                $formattingArray = json_decode(file_get_contents(storage_path().$data['formatter']),true);
                $dataArray =  json_decode(file_get_contents(storage_path().$data['source']),true);
                $output = array_merge($this->parseData($formattingArray,$dataArray,$arrayCount),$output);
                $arrayCount = count($output);
            }

        }
        return $output;

    }
    public function parseData($formatting,$data,$cnt=0){
        $formattedData = [];
        $cnt = 0;
        foreach ($data as $row){
            foreach ($formatting as $original=>$mapped){
                if($mapped)
                if(is_array($mapped) && isset($mapped['allowedValues'])){
                    $formattedData[$cnt][$original] = array_search($row[$mapped['key']],$mapped['allowedValues']);
                }elseif(!is_array($mapped)){
                    $formattedData[$cnt][$original] = $row[$mapped]??null;
                }
            $filtersAssignedToAttribute =$this->filteringService->getFiltersByAttribute($original);
            if(!$this->filteringService->passesFilteringCriteria($formattedData[$cnt][$original],$filtersAssignedToAttribute)){
                unset($formattedData[$cnt]);
                break;
            }
            }

            $cnt++;
        }
        return $formattedData;
    }



}
?>
