<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ){}

    //public function index(Support $support)
    public function index(Request $request)
    {
        //$supports = $support->all();
        $supports = $this->service->getAll($request->filter);

        return view('admin/supports/index', compact('supports'));
    }

    public function show(string $id)
    {
       // Support::find($id) Aqui filtra somente pela primary key
       // Support::where('id', $id)->first(); Aqui pode filtrar por qualquer campo da base de dados
       // Support::where('id', '!=', $id)->first(); Só pega se o valor for diferente
       // Support::where('id', '=', $id)->first(); Só pega se o valor for igual
      // if(!$support = Support::find($id)){
       if(!$support = $this->service->findOne($id)){
        //return redirect()->back(); // Manda o usuário de volta para pagina que veio se o valor for igual a null
        return back();
       };

        //dd($support->subject);
        //dd($support);

        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    //public function store(Request $request) DUAS FORMAS DE FAZER
    public function store(StoreUpdateSupport $request, Support $support)
    {
        //dd($request->body); PEGA O VALOR DO CAMPO DE FORMA SIMPLIFICADA
        //dd($request->get('axas', 'default')); se campo não existir define valor como default
        //dd($request->get('body'));

        $data = $request->validated(); // PEGA TODOS OS DADOS DO FORMULÁRIO
        $data['status'] = 'a'; // DEFINE O VALOR STATUS COMO 'A'

        //Support::create($data); // Cadastro os valores na base de dados com os dados passados na variavel
       // $support->create($data);
        $support = $support->create($data);
        //dd($support); //valida 

        return redirect()->route('supports/index');
    }

    public function edit(string $id)
    {
        //if(!$support = $support->where('id', $id)->first()){
        if (!$support = $this->service->findOne($id)){
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        if(!$support = $support->find($id)){
            return back(); 
        }

        // PEGANDO INDIVIDUALMENTE
        // $support->subject = $request->subject;
        // $support->body = $request->body;
        // $support->save();

        // PEGANDO ATRAVÉS DE UM ARRAY
        /*$support->update($request->only([
            'subject', 'body' // SÓ VOU TRAZER E EDITAR ESSES DOIS VALORES
        ]));*/

        $support->update($request->validated());

        return redirect()->route('supports/index');
    }

    public function destroy(string $id)
    {
        //if(!$support = Support::find($id)->delete()){
        //if(!$support = Support::find($id)){
        /*if (!$support = $this->service->findOne($id)){
            return back();

            $support->delete();
        }*/

        $this->service->delete($id);

        return redirect()->route('supports/index');

    }
}
