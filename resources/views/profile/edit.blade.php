<x-app-layout>
    <div class="w-1/2 mx-auto">
        <div class="py-6 text-white">
            <a href="{{route("users.index")}}">Back to users</a>
            <h2 class="">{{$user->Fname}}</h2>
        </div>

        <div class="shadow-md rounded border-light bg-[#303030] p-6">
            <h3 class="text-white">User Details</h3>
            <form method="POST" action="{{route("users.update" , $user)}}">
                @csrf
                @method('put')
            <div class="flex gap-6 mt-6">
                <input type="hidden" name="id" value="{{$user->id}}">
                <div>
                    <label class="text-white block" for="">First Name</label>
                    <input name="Fname" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="text" value="{{$user->Fname}}">
                    <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
                    </div>
                    
                    <div>
                        <label class="text-white block" for="">Last Name</label>
                    <input name="lname" class="block border-b-4 border-white-500 bg-inherit border-0 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="text" value="{{$user->lname}}">
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>


            </div>

            <div class="mt-5 ">
                <label class="text-white block" for="">Email</label>
                <input name="email" class="block border-b-4 border-white-500 bg-inherit text-white border-0 w-3/4 focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white" type="email" value="{{$user->email}}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>


            <div class="mt-5 ">
                <label class="text-white block" for="">Role</label>
                <select name="role" class="block border-b-4 border-white-500 bg-inherit border-0 w-3/4 text-white focus:ring-4 focus:outline-none focus:ring-[#303030] focus:border-b-white">
                    <option  disabled>Roles</option>
                    @foreach ($roles as $role)
                    <option class="text-black" value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </select>
            </div>



            <div class="mt-5  ">
                <button type="submit" class="outline outline-[#FFCC34] rounded-full p-2 text-[#FFCC34] hover:bg-[#FFCC34] hover:text-white">Apply Changes</button>
            </div>
        </form>

        </div>
    </div>

    </div>
</x-app-layout>
