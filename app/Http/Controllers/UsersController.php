<?php namespace Scholrs\Http\Controllers;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Scholrs\User;
use Scholrs\Http\Requests\UserRequest;

class UsersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();
		/*$type
		return view('users.index', compact('type'));*/
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = \Auth::user();
		return view('users.create', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserRequest $request)
	{

		$userId = strtoupper($request->get('user_id'));

		$InitUserId = substr($userId, 0, 3);

		$user = new User;

		($InitUserId == 'TCH') ? $user->teacher_id = $userId : null;
		($InitUserId == 'STD') ? $user->student_id = $userId : null;

		($InitUserId == 'ADM') ? $user->teacher_id = $userId : null;

		$user->firstname = $request->get('firstname');
		$user->lastname = $request->get('lastname');
		$user->email = $request->get('email');
		$user->phone = $request->get('phone');
		$user->dob = $request->get('dob');
		$user->gender = $request->get('gender');
		$user->address = $request->get('address');
		$user->state = $request->get('state');
		$user->nationality = $request->get('nationality');
		//$user->password = Hash::make($request->get('password'));
		$user->save();
		

		dd(Hash::make($request->get('password')));
		User::create($input);

		return redirect()
			->route('account.login')
			->with('message', '<span class="alert alert-success">Welcome Created</span>');
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
	public function destroy($id)
	{
		//
	}

	public function login()
	{
		return view('account.login');
	}

}
