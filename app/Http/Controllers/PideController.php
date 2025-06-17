<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PideController extends Controller
{

    private static $conexion = 'sqlsrv';
    private static $conexionpsql = 'pgsql';

    // public function loginUser(Request $request)
    // {
    //     $p_loging = $request['p_loging'];
    //     $p_passwd = $request['p_passwd'];

    //     $results = DB::connection('pgsql')->select('SELECT * FROM postgres.logue_usuario_dashboard(?,?)', [
    //         $p_loging,
    //         $p_passwd
    //     ]);

    //     return response()->json($results);
    // }
    public function loginUser(Request $request)
    {
        $p_loging = $request['p_loging'];
        $p_passwd = $request['p_passwd'];

        $results = DB::connection('mysql')->select('SELECT * FROM postgres.logue_usuario_dashboard(?,?)', [
            $p_loging,
            $p_passwd
        ]);

        return response()->json($results);
    }

    public function getReniec(Request $request)
    {
        $request->validate([
            'nuDniConsulta' => 'required|digits:8',
        ], [
            'nuDniConsulta.digits' => 'El número de DNI debe tener exactamente 8 dígitos.',
        ]);

        $response = Http::get(env('URL_RENIEC'), [
            'nuDniConsulta' => $request->input('nuDniConsulta'),
            'nuDniUsuario' => env('RENIEC_NUDNI'),
            'nuRucUsuario' => env('RENIEC_RUC'),
            'password' => env('RENIEC_PASS'),
            'out' => 'json'
        ]);

        return response()->json($response->json(), $response->status());
    }

    public function getCarnetExtranjeria(Request $request)
    {
        $request->validate([
            'docconsulta' => 'required|digits:9',
        ], [
            'docconsulta.digits' => 'El número de CEE debe tener exactamente 9 dígitos.',
        ]);

        $response = Http::get(env('URL_MIGRACIONES'), [
            'username' => env('MIGRACIONES_USERNAME'),
            'password' => env('MIGRACIONES_PASSWORD'),
            'ip' => env('MIGRACIONES_IP'),
            'nivelacceso' => env('MIGRACIONES_NACCESO'),
            'docconsulta' => $request->input('docconsulta'),
            'out' => 'json'
        ]);

        return response()->json($response->json(), $response->status());
    }





    public function selAnio(Request $request)
    {
        $p_anio = $request['p_anio'];
        $p_tipo = $request['p_tipo'];

        // $results = DB::connection(self::$conexion)->select('EXEC siget.usp_ingresoany_sel ?', [
        //     $p_anio,

        // ]);
        $results = DB::connection('pgsql')->select('SELECT * FROM postgres.uf_ingresosany_sel(?)', [
            $p_anio
        ]);

        return response()->json($results);
    }

    public function selMes(Request $request)
    {
        $p_anio = $request['p_anio'];
        $p_mes = $request['p_mes'];

        // $results = DB::connection(self::$conexion)->select('EXEC siget.usp_ingresodia_sel ?, ?', [
        //     $p_anio,
        //     $p_mes
        // ]);

        $results = DB::connection('pgsql')->select('SELECT * FROM postgres.uf_ingresosany_sel_dia(?, ?)', [
            $p_anio,
            $p_mes
        ]);
        return response()->json($results);
    }
}
