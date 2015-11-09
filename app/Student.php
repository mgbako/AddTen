<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $fillable = ['firstname', 'lastname', 'studentId', 
    'phone', 'dob', 'gender', 'address', 'state',
    'nationality', 'class', 'end_date', 'image', 'slug'];


    public function account() {
      return $this->hasOne('Scholrs\User');
    }

    public function questions()
    {
      return $this->hasMany('Scholrs\Question');
    }

    public function classes()
    {
      return $this->belongsToMany('Scholrs\Classe')->withTimestamps();
    }

    public function subjects()
    {
      return $this->belongsToMany('Scholrs\Subject')->withTimestamps();
    }

    /**
     * Get the subjects associated with the given student
     * @return Array of tags
     */
    public function getSubjectListAttribute()
    {
      return $this->subjects->lists('id');
    } 

    public function answer()
    {
      return $this->hasOne('Scholrs\Answer');
    }

    public function grades()
    {
      return $this->hasMany('Scholrs\Grade');
    }

}
