<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', 'max:25', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'role' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // dd([
        //     'name' => $request->name,
        //     'mobile' => $request->mobile,
        //     'address' => $request->address,
        //     'type' => $request->type,
        //     'role' => $request->role,
        //     'password' => Hash::make($request->password),
        // ]);

        $user = new User;
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->type = $request->type;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        // $user = User::create([
        //     'name' => $request->name,
        //     'mobile' => $request->mobile,
        //     'address' => $request->address,
        //     'type' => $request->type,
        //     'role' => $request->role,
        //     'password' => Hash::make($request->password),
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
