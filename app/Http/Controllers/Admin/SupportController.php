<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\UpdateSupportDTO;
use App\DTO\Supports\CreateSupportDTO;
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

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(
            CreateSupportDTO::makeFromResquest($request)
        );

        return redirect()->route('supports/index');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)){
            return back();
        }

        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
       $support = $this->service->update(
            UpdateSupportDTO::makeFromResquest($request)
        );

        if(!$support){
            return back();
        }



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