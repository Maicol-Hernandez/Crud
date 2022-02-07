<?php

namespace App\Http\Controllers;

use App\Models\RolUsuario;
use Illuminate\Http\Request;

/**
 * Class RolUsuarioController
 * @package App\Http\Controllers
 */
class RolUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolUsuarios = RolUsuario::paginate();

        return view('rol-usuario.index', compact('rolUsuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $rolUsuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolUsuario = new RolUsuario();
        return view('rol-usuario.create', compact('rolUsuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RolUsuario::$rules);

        $rolUsuario = RolUsuario::create($request->all());

        return redirect()->route('rol-usuarios.index')
            ->with('success', 'RolUsuario created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolUsuario = RolUsuario::find($id);

        return view('rol-usuario.show', compact('rolUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolUsuario = RolUsuario::find($id);

        return view('rol-usuario.edit', compact('rolUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RolUsuario $rolUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolUsuario $rolUsuario)
    {
        request()->validate(RolUsuario::$rules);

        $rolUsuario->update($request->all());

        return redirect()->route('rol-usuarios.index')
            ->with('success', 'RolUsuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rolUsuario = RolUsuario::find($id)->delete();

        return redirect()->route('rol-usuarios.index')
            ->with('success', 'RolUsuario deleted successfully');
    }
}
