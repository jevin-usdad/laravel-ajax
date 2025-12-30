@extends('layouts.app')
@section('title', __('User List') . ' | ' . config('app.name'))
@section('content')

    @include('users.form')
    @include('layouts.pop-up')


    <div class="px-[250px] pt-[50px] pb-0" id="tableDiv">

        <div class="flex justify-end">
            <div class="py-[10px]">
                <a id="addNewBtn" class="font-bold text-blue-700 px-[10px] cursor-pointer">Add New</a> |
                <a class="deleteBtn font-bold text-red-500 px-[10px] cursor-pointer">Bulk Delete</a>
            </div>
        </div>

        <table class="w-full">
            <thead>
                <tr class="text-bold">
                    <th>Sr no.</th>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Contact no</th>
                    <th>Hobby</th>
                    <th>Category</th>
                    <th>Profile pic</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody id="userTableBody"></tbody>
        </table>

    </div>

    <script src="{{ asset('js/user.js') }}"></script>

    <script>
        const USERS_LIST_URL = "{{ route('users.list') }}";
        const USERS_STORE_URL = "{{ route('users.store') }}";
        const USERS_DELETE_URL = "{{ route('users.delete') }}";
        const CATEGORY_HOBBY_URL = "{{ route('category.hobby.list') }}";
        const CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

@endsection
