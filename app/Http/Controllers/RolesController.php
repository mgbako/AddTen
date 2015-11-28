<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\RoleRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Role;
use Scholrs\User;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();

        $roles = \DB::table('role_user')->get();
        
        $userList = User::where('userId', 'like', 'ADM%')->lists('userId', 'id');
        $count = 1;
        $roleList = Role::orderBy('name', 'asc')->lists('name', 'id');
        return view('admin.roles.index', compact('user', 'count', 'roleList', 'roles', 'userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(RoleRequest $request)
    {
       // return $request->all();
        $assign = User::findOrFail($request->input('user_id'));
        $assign->assignRole($request->input('role_id'));

        return redirect('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        $request->all();
        $assign = User::findOrFail($request->input('user'));
        $assign->detach($id);

        return redirect('roles');
    }
}
