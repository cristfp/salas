<?php

namespace App\Http\Controllers;
//se App\Http\Controllers\Request;
use App\Sala;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    public function index(){
    $salas = Sala::all();

    return view('salas.index', [
        'salas' => $salas
    ]);
    }

    public function create(){
        return view('salas.create');
    }

    public function store(Request $request){
        $sala = Sala::create($request->all());
        return redirect('/salas');
    }

    public function destroy (Request $request)

        {

            Sala::destroy($request->id);
        

            return redirect('/salas');

        }
}
?>