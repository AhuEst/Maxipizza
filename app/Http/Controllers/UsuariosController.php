<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // Muestra todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    // Almacena un nuevo usuario
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
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->tipo_doc = $request->tipo_doc;  // Añadir
        $user->num_doc = $request->num_doc;    // Añadir
        $user->rol_id = $request->rol_id ?? 2; // Asignar rol_id

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito.');
    }


    // Muestra un usuario específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.show', compact('user'));
    }

    // Muestra el formulario de edición para un usuario específico
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('usuarios.edit', compact('user'));
    }

    // Actualiza un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Solo actualizar la contraseña si se proporciona
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;

        // Asignar rol_id con un valor predeterminado si no se proporciona
        $user->rol_id = $request->rol_id ?? 1; // Usar 1 si rol_id no está en la solicitud

        $user->save();

        return redirect()->route('usuarios.index');
    }

    // Elimina un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index');
    }
}
