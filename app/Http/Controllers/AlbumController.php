<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Band;
use App\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            error_log(print_r($request,1));
            $bands = Band::pluck('name', 'id');

            $albums = DB::table('album')
                ->join('band', 'band.id', '=', 'album.band_id')
                ->select('album.*', 'band.name as band_name')
                ->get();
            return view('albums.index', ['bands'=> $bands, 'albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('albums.create', [ 'bands'=> Band::pluck('name', 'id') ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            try {
                $input = $request->all();
                Album::create($input);
                return redirect('albums');
            } catch (Exception $ex) {
                return Response::json("{}", 404);
            }
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->album->delete($id);
            return redirect('albums');
        } catch (Exception $ex) {
            return Response::json("{}", 404);
        }
    }
}
