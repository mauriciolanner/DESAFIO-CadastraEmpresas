<?php

namespace App\Http\Controllers;

use App\Models\DocDocumento;
use Illuminate\Http\Request;
use App\Http\Requests\DocDocumentoRequest;
use Carbon\Carbon;

class DocDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocDocumentoRequest $request)
    {
        $now = Carbon::now();
        DocDocumento::create([
            'doc_num_documento' => $request->doc_num_documento,
            'doc_id_tdo' => $request->doc_id_tdo,
            'doc_dat_cadastro' => $now,
            'doc_id_emp' => $request->doc_id_emp,
        ]);
        return back(303);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocDocumento  $docDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocDocumento  $docDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DocDocumento  $docDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DocDocumento $docDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocDocumento  $docDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DocDocumento::destroy($id);
        return back(303);
    }
}
