<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsuariosExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class EstadisticasController extends Controller
{
    public function registrarVisita(Request $request, $pagina)
    {
        try {
            Visita::create(['pagina' => $pagina]);
            return response()->json(['status' => 'ok', 'mensaje' => 'Visita registrada con éxito']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'mensaje' => $e->getMessage()]);
        }
    }

    public function contarVisitas()
    {
        $landingPageVisitas = Visita::where('pagina', 'landing_page')->count();
        $appVisitas = Visita::where('pagina', 'app')->count();

        return view('estadisticas', compact('landingPageVisitas', 'appVisitas'));
    }
    public function filtrarVisitas(Request $request)
    {
        $query = Visita::query();
    
        if ($request->filled('pagina')) {
            $query->where('pagina', $request->pagina);
        }
        if ($request->filled('dia')) {
            $query->whereDay('created_at', $request->dia);
        }
        if ($request->filled('mes')) {
            $query->whereMonth('created_at', $request->mes);
        }

        if ($request->filled('anio')) {
            $query->whereYear('created_at', $request->anio);
        }
    
        $totalVisitas = $query->count();
    
        return view('estadisticas', compact('totalVisitas'));
    }    
    public function graficaUsuarios()
    {
        $usuariosPorMes = User::select(DB::raw("COUNT(*) as cantidad"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as fecha"))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();
    
        $usuariosActivos = User::where('estado', 'Activo')
            ->select(DB::raw("COUNT(*) as cantidad"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as fecha"))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();
    
        $usuariosInactivos = User::where('estado', 'Inactivo')
            ->select(DB::raw("COUNT(*) as cantidad"), DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as fecha"))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();
    
        return view('grafica-usuarios', compact('usuariosPorMes', 'usuariosActivos', 'usuariosInactivos'));
    }    

public function exportarExcel()
{
    return Excel::download(new UsuariosExport, 'usuarios.xlsx');
}


public function exportarPdf()
{
    $usuarios = User::all();
    $landingPageVisitas = Visita::where('pagina', 'landing_page')->count();
    $appVisitas = Visita::where('pagina', 'app')->count();

    $path = public_path('path_to_graphs');
    if (!file_exists($path)) {
        mkdir($path, 0777, true); 
    }
    $usuariosChart = [
        'type' => 'pie',
        'data' => [
            'labels' => ['Activos', 'Inactivos'],
            'datasets' => [
                [
                    'data' => [
                        User::where('estado', 'Activo')->count(),
                        User::where('estado', 'Inactivo')->count()
                    ],
                    'backgroundColor' => [' #9f44d3', 'rgb(44, 0, 70)'],
                ]
            ]
        ]
    ];

    $usuariosChartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode($usuariosChart));
    $usuariosChartImage = file_get_contents($usuariosChartUrl);
    file_put_contents(public_path('path_to_graphs/usuariosActivosInactivos.png'), $usuariosChartImage);

    $visitasChart = [
        'type' => 'bar',
        'data' => [
            'labels' => ['Landing Page', 'App'],
            'datasets' => [
                [
                    'label' => 'Visitas',
                    'data' => [$landingPageVisitas, $appVisitas],
'backgroundColor' => [' #9f44d3', 'rgb(44, 0, 70)'],                ]
            ]
        ]
    ];

    $visitasChartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode($visitasChart));
    $visitasChartImage = file_get_contents($visitasChartUrl);
    file_put_contents(public_path('path_to_graphs/visitasChart.png'), $visitasChartImage);

    $pdf = Pdf::loadView('reporte_usuarios_pdf', compact('usuarios', 'landingPageVisitas', 'appVisitas'));

    return $pdf->download('reporte_usuarios.pdf');
}


}
