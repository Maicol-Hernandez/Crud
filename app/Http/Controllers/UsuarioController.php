<?php

namespace App\Http\Controllers;

use App\Models\RolUsuario;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Support\Facades\DB;


/**
 * Class UsuarioController
 * @package App\Http\Controllers
 */
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate();
        $rol_usuarios = RolUsuario::pluck('rol_nombre', 'id');


        return view('usuario.index', compact('usuarios', 'rol_usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
        // return response()->json();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new User();
        $rol_usuarios = RolUsuario::pluck('rol_nombre', 'id');
        return view('usuario.create', compact('usuario', 'rol_usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate(Usuario::$rules, Usuario::$message);
        $usuario = request()->except('_token');
        if ($request->hasFile('photo')) {
            $usuario['photo'] = $request->file('photo')->store('uploads', 'public');
            echo $usuario['photo'];
        }

        User::create([
            'name' => $usuario['name'],
            'email' => $usuario['email'],
            'tipo' => $usuario['tipo'],
            'photo' => $usuario['photo'],
            'identificacion' => $usuario['identificacion'],
            'password' => Hash::make($usuario['password']),
            // identificacion photo
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario created successfully.');
        // return response()->json($usuario);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        $rol_usuarios = RolUsuario::pluck('rol_nombre', 'id');
        // echo "valor del rol" . $rol_usuarios;
        return view('usuario.show', compact('usuario', 'rol_usuarios'));
        // return response()->json($usuario );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol_usuarios = RolUsuario::pluck('rol_nombre', 'id');
        $usuario = User::find($id);
        return view('usuario.edit', compact('usuario', 'rol_usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {

        // request()->validate(Usuario::$rules, Usuario::$message);

        $datos = request()->except(['_token', '_method']);

        if ($request->hasFile('photo')) {
            # code...
            Storage::delete(['public/' . $usuario->photo]);
            $datos['photo'] = request()->file('photo')->store('uploads', 'public');
        }
        User::where('id', '=', $usuario->id)->update($datos, [
            'password' => Hash::make($datos['password']),
        ]);

        $usuario = User::findOrFail($usuario->id);

        // echo "valor password " . $datos['password'];
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario updated successfully');
        // return response()->json($usuario);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $usuario)
    {


        if (Storage::delete(['public/' . $usuario->photo])) {
            # code...
            $usuario = User::find($usuario->id)->delete();
        }
        // echo "valor user" . $usuario;


        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario deleted successfully');

        // return response()->json();
    }
}
