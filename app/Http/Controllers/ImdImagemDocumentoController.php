<?php

namespace App\Http\Controllers;

use App\Models\ImdImagemDocumento;
use Illuminate\Http\Request;
use App\Http\Requests\ImdImagemDocumentoRequest;

class ImdImagemDocumentoController extends Controller
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
    public function store(ImdImagemDocumentoRequest $request)
    {
        $name = md5(date('HisYmd'));
        $extension = $request->imd_arquivo->getClientOriginalExtension();
        $nameFile = "{$name}.{$extension}";
        $request->imd_arquivo->move(public_path('storage/imagensDocumentos'), $nameFile);

        ImdImagemDocumento::create([
            'imd_nom_arquivo' => $request->imd_nom_arquivo,
            'imd_arquivo' => $nameFile,
            'imd_id_doc' => $request->imd_id_doc,
        ]);

        return back(303);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImdImagemDocumento  $imdImagemDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(ImdImagemDocumento $imdImagemDocumento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImdImagemDocumento  $imdImagemDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(ImdImagemDocumento $imdImagemDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImdImagemDocumento  $imdImagemDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImdImagemDocumento $imdImagemDocumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImdImagemDocumento  $imdImagemDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ImdImagemDocumento::destroy($id);
        return back(303);
    }
}
