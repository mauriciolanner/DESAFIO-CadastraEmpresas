<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DocDocumentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doc_num_documento' => 'required|max:30',
            'doc_id_tdo' => 'required|exists:tdo_tipo_documento,tdo_id_tdo',
            'doc_id_emp' => 'required|exists:emp_empresa,emp_id_emp'
        ];
    }
}
