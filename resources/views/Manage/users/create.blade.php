<x-backend-layout>



    @if(session('status'))
    @php

    $message = session('status')
    @endphp
    <x-alert :message="$message" />

    @endif

    <div class=" rounded-lg shadow-md p-5">
        <!-- Header -->
        <div class="px-4 py-2 border-b border-gray-200 flex justify-between">
            <h3 class="text-lg font-semibold text-gray-800">Create a User</h3>
            <a href="{{url('dashboard/users')}}" class="text-lg font-semibold text-gray-800 bg-primary text-white p-3 rounded-md ">back</a>

        </div>

        <!-- Body -->
        <form method="POST" action="{{url('dashboard/users')}}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Role -->
            <div class="mt-4">
                <label for="" class="block">Roles</label>
                <select name="roles[]" class="w-full" multiple>
                    <option value="">Select Role</option>

                    @foreach($Roles as $role)

                    <option value="{{$role}}">{{$role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                <button type="submit" class="bg-blue-700 text-white p-2 rounded-md hover:underline  dark:text-blue-500">Create</button>

            </div>
        </form>

        <!-- Footer -->

    </div>


</x-backend-layout>