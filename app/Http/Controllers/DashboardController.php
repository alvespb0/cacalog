<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoboy;
use App\Models\Status;

class DashboardController extends Controller
{
    function dashboard() {
        $motoboys = Motoboy::withCount('entregas')->get();
        
        $dadosGraficoMotoboy = [];

        foreach ($motoboys as $motoboy) {
            $dadosGraficoMotoboy[] = [
                'nome' => $motoboy->name,
                'qtd_entregas' => $motoboy->entregas_count
            ];
        }

        return view('/dashboard-grafico/dashboard_show', ["dadosGraficoMotoboy" => $dadosGraficoMotoboy]);
    }
}
