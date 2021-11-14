<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('aluno.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('aluno.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aluno_encontrado = Aluno::where('email', $email = $request->input('email'))->count();

        if($aluno_encontrado > 0 ){
            $cadastro['email_ja_cadastrado'] = true;
            $cadastro['mensagem'] = 'Já existe um aluno com esse e-mail';

            echo json_encode($cadastro);
            exit;
        }else{
            $aluno = new Aluno();
            $aluno->nome = $request->input('nome');
            $aluno->email = $request->input('email');
            $aluno->curso_id = $request->input('curso_id');

            if($aluno->save()){

                $cadastro['success'] = true;
                $cadastro['mensagem'] = 'Salvo com sucesso!';
                echo json_encode($cadastro);
                exit;
        }

            $cadastro['erro'] = true;
            $cadastro['mensagem'] = 'Algo deu errado, não foi possovel salvar!';
            echo json_encode($cadastro);
            exit;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno =  Aluno::find($id);
        $cursos = Curso::all();
        return view('aluno.edit', compact('aluno', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aluno_encontrado = Aluno::where('email', $email = $request->input('email'))->count();
        $emailAluno = Aluno::where('id', $id)->where('email', $request->input('email') )->count();

        if($aluno_encontrado > 0 && $emailAluno != 1 ){
            return redirect()->back()->with('erro', 'Já existe um aluno com esse e-mail');
        }else{

            $aluno = Aluno::find($id);
            $aluno->nome = $request->input('nome');
            $aluno->email = $request->input('email');
            $aluno->curso_id = $request->input('curso_id');

            if($aluno->save()){

                return redirect()->back()->with('sucesso', 'Atulização com sucesso!');
        }

        return redirect()->back()->with('erro', 'Não foi possivel atualizar!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Aluno::find($id);
        if($curso->delete()){
            return redirect()->back()->with('sucesso', 'Removido com sucesso!');
        }
        return redirect()->back()->with('erro', 'Algo deu errado, não foi possovel Remover!');
    }
}
