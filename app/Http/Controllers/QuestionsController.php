<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Scholrs\Question;
use Scholrs\Answer;
use Scholrs\Teacher;
use Scholrs\Http\Requests\QuestionRequest;

class QuestionsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classe_id, $subject_id)
    {
        $user = \Auth::user();
        $term = 'First Term';

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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(QuestionRequest $request, $id, $subjectId)
    {
        $question = new Question($request->all() );
        $teacher = Teacher::where('teacherId', Auth::user()->userId)->first();
        
        $teacher->questions()->save($question);

        $myanswer = $request['answer'];
        $myanswer = $request[$myanswer];
        $answer = new Answer();
        $answer->answer = $myanswer;
        $question->answer()->save($answer);

       
        return redirect()
            ->route("classes.subjects.questions.index", [$id, $subjectId])
            ->with(['message'=> '<p class="alert alert-success">Question Added</p>', 'user']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($classe_id, $subject_id, $questionId)
    {
        $user = \Auth::user();
        $count = 1;
        $question = Question::find($questionId);

        return view('admin.questions.show', compact('question', 'classe_id', 'subject_id', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, $subjectId, $questionId)
    {
        $user = \Auth::user();
        $question = Question::findOrFail($questionId);
        //return $question;

        return view('admin.questions.edit', compact('question', 'id', 'subjectId', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(QuestionRequest $request, $id, $subjectId, $questionId)
    {      
        $question = Question::findOrFail($questionId);
        
        $answer = Answer::where('question_id', $question->id);
        $myanswer = $request['answer'];
        $myanswer = $request[$myanswer];
       
        $question->update($request->all());
        $answer->update([
            'question_id' => $questionId,
            'answer' => $myanswer
        ]);

        return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId])
                ->with('message', '<p class="alert alert-success">Question Updated</p>');
    }

     /**
     * Show the form for Deleting the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id, $subjectId, $questionId)
    {
        $user = \Auth::user();
        $question = Question::find($questionId);

        return view('admin.questions.delete', compact('question', 'id', 'subjectId', 'questionId', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id, $subjectId, $questionId)
    {
        $question = Question::find($questionId);

        if($request->get('agree')==1)
        {
            $question->delete();

            return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId])
                ->with('message', '<p class="alert alert-success">Question Deleted</p>');
        }

        return redirect()
                ->route("classes.subjects.questions.index", [$id, $subjectId]);

    }
}
