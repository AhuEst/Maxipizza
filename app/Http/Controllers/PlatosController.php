<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Platos;
use App\Models\Categoria; // Asegúrate de importar el modelo Categoria

class PlatosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Cargar los platos con la relación de categoría
        if (isset($request->estado)) {
            $platos = Platos::where('Estado', $request->estado)->with('categoria')->get();
        } else {
            $platos = Platos::with('categoria')->get();
        }

        // Agrupar platos por categoría
        $platosPorCategoria = $platos->groupBy(function($plato) {
            return $plato->categoria->nombre; // Agrupar por el nombre de la categoría
        });

        // Cargar todas las categorías
        $categorias = Categoria::all();

        // Cambia esta línea
        return view('admin.platos.index', compact('platos', 'platosPorCategoria', 'categorias')); // Asegúrate de incluir 'platos'
    }


    protected function create(Request $request)
    {
        //
    }

    protected function store(Request $request)
    {
        $txtadjunto = '';
        if ($request->file('imagen')) {
            $archivo = $request->file('imagen');
            $txtadjunto = 'img_' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto);
        }

        $txtadjunto2 = '';
        if ($request->file('imagen2')) {
            $archivo = $request->file('imagen2');
            $txtadjunto2 = 'img_2' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto2);
        }

        $txtadjunto3 = '';
        if ($request->file('imagen3')) {
            $archivo = $request->file('imagen3');
            $txtadjunto3 = 'img_3' . Str::random(10) . '.png';
            $path = public_path() . '/platos';
            $archivo->move($path, $txtadjunto3);
        }

        if ($request->id == 0) {
            $platos = new Platos();
            $platos->Nombre = $request->nombre;
            $platos->Descripcion = $request->descripcion;
            $platos->Precio = $request->precio;
            $platos->Estok = $request->estok;
            $platos->Estok_min = $request->estok_min;
            $platos->Imagen = $txtadjunto;
            $platos->Imagen2 = $txtadjunto2;
            $platos->Imagen3 = $txtadjunto3;
            $platos->Estado = $request->estado == 'on' ? true : false;
            $platos->categoria_id = $request->categoria_id; // Asigna la categoría
            $platos->save();
        } else {
            $platos = Platos::find($request->id);
            $platos->Nombre = $request->nombre;
            $platos->Descripcion = $request->descripcion;
            $platos->Precio = $request->precio;
            $platos->Estok = $request->estok;
            $platos->Estok_min = $request->estok_min;
            if ($request->file('imagen')) {
                $platos->Imagen = $txtadjunto;
            }
            if ($request->file('imagen2')) {
                $platos->Imagen2 = $txtadjunto2;
            }
            if ($request->file('imagen3')) {
                $platos->Imagen3 = $txtadjunto3;
            }
            $platos->Estado = $request->estado == 'on' ? true : false;
            $platos->categoria_id = $request->categoria_id; // Asigna la categoría
            $platos->save();
        }

        return redirect()->route('platoss.index');
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    protected function destroy($id)
    {
        $platos = Platos::find($id);
        $platos->delete();
        return redirect()->route('platoss.index');
    }
}
