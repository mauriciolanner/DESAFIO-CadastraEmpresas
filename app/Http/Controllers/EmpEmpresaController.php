<?php

namespace App\Http\Controllers;

use App\Models\EmpEmpresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpEmpresaRequest;
use Inertia\Inertia;

class EmpEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscar == '')
            return Inertia::render('EmpEmpresa/Index', ['EmpEmpresa' => EmpEmpresa::get()]);
        else {
        }
        return Inertia::render('EmpEmpresa/Index', ['EmpEmpresa' => EmpEmpresa::where('emp_nom_empresa', 'LIKE', '%' . $request->buscar . '%')->get()]);
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
    public function store(EmpEmpresaRequest $request)
    {
        EmpEmpresa::create($request->all());
        return back(303);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpEmpresa  $empEmpresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Inertia::render('EmpEmpresa/Show', ['EmpEmpresaUm' => EmpEmpresa::where('emp_id_emp', $id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpEmpresa  $empEmpresa
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpEmpresaRequest $request)
    {
        $update = EmpEmpresa::find($request->emp_id_emp);
        $update->emp_nom_empresa = $request->emp_nom_empresa;
        $update->emp_dti_atividade = $request->emp_dti_atividade;
        $update->emp_dtf_atividade = $request->emp_dtf_atividade;
        $update->save();
        return back(303);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpEmpresa  $empEmpresa
     * @return \Illuminate\Http\Response
     */
    public function updateSpecial($id)
    {
        $update = EmpEmpresa::find($id);
        $verifica = EmpEmpresa::where('emp_id_emp', $id)->first();
        if ($verifica->emp_especial == 1) {
            $update->emp_especial = 0;
        } else {
            $update->emp_especial = 1;
        }
        $update->save();

        return back(303);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpEmpresa  $empEmpresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmpEmpresa::destroy($id);
        return back(303);
    }
}
