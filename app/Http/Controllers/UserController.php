<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('users.list');
    }

    public function categoryHobbyList()
    {
        $categories = Category::select('id', 'name')->get();
        $hobbies = Hobby::select('id', 'name')->get();

        return response()->json([
            'categories' => view('users.categories', compact('categories'))->render(),
            'hobbies' => view('users.hobbies', compact('hobbies'))->render()
        ]);
    }

    public function list()
    {
        $users = User::select('id', 'name', 'contact_no', 'profile_pic')->with(['categories:id,name', 'hobbies:id,name'])->get();

        $html = view('users.table', compact('users'))->render();

        return response()->json(['html' => $html]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'contact_no'  => 'nullable|string|max:20',
            'category_id' => 'required|exists:categories,id',
            'hobbies'     => 'nullable|array',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $user = User::create(['name' => $request->name, 'contact_no' => $request->contact_no]);

            if ($request->hasFile('profile_pic')) {
                $path = $request->file('profile_pic')->store('profiles', 'public');
                $user->update(['profile_pic' => $path]);
            }

            $user->categories()->attach($request->category_id);

            if ($request->filled('hobbies')) {
                $user->hobbies()->sync($request->hobbies);
            }

            return response()->json(['success' => true, 'message' => 'User created successfully']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong'], 500);
        }
    }

    public function edit($id)
    {
        $user = User::select('id', 'name', 'contact_no', 'profile_pic')->with(['categories:id', 'hobbies:id'])->findOrFail($id);

        return response()->json(['user' => $user]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:100',
            'contact_no'  => 'nullable|string|max:20',
            'category_id' => 'required|exists:categories,id',
            'hobbies'     => 'nullable|array',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $user = User::select('id', 'name', 'contact_no', 'profile_pic')->findOrFail($id);

            $user->update(['name' => $request->name, 'contact_no' => $request->contact_no]);

            if ($request->remove_image == 1) {
                $user->update(['profile_pic' => null]);
            }

            if ($request->hasFile('profile_pic')) {
                $path = $request->file('profile_pic')->store('profiles', 'public');
                $user->update(['profile_pic' => $path]);
            }

            $user->categories()->sync([$request->category_id]);

            if ($request->filled('hobbies')) {
                $user->hobbies()->sync($request->hobbies);
            } else {
                $user->hobbies()->detach();
            }

            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Update failed'], 500);
        }
    }

    public function delete(Request $request)
    {
        $request->validate(['ids' => 'required|array']);

        try {
            $users = User::whereIn('id', $request->ids)->get();

            foreach ($users as $user) {
                $user->categories()->detach();
                $user->hobbies()->detach();
                $user->delete();
            }

            return response()->json(['success' => true, 'message' => 'User(s) deleted successfully']);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Delete failed'], 500);
        }
    }
}
