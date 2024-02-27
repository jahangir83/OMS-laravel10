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
            <h3 class="text-lg font-semibold text-gray-800">Roles</h3>
            <a href="{{url('dashboard/roles/create')}}" class="text-lg font-semibold text-gray-800 bg-primary text-white p-3 rounded-md ">Add New Role</a>

        </div>

        <!-- Body -->
        <div class="p-4">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 font-bold text-lg py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 font-bold text-lg py-3">
                                Name
                            </th>

                            <th scope="col" class="px-6 font-bold text-lg py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($roles as $role)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$role->id}}
                            </th>
                            <td class="px-6 py-4">
                                {{$role->name}}
                            </td>

                            <td class="px-6 py-4">
                                <a href="{{url('dashboard/roles/'.$role->id.'/give-permission')}}">Add / Edit Role Permission</a>
                                <a href="{{url('dashboard/roles/'.$role->id.'/edit')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <span>/</span>
                                <a onclick="confirm('Are you Sure?')" href="{{url('dashboard/roles/'.$role->id.'/delete')}}" class="font-medium bg-danger text-white hover:underline">Delete</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->

    </div>


</x-backend-layout>