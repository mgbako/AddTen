<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Requests\SubjectquestionstatusRequest;
use Scholrs\Http\Controllers\Controller;
use Scholrs\Classe;
use Scholrs\Subject;
use Scholrs\Question;
use Scholrs\Subjectquestionstatus;

class SubjectQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();

       /* $percentage = Question::Percentage(3, 5)->get()->count();

        dd($percentage);*/

        $count = 1;
        $classList = Classe::orderBy('name', 'asc')->lists('name', 'id');
        $subjectList = Subject::orderBy('name', 'asc')->lists('name', 'id');
        $time = [""=>"Choose", 15=>15, 30=>30, 45=>45, 60=>60, 75=>75, 90=>90, 105=>105, 120=>120];

        $subjectquestionstatus = Subjectquestionstatus::all();

        return view('status.subjectQuestion.index', compact('user', 'count', 'subjectList', 'classList', 'time', 'subjectquestionstatus'));
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
    public function store(SubjectquestionstatusRequest $request)
    {

        $Subjectquestionstatus = Subjectquestionstatus::where('classe_id', $request['classe_id'])
        ->where('subject_id', $request['subject_id'])->get()->count();
        if($Subjectquestionstatus == 1)
        {
            return redirect()
                ->route("subjectQuestions.index")
                ->with(['message'=> '<p class="alert alert-success">Time Already Assigned to Subject</p>', 'user']);
        }

        Subjectquestionstatus::create($request->all() );

        return redirect()
            ->route("subjectQuestions.index")
            ->with(['message'=> '<p class="alert alert-success">Time Assigned to Subject</p>', 'user']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function subjectReception()
    {
        $user = \Auth::user();
        $subjectquestionstatus = Subjectquestionstatus::whereProgress(0)->get();
        $count = 1;

        return view('status.subjectQuestion.subjectReception', compact('subjectquestionstatus', 'count', 'user'));
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
     * Show the form for Deleting the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($classeId, $subjectId)
    {
        $user = \Auth::user();
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                                        ->where('subject_id', $subjectId)->first();
                                                        //return $subjectquestionstatus;

        return view('status.subjectQuestion.delete', compact('subjectquestionstatus', 'classeId', 'subjectId', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $classeId, $subjectId
     * @return Response
     */
    public function destroy(Request $request, $classeId)
    {
        $subjectquestionstatus = Subjectquestionstatus::where('classe_id', $classeId)
                                         ->where('subject_id', $request->get('subjectId'));

        if($request->get('agree')==1)
        {
            $subjectquestionstatus->delete();

            return redirect()
                ->route("subjectQuestions.index")
                ->with('message', '<p class="alert alert-success">Assigned Class Subject Deleted</p>');
        }

        return redirect()
                ->route("subjectQuestions.index");
    }
}
