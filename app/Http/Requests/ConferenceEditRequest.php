<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenceEditRequest extends FormRequest
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
        $this->sanitize();

        return [
            //
            'title'=>'required',
            'year'=>'required|numeric',
            'excerpt'=>'required',
            'details'=>'required',

        ];
    }

   public function sanitize()
    {
        // extract all input values
        $inputs = $this->all();

        // format inputs
        ucfirst(trim($inputs['title']));
        trim($inputs['year']);
        trim($inputs['details']);
        ucfirst(trim($inputs['excerpt']));

        // sanitize & reassign inputs
        $inputs['title'] = filter_var($inputs['title'], FILTER_SANITIZE_STRING);
        $inputs['year'] = filter_var($inputs['year'], FILTER_SANITIZE_NUMBER_INT);
        $inputs['excerpt'] =  filter_var($inputs['excerpt'], FILTER_SANITIZE_STRING);

        // replace request input data with sanitized input data.
        $this->replace($inputs);
    }
}
