<?php namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Question;
use Scholrs\ANswer;
use Scholrs\Student;
use Scholrs\classe;
use Scholrs\Subject;
use Auth;


class ExamsController extends Controller
{
    public $class;
    public $subject;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classe_id)
    {
       
        $user = \Auth::user();
        $term = 'First Term';

        $subjects = Classe::find($classe_id)->subjects()->get();


        $count = 1;
        

        return view('exams.index', compact('user', 'classe_id', 'subjects'));
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
    public function store(Requests\ExamRequest $request)
    {
        $result;
        $selected;
        $count = 0;
        foreach($request->all() as $index => $answer)
        {
            $results = Answer::where('question_id', $index)->lists('answer');
            foreach ($results as $result)
            {
                if ($result == $answer)
                {
                    $count ++;
                }
            }
        }

        return $count;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($classe_id, $subject_id)
    {
        $user = \Auth::user();
        $term = 'First Term';

        $count = 1;
        $questions = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->orderBy(\DB::raw('RAND()'))
                               ->get();

        $totals = Question::where('classe_id', $classe_id)
                               ->where('subject_id', $subject_id)
                               ->get();


        return view('exams.show', compact('questions', 'count', 'subject_id', 'classe_id', 'term', 'totals', 'user'));
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
}
