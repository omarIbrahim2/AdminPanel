<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserReq;
use App\Http\Requests\updateUserReq;
use App\Models\User;

use Illuminate\Http\Request;

use App\Utitlities\UserAction;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    private UserAction $action;
    public function __construct(UserAction  $action)
    {
        $this->action = $action;

        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $Users = $this->action->setModel(User::class)->getData([
            "id","Fname" , "lname" , "email"  , "created_at"
        ] , 6);

    


        return view("profile.Users")->with([
            'Users' => $Users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get()->where('id' , "!=" , 1);
        
        return view("profile.create")->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddUserReq $request)
    {
        $data = $request->validated();

        $data['ipAdress'] = $request->ip();

       return $this->action->setModel(User::class)->AddModel($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
         $roles = Role::get()->where('id' , "!=" , 1);
         
        return view("profile.edit")->with([
            'user' => $user,
            'roles'=> $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateUserReq $request, User $user)
    {
         
       return  $this->action->UpdateModel($request->validated() , $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        
       return $this->action->deleteRecord($user);
    }
}
