<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceAddRequest extends FormRequest
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
     * get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // run sanitize
        $this->sanitize();

        // validate
        return [
            'title'=>'required',
            'year'=>'required|numeric',
            'excerpt'=>'required',
            'details'=>'required'
        ];

    }

    /* sanitizes request inputs then replaces request data with sanitized data
    ----------------------------------------------------------------------------------------------*/
    public function sanitize()
    {
        // extract input request data
        $inputs = $this->all();

        // format
        ucfirst(trim($inputs['title']));
        trim($inputs['year']);
        trim($inputs['details']);

        // sanitize
        $inputs['title'] = filter_var($inputs['title'], FILTER_SANITIZE_STRING);
        $inputs['year'] =  filter_var($inputs['year'], FILTER_SANITIZE_NUMBER_INT);

        $this->replace($inputs);
    }
}
