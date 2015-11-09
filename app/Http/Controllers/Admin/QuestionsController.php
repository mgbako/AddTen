<?php namespace Scholrs\Http\Controllers\Admin;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Scholrs\Subject;
use Scholrs\Classe;
use Scholrs\Question;
use Scholrs\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Scholrs\Teacher;
use Scholrs\Answer;

class QuestionsController extends Controller {

	public $class;
	public $subject;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = \Auth::user();
		$term = 'First Term';

		if($_GET['class'])
		{
			$this->class = $_GET['class'];
			$this->subject = $_GET['subject'];

			\Session::put('class', $_GET['class']);
			\Session::put('subject', $_GET['subject']);
		}
		

		$classe_id = Classe::where('name', $this->class)->first()->id;
		$subject_id = Subject::where('name', $this->subject)->first()->id;
		
		$count = 1;
		$questions = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->get();
		
		
		return view('admin.questions.index', compact('questions', 'count', 'subject_id', 'classe_id', 'term', 'user'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$subjectList = Subject::lists('name','id');
		$classList = Classe::lists('name');
		$teacher_id = 1;

		return view('admin.questions.create', compact('subjectList', 'teacher_id', 'classList'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(QuestionRequest $request)
	{
		
		$question = new Question($request->all() );
		$teacher = Teacher::where('teacherId', Auth::user()->userId)->first();
		//dd($teacher->questions());
		$teacher->questions()->save($question);

		$myanswer = $request['answer'];
		$myanswer = $request[$myanswer];
		$answer = new Answer();
		$answer->answer = $myanswer;
		$question->answer()->save($answer);

		/*$input = $request->all();

		Question::create($input);*/

		return redirect()
			->back()
			->with('message', '<span class="alert alert-success">Question Created</span>');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$count = 1;
		$question = Question::find($id);

		return view('admin.questions.show', compact('question', 'count'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subjectList = Subject::lists('name','id');
		$classList = Classe::lists('name');
		$teacher_id = 1;

		$question = Question::find($id);
		return view('admin.questions.edit', compact('question', 'subjectList', 'teacher_id', 'classList'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, QuestionRequest $request)
	{
		$question = Question::find($id);
		$question->update($request->all());

		return redirect()
			->route('admin.questions.index')
			->with('message', '<p class="alert alert-success">Question Updated</p>');
	}

	/**
	 * Show the form for deleting the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$question = Question::find($id);

		return view('admin.questions.delete', compact('question', 'id'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$class = \Session('class');
		$subject = \Session('subject');
		$question = Question::find($id);

		if($request->get('agree')==1)
		{
			$question->delete();

			return redirect()
				->to("questions?class=$class&subject=$subject")
				->with('message', '<p class="alert alert-success">Question Deleted</p>');
		}

		return redirect('questions');

	}

}
