<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RelatorioController extends Controller
{
    public function index()
    {
        return view('relatorios.index');
    }

    public function getData()
    {
        $data["data"] = DB::table('v_relatorio_livros_por_autor')->get();
        return response()->json($data);
    }
}
