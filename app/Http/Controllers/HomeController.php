<?php namespace Scholrs\Http\Controllers;
use Auth;
use Scholrs\Teacher;
use Scholrs\Subject;
use Scholrs\Classe;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$classes = [];

		$id = Teacher::where('teacherId', $user->userId)->get();
		$classes = Classe::all();
		$subjects = Subject::all();

		return $subjects;
		foreach($id as $id)
		{
			$id = $id->id;
		}
		$teacher = Teacher::find($id);
		//dd($teacher);
		//dd($teacher);
		foreach($teacher->classes as $classe)
		{
			$classes[] = $classe;
		}

		foreach($teacher->subjects as $subject)
		{
			$subjects[] = $subject;
		}

		
		//dd($subjects);
		

		return view('dashboard', compact('classes', 'subjects', 'classe_id', 'subject_id'));
	}

}
