<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use App\Http\Requests\LivroStoreRequest;
use App\Http\Requests\LivroUpdateRequest;
use App\Http\Resources\LivroResource;
use Illuminate\Support\Str;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = \Request::get('perpage') ?: 15;
        $orderby = \Request::get('orderby') ?: 'id';
        $order = \Request::get('order') ?: 'asc';
        $search = \Request::get('search') ?: '';

        if (Str::length($search) > 0){
            return LivroResource::collection(Livro::where('id', 'like', '%'.$search.'%')
                                                    ->orWhere('autor', 'like', '%'.$search.'%')
                                                    ->orWhere('nome', 'like', '%'.$search.'%')
                                                    ->orWhere('categoria', 'like', '%'.$search.'%')
                                                    ->orWhere('codigo', 'like', '%'.$search.'%')
                                                    ->orWhere('tipo', 'like', '%'.$search.'%')
                                                    ->orderBy( $orderby, $order)->paginate($per_page));
        }else{
            return LivroResource::collection(Livro::orderBy( $orderby, $order)->paginate($per_page));
        }
        return LivroResource::collection(Livro::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LivroStoreRequest $request)
    {
        $input = $request->validated();
        $Livro = new Livro($input);
        $Livro->save();
        return new LivroResource($Livro);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $Livro)
    {
        return new LivroResource($Livro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Livro $Livro, LivroUpdateRequest $request)
    {
        $input = $request->validated();

        $Livro->fill($input);
        $Livro->save();

        return new LivroResource($Livro->fresh());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $Livro)
    {
        $Livro->delete();
    }
}
