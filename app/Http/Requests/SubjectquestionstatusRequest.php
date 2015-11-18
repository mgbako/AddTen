<?php

namespace Scholrs\Http\Requests;

use Scholrs\Http\Requests\Request;

class SubjectquestionstatusRequest extends Request
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
            'time' => 'required'
        ];
    }
}
