<?php namespace Scholrs\Http\Controllers;

use Scholrs\Http\Controllers\Controller;
use Scholrs\Teacher;
use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\Student;

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

		$id = $user->userId;
		$teacher = Teacher::where('teacherId', $id)->get();

		$student = Student::where('studentId', '=', $id)->get();

		$class;

		if($user->type === 'Student')
		{
			$class = Classe::where('name', $student[0]->class)->get();
		}

		$classe_id = $class[0]->id;

		//return $classe_id;


        $staff = Teacher::orderBy('lastname', 'asc')->get(['id', 'lastname', 'firstname', 'teacherId']);
        $classList = Classe::orderBy('name', 'asc')->lists('name', 'id');
        $subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');

        $assigned = [];
        $teacher = [];

        foreach(Teacher::lists('id') as $id)
        {
            $teacher = Teacher::findOrFail($id);
          
            foreach($teacher->classes as $st){
                $assignedClassId[] = $st->pivot->classe_id;
            }

            foreach($teacher->subjects as $st){
                $assignedSubjectId[] = $st->pivot->teacher_id;
            }

           
            $assignedClass = Classe::whereIn('id', $assignedClassId)->get();

            //return Classe::findOrFail(1)->subjects;

            foreach($assignedClass as $ass)
            {
                $subjects[] = Classe::findOrFail($ass->id)->subjects;
            }

           foreach($subjects[0] as $cl)
           {
           	 $subject[] = $cl->get(['id', 'name']);
           }

           /*return $allSubject = Subject::all(); //where('classe_id', 1)->get();

           return $assignedClass[0]->id;*/
        }
		

		
		return view('profile', compact('user', 'student', 'class', 'assignedClass', 'subject', 'classe_id'));
	}

}
