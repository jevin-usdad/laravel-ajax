@extends('layouts.app')
@section('title', __('User List') . ' | ' . config('app.name'))
@section('content')
    <link rel="stylesheet" href="{{ asset('custom.css') }}">


    @include('users.form')
    @include('layouts.pop-up')



    <div class="px-[250px] pt-[50px] pb-0" id="tableDiv">

        <div class="flex justify-end">
            <div class="py-[10px]">
                <a id="addNewBtn" class="font-bold text-blue-700 px-[10px] cursor-pointer">Add New</a> |
                <a class="font-bold text-red-500 px-[10px] cursor-pointer">Bulk Delete</a>
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
            <tbody>
                <tr>
                    <td>1</td>
                    <td><input type="checkbox" class="cursor-pointer" name="users[]"></td>
                    <td>Divya</td>
                    <td>+262 269 xx xxx26</td>
                    <td>Music,
                        Games,
                        Football</td>
                    <td>Developer</td>
                    <td>
                        <img src="https://i.pravatar.cc/150?img=3" alt="Profile">
                    </td>
                    <td>
                        <a id="editBtn" class="font-bold text-red-500 cursor-pointer">Edit</a> /
                        <a class="deleteBtn font-bold text-green-500 cursor-pointer">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>


    <script>
        $(document).ready(function() {

            let deleteRow = null;

            $(document).on('click', '#addNewBtn', function() {
                $('#tableDiv').addClass('hidden');
                $('#formDiv').removeClass('hidden');
            });

            $(document).on('click', '#cancleBtn', function() {
                $('#tableDiv').removeClass('hidden');
                $('#formDiv').addClass('hidden');
            });

            $(document).on('click', '#editBtn', function() {
                $('#tableDiv').addClass('hidden');
                $('#formDiv').removeClass('hidden');
            });

            $(document).on('click', '.deleteBtn', function() {
                deleteRow = $(this).closest('tr');
                $('#deleteModal').removeClass('hidden').addClass('flex');
            });

            $('#cancelDelete').click(function() {
                $('#deleteModal').addClass('hidden').removeClass('flex');
                deleteRow = null;
            });

            $('#confirmDelete').click(function() {

                if (deleteRow) {
                    deleteRow.remove();
                }

                $('#deleteModal').addClass('hidden').removeClass('flex');
            });

        });
    </script>



@endsection
