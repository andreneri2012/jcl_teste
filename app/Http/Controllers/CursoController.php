<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::all();
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $curso = new Curso();
        $curso->nome = $request->input('nome');
        $curso->descricao = $request->input('descricao');
        if($curso->save()){
            return redirect()->back()->with('sucesso', 'Salvo com sucesso!');
        }
        return redirect()->back()->with('erro', 'Algo deu errado, não foi possovel salvar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $curso =  Curso::find($id);
       return view('curso.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->nome = $request->input('nome');
        $curso->descricao = $request->input('descricao');
        if($curso->save()){
            return redirect()->back()->with('sucesso', 'Atualizado com sucesso!');
        }
        return redirect()->back()->with('erro', 'Algo deu errado, não foi possovel salvar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        if($curso->delete()){
            return redirect()->back()->with('sucesso', 'Removido com sucesso!');
        }
        return redirect()->back()->with('erro', 'Algo deu errado, não foi possovel Remover!');
    }
}
