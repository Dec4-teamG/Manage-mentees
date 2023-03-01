<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request);
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        DB::table('users')
            ->insert($user);
        */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        /*?$emails = User::select('email')->get();

        foreach ( $emails as $email ) {
            if($request->email == $email){
                return view('register.error');
            };
        };*/

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user2 = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'remember_token' => Str::random(10), // 'token' => hash('sha256', $plainTextToken = Str::random(40)),
            'email_verified_at' =>$user->created_at,
        ];

        DB::table('users')
             ->where('id', $user->id)
             ->update($user2);
        
        //dd($result->id); ok
        $employee = [
            'created_at'=>$user->created_at,
            'updated_at'=>$user->updated_at,
            'user_id' => $user->id,
            'department' => 'null',
            'status' => 'null',
            'profile' => 'null',
            'github' => 'null',
            'image' => 'null',
        ];

        DB::table('employees')
            ->insert($employee);
        
        event(new Registered($user));
        return redirect()->route('permission.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}