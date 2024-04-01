<x-app-layout>
    <div class="w-1/2 mx-auto">
        <div class="py-6 text-white">
            <a href="{{route("users.index")}}">Back to users</a>

        </div>
          {{$errors}}
        <div class="shadow-md rounded border-light bg-[#303030] p-6">
            <h3 class="text-white">Add  User</h3>
            <form method="POST" action="{{route("users.store")}}">
                @csrf

            <div class="flex gap-6 mt-6">
                <div>
                    <label class="text-white block" for="">First Name</label>
                    <input name="Fname" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="text" >
                    <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
                    </div>
                    
                    <div>
                        <label class="text-white block" for="">Last Name</label>
                    <input name="lname" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="text" >
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>
            </div>

            <div class="mt-5 ">
                <label class="text-white block" for="">Email</label>
                <input name="email" class="block border-b-4 border-white-500 bg-inherit text-white border-0 w-3/4 focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="email"  />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <div class="mt-5 ">
                <label class="text-white block" for="">Role</label>
                <select name="role" class="block border-b-4 border-white-500 bg-inherit border-0 w-3/4 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white">
                    <option  disabled>Roles</option>
                    @foreach ($roles as $role)
                    <option class="text-black" value="{{$role->id}}"> {{$role->name}}</option>
                    @endforeach
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </select>
            </div>

            <div class="flex gap-6 mt-6">
                <div>
                    <label class="text-white block" for="">password</label>
                    <input name="password" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="password" >
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <div>
                        <label class="text-white block" for="">confirm Password</label>
                    <input name="password_confirmation" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="password" >
                
                </div>
            </div>



            <div class="mt-5  ">
                <button type="submit" class="outline outline-[#FFCC34] rounded-full p-2 text-[#FFCC34] hover:bg-[#FFCC34] hover:text-white">Submit</button>
            </div>
        </form>

        </div>
    </div>

    </div>
</x-app-layout>
