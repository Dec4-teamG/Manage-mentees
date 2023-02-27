<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Auth;
use Illuminate\Support\Facades\Hash;
use Validator;



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
        $login_user = User::find(Auth::user()->id);
        //$employeeName = $employee->name;
        //$employeeDepartment = $employee->employee->department;
        return view('mypage.index',compact('employee','login_user'));
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

    public function updateAll(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
    'profile' => 'required',
    'github' => 'required',
    ]);
//ddd($request);
    if ($validator->fails()) {
    return redirect()
      ->route('mentees.menteemypage', ['mentees' => $id])
      ->withInput()
      ->withErrors($validator);
    }


        $result = Employee::find($id)->update($request->all());
        return redirect()->route('mentees.menteemypage' , ['mentees'=>$id]);
    }

    public function updateImage(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
        'image' => 'required',
        ]);
    if ($validator->fails()) {
    return redirect()
      ->route('mypage.editImage',$id)
      ->withInput()
      ->withErrors($validator);
    }
        
        $result = Employee::find($id)->update($request->all());
        return redirect()->route('mentees.menteemypage' , ['mentees'=>$id]);
    }

    public function updatePassword(Request $request, $id)
    {

         $validator = Validator::make($request->all(), [
        'password' => 'required | min:7',
        ]);

    if ($validator->fails()) {
    return redirect()
      ->route('mypage.editPassword',$id)
      ->withInput()
      ->withErrors($validator);
    }


        $password = Hash::make($request->password);
        $result = User::find($id)->update(['password' => $password]);
        return redirect()->route('mentees.menteemypage', ['mentee'=>$id]);
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
