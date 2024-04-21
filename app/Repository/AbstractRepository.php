<?php
namespace App\Repository;
use Illuminate\Database\Eloquent\Model;


class  AbstractRepository
{


    public $model;
    
    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function selectCoditions($conditions)
    {
     
        $expressions = explode(';', $conditions);

        foreach ($expressions as $e) {
            $exp = explode(':', $e);

            
            return $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
            
        }
        
    }

    

    public function selectFilter($filters)
    {
        $filters = explode(',', $filters);
        return $this->model = $this->model->select($filters);
        
    }


    public function getResult()
    {
        return $this->model;
    }
}



?>