<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'desc');

        $users = User::query()->orderBy($sort, $order)->paginate(10);

        return view('admin.user.index', compact('users', 'sort', 'order'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $data = $request->validated();

        Storage::delete($user->image);

        if ($request->hasFile('image')) {
            $photoPath = $request->file('image')->store('uploads', 'public');
            $data['image'] = $photoPath;
        }

        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
