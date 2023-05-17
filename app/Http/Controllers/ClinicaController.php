<?php

namespace App\Http\Controllers;

use App\Models\Clinica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
           ->myClinica()
           ->create([
              'nome' => $request -> nome,
              'endereco' => $request -> endereco,
              'telefone' => $request -> telefone,
              'especialidade' => $request ->especialidade,
              'horario' => $request -> horario
           ]);
           return redirect (route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Clinica $clinica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clinica $clinica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clinica $clinica)
    {
        $clinica -> update([
            'nome' => $request -> nome,
            'endereco' => $request -> endereco,
            'telefone' => $request -> telefone,
            'especialidade' => $request -> especialidade,
            'horario' => $request -> horario
        ]);

        return redirect (route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clinica = Clinica::findOrFail($id);
        $clinica -> delete();

        return redirect (route('dashboard'));
    }
}