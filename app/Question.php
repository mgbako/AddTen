<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $fillable = ['subject_id', 'teacher_id',
   'classe_id', 'term', 'question', 'option1',
   'option2', 'option3', 'option4'];


   public $updateRules = [

   ];

	public function subject() {
	  return $this->belongsTo('Scholrs\Subject');
	}

	public function teacher() {
	  return $this->belongsTo('Scholrs\Teacher');
	}

	public function student()
	{
	  return $this->belongsTo('Scholrs\Student');
	}

	public function answer()
	{
	  return $this->hasOne('Scholrs\Answer');
	}

}