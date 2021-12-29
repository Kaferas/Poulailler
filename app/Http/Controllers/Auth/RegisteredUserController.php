<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redis;

class RegisteredUserController extends Controller
{

    public $currentiD;
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('users.register', [
            'now' => 'users',
            'users' => User::all()
        ]);
    }

    public function edit($id, Request $request)
    {
        $this->currentiD = $id;
        $found = User::find($this->currentiD);
        $found->name = $request->name;
        $found->email = $request->email;
        $found->password = Hash::make($request->password);
        $found->role = $request->role;
        $found->update();
        return redirect()->back()->with("message", "Mise a jour Bien Faite");
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
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
