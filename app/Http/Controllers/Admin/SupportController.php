<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    //public function store(Request $request) DUAS FORMAS DE FAZER
    public function store(Request $request, Support $support)
    {
        //dd($request->body); PEGA O VALOR DO CAMPO DE FORMA SIMPLIFICADA
        //dd($request->get('axas', 'default')); se campo não existir define valor como default
        //dd($request->get('body'));

        $data = $request->all(); // PEGA TODOS OS DADOS DO FORMULÁRIO
        $data['status'] = 'a'; // DEFINE O VALOR STATUS COMO 'A'

        //Support::create($data); // Cadastro os valores na base de dados com os dados passados na variavel
       // $support->create($data);
        $support = $support->create($data);
        //dd($support); valida 

        return redirect()->route('supports.index');
    }
}
