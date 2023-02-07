<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\User;
use App\Models\Permission;
use Auth;
use Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('manager_only')){
            $employees = User::getAllOrderByCreated_at(); //employeeにはuserテーブルの情報（emailや名前）が入っている
        }
        else{
            dd('管理者のみユーザーの権限一覧を閲覧できます');
        }
        return view('permission.index',compact('employees'));
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
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Permission::create($request->all());
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
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
        $employee = User::find($id);
        $employeeId = $employee->id;
        return view('permission.edit',compact('employee','employeeId'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
       //dd($request->deploy);  ok
       //dd($request->status); ok
       //dd($user_id);  ok
        $newPermission = [
            'deploy' => $request->deploy,
            'status' => $request->status,
        ];
        DB::table('permissions')
             ->where('user_id', $request->user_id)
             ->update($newPermission);
        return redirect()->route('permission.index');
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

    public function createNew($id)
    {
        $employee = User::find($id);
        $employeeId = $employee->id;
        return view('permission.create',compact('employee','employeeId'));
    }
}
