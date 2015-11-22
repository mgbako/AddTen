<?php namespace Scholrs\Http\Controllers;

use Scholrs\Http\Controllers\Controller;
use Scholrs\Teacher;
use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\Student;
use Scholrs\SubjectAssigned;

class ProfileController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();

		$staffId = Teacher::where('teacherId', $user->userId)->first();

		$assigned = SubjectAssigned::where('teacher_id', $staffId->id)->groupBy('classe_id')->get();
		
		return view('profile', compact('user', 'assigned'));
	}

}
