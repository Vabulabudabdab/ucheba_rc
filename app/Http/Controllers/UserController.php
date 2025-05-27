<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\EditRequest;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController {

    public function store(StoreRequest $request) {
        $data = $request->validated();

        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id'],
        ]);

        return redirect()->route('admin.users.index');
    }

    public function update(User $user, EditRequest $request) {
        $data = $request->validated();
        if($data['password'] == null) {
            $user->update([
                'email' => $data['email'],
                'role_id' => $data['role_id'],
            ]);
        } else {
            $user->update([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data['role_id'],
            ]);
        }

        return redirect()->route('admin.users.index');
    }

    public function delete(User $user) {
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function search() {
        $data = request()->validate([
            'email' => 'nullable',
        ]);

        $query = User::query();

        if (isset($data['email'])) {
            $query->where('email', 'LIKE', "%{$data['email']}%");
        }
        $users = $query->paginate(9);

        return view('admin.users.search', compact('users'));
    }
}
