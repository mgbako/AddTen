<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

	protected $fillable = ['name'];

	public function questions()
	{

	  return $this->hasMany('Scholrs\Question');
	}

	public function teachers()
	{
		return $this->belongsToMany('Scholrs\Teacher');
	}

	public function students()
	{
		return $this->belongsToMany('Scholrs\Student');
	}

	public function classes()
	{
		return $this->belongsToMany('Scholrs\Classe')->withTimestamps();
	}

	public function photos() {

	  return $this->morphMany('Scholrs\Photo', 'imageable');
	}

}