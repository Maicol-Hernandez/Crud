<?php

namespace App\Http\Controllers;

use App\Models\RolUsuario;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $usuarios = Usuario::paginate();

        return view('usuario.index', compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new Usuario();
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
        request()->validate(Usuario::$rules, Usuario::$message);

        $usuario = request()->except('_token');
        if ($request->hasFile('photo')) {
            # code...
            $usuario['photo'] = $request->file('photo')->store('uploads', 'public');
            echo "entra al if" . json_encode($usuario);
        }
        Usuario::insert($usuario);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario created successfully.');
        // return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);
        $rol_usuarios = RolUsuario::all('rol_nombre', 'id');
        echo $usuario . $rol_usuarios;
        return view('usuario.show', compact('usuario', 'rol_usuarios'));
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
        $usuario = Usuario::find($id);
        return view('usuario.edit', compact('usuario', 'rol_usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        request()->validate(Usuario::$rules, Usuario::$message);

        // $usuario = request()->except(['_token', '_method']);


        $usuario->update($request->all());


        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Usuario $usuario)
    {

        
        if (Storage::delete(['public/' . $usuario->photo])) {
            # code...
            $usuario = Usuario::find($usuario->id)->delete();
        }
// echo "valor user" . $usuario;


        // return redirect()->route('usuarios.index')
        //     ->with('success', 'Usuario deleted successfully');

        return response()->json();
    }
}
