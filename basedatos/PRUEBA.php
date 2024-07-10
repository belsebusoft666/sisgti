<?php

namespace App\Http\Controllers;

use App\Models\Informatica;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//Usar DOMPDF
use Barryvdh\DomPDF\Facade\Pdf;
class InformaticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //creamos una funcion
    public function pdf(){
        $informatica=Informatica::all();
        $pdf = Pdf::loadView('admin.informatica.pdf', compact('informatica') /**$data*/);
        return $pdf->stream();
        /**return $pdf->download('informatica.pdf');*/
    }


    public function index()
    {
        return view("admin.informatica.index");
    }

    public function search(Request $request)
    {
        // recuerar el parametro busqueda
        $busqueda = $request->get('busqueda', '');

        // realizar la busqueda
        // ORM -> ELOQUENT
        // select id, ip from tipocurso WHERE ip LIKE '%diplomado%' AND deleted_at IS NULL
        $listado = Informatica::join('laboratorio','informatica.laboratorio_id', '=', 'laboratorio.id')
        ->where('informatica.ip' , 'LIKE', '%' . $busqueda . '%')
        ->select('informatica.id','informatica.ip','informatica.laboratorio_id','informatica.disco_duro','informatica.placa_madre','informatica.procesador','informatica.memoria_ram','informatica.monitor','informatica.teclado','informatica.mouse','informatica.tarjeta_video','informatica.tarjeta_red','informatica.lectora','informatica.descripcion')
        ->get();
        
        return view("admin.informatica.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laboratorio_informatica = Laboratorio::orderBy('num_laboratorio', 'ASC')->select('id','num_laboratorio','pabellon')->get();
        $datos_informatica = Informatica::selec('id','ip','disco_duro','placa_madre','procesador','memoria_ram','monitor','teclado','mouse','tarjeta_video','tarjeta_red','lectora','descripcion')->get();
        return view("admin.informatica.create",[
            'laboratorio_informatica' => $laboratorio_informatica,
            'datos_informatica' => $datos_informatica,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // aplicar validacion de nuestros datos
        $validator = Validator::make($request->all(), [
            'ip' => 'required|string|min:15|max:15',
            'laboratorio_id' => 'required|int', 
            'disco_duro' => 'required|string',
            'placa_madre' => 'required|string',
            'procesador' => 'required|string',
            'memoria_ram' => 'required|string',
            'monitor' => 'required|string',
            'teclado' => 'required|string',
            'mouse' => 'required|string',
            'tarjeta_video' => 'required|string',
            'tarjeta_red' => 'required|string',
            'lectora' => 'required|string',
            'descripcion' => 'required|string'
        ]);

        if ($validator->fails()) {
            // retornar la lista de errores JSON
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            $disco_duro = $request->get('disco_duro');
            $ip = $request->get('ip');
            $laboratorio_id = $request ->get('laboratorio_id');
            $placa_madre = $request->get('placa_madre');
            $procesador = $request->get('procesador');
            $memoria_ram = $request->get('memoria_ram');
            $monitor = $request->get('monitor');
            $teclado = $request->get('teclado');
            $mouse = $request->get('mouse');
            $tarjeta_video = $request->get('tarjeta_video');
            $tarjeta_red = $request->get('tarjeta_red');
            $lectora = $request->get('lectora');
            $descripcion = $request->get('descripcion');

            // crear un nuevo registro en la BD
            // INSERT INTO tipocurso (ips, activo) VALUES ($ip, 1)
            $informatica = new Informatica();
            $informatica->ip = $ip;
            $informatica->laboratorio_id = $laboratorio_id;
            $informatica->disco_duro = $disco_duro;
            $informatica->placa_madre = $placa_madre;
            $informatica->procesador = $procesador;
            $informatica->memoria_ram = $memoria_ram;
            $informatica->monitor = $monitor;
            $informatica->teclado = $teclado;
            $informatica->mouse = $mouse;
            $informatica->tarjeta_video = $tarjeta_video;
            $informatica->tarjeta_red = $tarjeta_red;
            $informatica->lectora = $lectora;
            $informatica->descripcion = $descripcion;
            //$informatica->save(); // encargado de aplicar el insert into

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar el tipo de curso. Contactarse con el area de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // select * from tipocurso WHERE id = $id
            $informatica = Informatica::find($id);
            // $tipocurso = Tipocurso::where('id', '=', $id)->first();
            return view('admin.informatica.edit', ["item" => $informatica]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'ip' => 'required|string|min:3|max:50'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            $informatica = Informatica::find($id);
            $informatica->ip = $request->get('ip');
            $informatica->laboratorio_id = $request->get('laboratorio_id');
            $informatica->disco_duro = $request->get('disco_duro');
            $informatica->placa_madre = $request->get('placa_madre');
            $informatica->procesador = $request->get('procesador');
            $informatica->memoria_ram = $request->get('memoria_ram');
            $informatica->monitor = $request->get('monitor');
            $informatica->teclado = $request->get('teclado');
            $informatica->mouse = $request->get('mouse');
            $informatica->tarjeta_video = $request->get('tarjeta_video');
            $informatica->tarjeta_red = $request->get('tarjeta_red');
            $informatica->lectora = $request->get('lectora');
            $informatica->descripcion = $request->get('descripcion');
            $informatica->save(); // aplicando el UPDATE tipocurso SET ip = $reques WHERE id = $id
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el tipo de curso'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $informatica = Informatica::find($id);
            $informatica->delete(); // DELETE FROM tipocurso WHERE id =$id
            // UPDATE tipocurso SET deleted_at = TIMESTAMP where id = $id

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar tipo de curso'];

            return response()->json($data, 500);
        }
    }
}
