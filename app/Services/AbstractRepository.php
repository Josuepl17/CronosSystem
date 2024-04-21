<?php


namespace App\services\AbstractRepository;

use Illuminate\Database\Eloquent\Model;

 class  AbstractRepository
{

    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function selectCoditions($coditions)
    {
        $expressions = explode(';', $coditions);

        foreach ($expressions as $e) {
            $exp = explode(':', $e);
            $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
        }
    }

    

    public function selectFilter($filters)
    {
        $this->model = $this->model->select($filters);
    }


    public function getResult()
    {
        return $this->model;
    }
}
