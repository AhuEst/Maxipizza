<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $clientes = Clientes::all();
        return view('admin.clientes.index',compact('clientes'));
    }
    public function create()
    {
        return view('admin.clientes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:255',
            'tipo_doc' => 'required|string',
            'num_doc' => 'required|string',
            'rol_id' => 'required|integer', // Validar rol_id
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->tipo_doc = $request->tipo_doc;
        $user->num_doc = $request->num_doc;

        // Asignar rol_id, usando 2 si no se proporciona
        $user->rol_id = $request->rol_id ?? 2;

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }
}
