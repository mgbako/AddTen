<?php

namespace Scholrs\Http\Requests;

use Scholrs\Http\Requests\Request;

class SubjectAssignedRequest extends Request
{
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
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'classe_id'=> 'required'
        ];
    }
}
