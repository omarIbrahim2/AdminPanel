<?php

namespace App\Utitlities;

use App\Utitlities\contracts\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserAction extends Action{

    public function getData($attributes , $pages){
        
        return $this->model::with("roles")->select($attributes)->paginate($pages);
    }

    public function UpdateModel(array $data, Model $model){
    
        $model->roles()->sync($data['role']);
         
        $model->update(Arr::except($data , ['role']));
          
        return redirect()->route('users.index')->with('success' , "updated successfully");
    }

    public function AddModel(array $data){

        $data['password'] = Hash::make($data['password']);
       $user = $this->model::create(Arr::except($data , ['role']));
       
       $user->roles()->attach($data['role']);

       return redirect()->route('users.index')->with('success' , "created successfully");
    }

 

    
}