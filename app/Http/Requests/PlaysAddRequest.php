<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaysAddRequest extends FormRequest
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
            'abstract'=>'required',
            'author1'=>'required',
            'conference_id'
        ];

    }

   /* sanitize inputs
   ----------------------------------------------------------------------------------------------*/
    public function sanitize()
    {
        // get input request data
        $inputs = $this->all();

        // format
        ucfirst(trim($inputs['title']));
        trim($inputs['abstract']);
        ucfirst(trim($inputs['author1']));

        // sanitize
        $inputs['title'] = filter_var($inputs['title'], FILTER_SANITIZE_STRING);
        $inputs['author1'] = filter_var($inputs['author1'], FILTER_SANITIZE_STRING);

        // if optional fields filled in, format & sanitize them.
        if($inputs['author2']){
            ucfirst(trim($inputs['author2']));
            $inputs['author2'] = filter_var($inputs['author2'], FILTER_SANITIZE_STRING);
        }

        if($inputs['author3']){
            ucfirst(trim($inputs['author3']));
            $inputs['author3'] = filter_var($inputs['author3'], FILTER_SANITIZE_STRING);
        }

        if($inputs['author4']){
            ucfirst(trim($inputs['author4']));
            $inputs['author4'] = filter_var($inputs['author4'], FILTER_SANITIZE_STRING);
        }

        if($inputs['url']){
            trim($inputs['url']);
            $inputs['url'] = filter_var($inputs['url'], FILTER_SANITIZE_URL);
        }

        $this->replace($inputs);
    }
}
