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
            <h3 class="text-lg font-semibold text-gray-800">Role: {{$role->name}}</h3>
            <a class="text-lg font-semibold text-gray-800 bg-primary text-white p-3 rounded-md " href="{{url('dashboard/roles')}}">Back</a>

        </div>

        <!-- Body -->


        <div class="w-full mx-auto  p-4 bg-white border border-t-0 border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form class="space-y-6" action="{{ url('dashboard/roles/'.$role->id.'/give-permission')}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    @error('permission')
                    <span class="text-warning">{{$message}}</span>
                    @enderror
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission</label>
                    <div class="grid grid-cols-4 gap-4">

                        @foreach($permissions as $permission)

                        <label>

                            <input type="checkbox" name="permission[]" value="{{$permission->name}}" {{in_array($permission->id, $rolePermisssions) ? 'checked':''}} id="name" />
                            {{$permission->name}}
                        </label>



                        @endforeach
                    </div>

                </div>
                <!-- <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div> -->


                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    <button class="bg-blue-700 text-white p-3 rounded-md hover:underline dark:text-blue-500" type="submit">Update</button>

                </div>
            </form>
        </div>


        <!-- Footer -->

    </div>


</x-backend-layout>