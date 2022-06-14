<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use DateTime;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $articulos = Articulo::all();
        // return view('articulo.index')->with('articulos', $articulos);

        $articulos = DB::select('SELECT * FROM fn_listar_articulos()');

        return view('articulo.index')->with('articulos', $articulos);
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $articulos = new Articulo();

        DB::select('CALL sp_insert_articulo(?,?,?,?,?)',
        array(
            $request->get('codigo'), 
            $request->get('descripcion'),
            $request->get('cantidad'),
            $request->get('precio'),
            now()
        ));

        // $articulos = new Articulo();
        // $articulos->codigo = $request->get('codigo');
        // $articulos->descripcion = $request->get('descripcion');
        // $articulos->cantidad = $request->get('cantidad');
        // $articulos->precio = $request->get('precio');

        // $articulos->save();

        return redirect('/articulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $articulo = DB::select("SELECT * FROM fn_listar_articulos_edit(".$id.")");
        return view('articulo.edit')->with('articulo',$articulo);


        // $articulo = Articulo::find($id);
        // return view('articulo.edit')->with('articulo', $articulo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::select('CALL sp_edit_articulo(?,?,?,?,?,?)',
        array(
            $id,
            $request->get('codigo'), 
            $request->get('descripcion'),
            $request->get('cantidad'),
            $request->get('precio'),
            now()
        ));
        // $articulo = Articulo::find($id);

        // $articulo->codigo = $request->get('codigo');
        // $articulo->descripcion = $request->get('descripcion');
        // $articulo->cantidad = $request->get('cantidad');
        // $articulo->precio = $request->get('precio');

        // $articulo->save();

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $articulo = Articulo::find($id);
        // $articulo->delete();

        $articulo = DB::select("CALL sp_delete_articulo(".$id.")");

        return redirect('/articulos');
    }
}
