<?php namespace Scholrs;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {

	protected $fillable = ['firstname', 'lastname', 'teacherId', 
    'phone', 'dob', 'gender', 'address', 'state',
    'nationality', 'type', 'end_date', 'image', 'slug'];


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

    public function user()
    {
      return $this->hasMany('Scholrs\User');
    }

    public static function updateRules()
    {
      return [
        'teacherId'=>'required',
        'firstname'=>'required',
        'lastname'=>'required',
        'phone'=>'required',
        'dob'=>'required',
        'gender'=>'required',
        'address'=>'required',
        'state'=>'required',
        'nationality'=>'required',
        'type'=>'required',
        'image'=>'required'
      ];
    }

}
