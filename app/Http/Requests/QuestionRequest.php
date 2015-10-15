<?php namespace Scholrs\Http\Requests;

use Scholrs\Http\Requests\Request;

class QuestionRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'question'=>'required',
			'option1'=>'required',
			'option2'=>'required',
			'option3'=>'required',
			'option4'=>'required',
			'answer'=>'required'
		];
	}

}
