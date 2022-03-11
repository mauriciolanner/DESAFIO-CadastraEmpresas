<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ImdImagemDocumentoRequest extends FormRequest
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
            'imd_nom_arquivo' => 'required|max:2000',
            'imd_arquivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imd_id_doc' => 'required|exists:doc_documento,doc_id_doc'
        ];
    }
}
