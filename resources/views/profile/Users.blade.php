<x-app-layout >
      
     <x-toaster></x-toaster>
    <div class="py-12 w-1/2 mx-auto">
        <div class="flex flex-row justify-between w-100 ml-5">
          <div class="ml-5 text-white">
            <h2>Users</h2>
          </div>
          <div>
            <x-secondary-button>Create New User</x-secondary-button>

          </div>

        </div>


        

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 text-gray-400">
        <thead class="text-xs text-gray-700  bg-gray-50 bg-gray-700 text-gray-400">
            <tr class="text-white">
                <th scope="col" class="px-6 py-3">
                    first name
                </th>
                <th scope="col" class="px-6 py-3">
                    last name
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>

                <th scope="col" class="px-6 py-3">
                    role
                </th>
                <th scope="col" class="px-6 py-3">
                    member since
                </th>

                <th scope="col" class="px-6 py-3">
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Users as $user )
                
            <tr class=" border-b bg-gray-800 border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                    {{$user->Fname}}
                </th>
                <td class="px-6 py-4">
                    {{$user->lname}}
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4">
                    @foreach ($user->roles as $role )
                    {{$role->name}} 
                    @endforeach
                    
                </td>
                <td class="px-6 py-4">
                    {{$user->formatCreatedAt($user->created_at)}} 
                </td>
                <td class="px-6 py-4">
                    <div class="flex">
                        <a href="{{route("users.edit" , $user)}}">
                        
                            <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg>
                        </a>  
                          
                           <form method="POST" class="cursor-pointer" action="{{route("users.destroy" , $user)}}">
                              @csrf
                              @method("delete")
                               
                            <button type="submit"> 
                            <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                              </svg>
                            </button>

                           </form>


                           <a >
                               assign premmision
                           </a>   
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


        {{-- <table style="border-collapse: collapse" class="table-auto text-white w-full">
            <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Member since</th>
                    <th>Actions</th>
                </tr>
            </thead>
    
            <tbody class="p-4">
                @foreach ($Users as $user )
              
                <tr class="bg-[#303030] my-6">
                    <td>{{$user->Fname}}</td>
                    <td >{{$user->lname}}</td>
                    <td >{{$user->email}}</td>
                    <td >Admin</td>
                    <td >{{$user->formatCreatedAt($user->created_at)}}</td>
                    <td>
                        <div class="flex">
                            <a href="{{route("users.edit" , $user)}}">
                            
                                <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </a>  
                              
                               <form class="cursor-pointer" action="">
                                  @csrf
                                 <input type="hidden" name="id" value="{{$user->id}}">
                                   
                                <button type="submit"> 
                                <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                  </svg>
                                </button>

                               </form>


                               <a >
                                   assign premmision
                               </a>
                             
                                  
                            
                        </div>
                    </td>

                </tr>
        
                @endforeach
            </tbody>

        </table> --}}
        <div class="bg-primary mt-5 h-100">
            {{$Users->links("pagination")}}
        </div>

    </div>
</x-app-layout>