<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Auth;
use Illuminate\Support\Facades\Hash;


class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $employee = User::find(Auth::user()->id);
        //$employeeName = $employee->name;
        //$employeeDepartment = $employee->employee->department;
        return view('mypage.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function editProfile($id)
    {
        $employee = User::find($id);
        return view('mypage.editProfile',compact('employee'));
    }

    public function editGithub($id)
    {
        $employee = User::find($id);
        return view('mypage.editGithub',compact('employee'));
    }

    public function editImage($id)
    {
        $employee = User::find($id);
        return view('mypage.editImage',compact('employee'));
    }

    public function editPassword($id)
    {
        $employee = User::find($id);
        return view('mypage.editPassword',compact('employee'));
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

    public function updateProfile(Request $request, $id)
    {
        $result = Employee::find($id)->update($request->all());
        return redirect()->route('mypage.index');
    }

    public function updateGithub(Request $request, $id)
    {
        $result = Employee::find($id)->update($request->all());
        return redirect()->route('mypage.index');
    }

    public function updateImage(Request $request, $id)
    {
        $result = Employee::find($id)->update($request->all());
        return redirect()->route('mypage.index');
    }

    public function updatePassword(Request $request, $id)
    {
        $password = Hash::make($request->password);
        $result = User::find($id)->update(['password' => $password]);
        return redirect()->route('mypage.index');
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
