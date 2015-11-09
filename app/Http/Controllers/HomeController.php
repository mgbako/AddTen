<?php namespace Scholrs\Http\Controllers;
use Auth;
use Scholrs\Teacher;
use Scholrs\Student;
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
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::guest())
		{
			return view('home');
		}
		
		$user = \Auth::user();
		$classes = [];

		
		$totalClasses = Classe::all()->count();
		$totalSubjects = Subject::all()->count();
		$totalStaffs = Teacher::all()->count();
		$totalStudents = Student::all()->count();

		if($user->type != "Student")
		{
			$id = Teacher::where('teacherId', $user->userId)->get();
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
		}
		

		
		//dd($subjects);
		
		
		return view('dashboard', compact('classes', 'totalClasses', 'totalSubjects', 'totalStaffs', 'totalStudents', 'user'));
	}

}
