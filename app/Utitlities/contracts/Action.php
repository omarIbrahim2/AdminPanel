<?php

namespace App\Utitlities\contracts;

use Illuminate\Database\Eloquent\Model;


abstract class Action{

    protected  $model;
    abstract public function getData($attributes , $pages); 

    public function setModel($model = Model::class){
        $this->model = $model;
        return $this;
    }

    public function deleteRecord(Model $model){
        $this->model = $model;
        $this->model->delete();
        return back()->with("success" , "Deleted successfully");
    }

    abstract public function UpdateModel(array $data , Model $model);


    
}