<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $userAttrubutes = $request->validate([
            "name" => ["required"],
            "email"=> ["required","email", "unique:users,email"],
            "password"=> ["required","confirmed", Password::min(6)],
        ]);

        $employerAttrubutes =  $request->validate([
            "employer" => ["required"],
            "logo"=> ["required",File::types(['jpg','png','jpeg', 'webp'])->max(5048)],
        ]);

        $user = User::create($userAttrubutes);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttrubutes['employer'],
            'logo' => $logoPath,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
