<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model {

	protected $fillable = ['name'];
	

	public function teachers()
	{
		return $this->belongsToMany('Scholrs\Teacher');
	}

	public function students()
	{
		return $this->belongsToMany('Scholrs\Student');
	}

	public function subjects()
	{
		return $this->belongsToMany('Scholrs\Subject', 'classe_subject', 'classe_id', 'subject_id')->withTimestamps();
	}

}
