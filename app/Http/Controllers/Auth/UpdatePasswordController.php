<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdatePasswordController extends GlobalController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
       return view('auth.updatePassword');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|confirmed|min:6|max:15',
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.update.password')->with('error', 'User not found');
        }

        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->route('admin.update.password')->with('error', 'Current password is incorrect');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard')->with('success', 'Your password has been updated successfully.');
    }


}
