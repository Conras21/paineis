<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePaineis;
use App\Models\Paineis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaineisController extends Controller
{
    public function index(){
        $paineis = Paineis::get();

        return view('admin.paineis.index', compact('paineis'));
    }

    public function create() {
        return view('admin.paineis.create');
    }

    public function store(StoreUpdatePaineis $request) {

        $data = $request->all();

        //verifica se a imagem do upload é valida
        if ($request->image->isValid()) {

            $nameFile = Str::of($request->dsc_nome_painel)->slug('-').'.'.$request->image->getClientOriginalExtension();


            $image = $request->image->storeAs('paineis', $nameFile);
            $data['image'] = $image;
        }

        Paineis::create($data);
        return redirect()->route('paineis.index');
    }

    public function show($id) {
        //$painel = Paineis::where('id', $id)->first();
        //Verifica se a id passada para o painel existe

        $painel = Paineis::find($id);

        if (!$painel) {
            return redirect()->route('paineis.index');
        }
        //fim do if
        return view('admin.paineis.show', compact('painel'));

    }

    public function destroy($id) {
        //Verifica se a id passada para o painel existe
        if (!$painel = Paineis::find($id)) {
            return redirect()->route('paineis.index');
        }

        if (Storage::exists($painel->image)) {
            Storage::delete($painel->image);
        }

        $painel->delete();

        return redirect()
                ->route('paineis.index')
                ->with('message', 'Painel deletado!');
    }

    public function edit($id) {
        //$painel = Paineis::where('id', $id)->first();
        //Verifica se a id passada para o painel existe

        $painel = Paineis::find($id);

        if (!$painel) {
            return redirect()->back();
        }
        //fim do if
        return view('admin.paineis.edit', compact('painel'));

    }

    public function update(StoreUpdatePaineis $request, $id){
        //$painel = Paineis::where('id', $id)->first();
        //Verifica se a id passada para o painel existe

        $painel = Paineis::find($id);

        if (!$painel) {
            return redirect()->back();
        }
        //fim do if

        $data = $request->all();

        //verifica se a imagem do upload é valida
        if ($request->image && $request->image->isValid()) {

            if (Storage::exists($painel->image)) {
                Storage::delete($painel->image);
            }

            $nameFile = Str::of($request->dsc_nome_painel)->slug('-').'.'.$request->image->getClientOriginalExtension();


            $image = $request->image->storeAs('paineis', $nameFile);
            $data['image'] = $image;
        }

        $painel->update($data);

        return redirect()
                ->route('paineis.index')
                ->with('message', 'Painel atualizado!');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $paineis = Paineis::where('dsc_nome_painel', 'LIKE', "%{$request->search}%")->orWhere('dsc_descricao_painel', 'LIKE', "%{$request->search}%")->get();

        return view('admin.paineis.index', compact('paineis', 'filters'));
    }
}
