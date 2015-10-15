<?php

namespace Scholrs\Http\Controllers;

use Illuminate\Http\Request;

use Scholrs\Http\Requests;
use Scholrs\Http\Controllers\Controller;

class ExaminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($classId, $subjectId)
    {
        $term = 'First Term';

        if($_GET['class'])
        {
            $this->class = $_GET['class'];
            $this->subject = $_GET['subject'];

            \Session::put('class', $_GET['class']);
            \Session::put('subject', $_GET['subject']);
        }

        $classe_id = Classe::where('name', $classId)->first()->id;
        $subject_id = Subject::where('name', $this->subject)->first()->id;
        $classeName = Classe::where('name', $this->class)->first()->name;
        $subjectName = Subject::where('name', $this->subject)->first()->name;
        //dd($classe_id);
        $count = 1;
        $questions = Question::where('classe_id', $classId)
                               ->where('subject_id', $subjectId)
                               ->orderBy(\DB::raw('RAND()'))
                               ->get();

        $totals = Question::where('classe_id', $classId)
                               ->where('subject_id', $subjectId)
                               ->paginate(1);

        $checked_items = [];
        if(\Session::has('checked_items'))
            $checked_items = \Session::get('checked_items');

       // $checked_items = array_merge($checked_items, \Input::get('abc'));
        \Session::flash('checked_items', $checked_items);
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
    public function store()
    {
        //
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
}
