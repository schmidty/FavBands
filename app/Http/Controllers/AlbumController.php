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
        //    \Illuminate\Support\Facades\Cache::flush(); /* not sure if this is working? */
        $bands = Band::pluck('name', 'id');
        $bands[0] = 'All';
        $albums = $this->getAlbumsByBandIdOrNull();

        return view('albums.index', ['bands'=> $bands, 'albums' => $albums, 'selected' => '0']);
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();
        Album::create($input);
        return redirect('albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);

        return view('album.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        $bands = Band::find($album->band_id)
            ->pluck('name', 'id');

        return view('albums.edit', ['bands'=>$bands])->withAlbum($album);
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
        $album = Album::findOrFail($id);
        $input = $request->all();
        $album->fill($input)->save();

        return Redirect('albums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param nint  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Album::find($id)->delete();
            return Redirect('albums');
        } catch (Exception $ex) {
            return Response::json("{}", 404);
        }
    }

    /**
     * @param int $band_id
     * @return object $albums
     */
    protected function getAlbumsByBandIdOrNull($band_id=null)
    {
        $albums = null;

        if ($band_id) {
            $albums = DB::table('album')
                ->join('band', 'band.id', '=', 'album.band_id')
                ->select('album.*', 'band.name as band_name', 'band.id as band_id')
                ->where('album.band_id', '=', $band_id)
                ->get();
        } else {
            $albums = DB::table('album')
                ->join('band', 'band.id', '=', 'album.band_id')
                ->select('album.*', 'band.name as band_name', 'band.id as band_id')
                ->get();
        }
        return $albums;
    }

    /**
     * @param Request $request
     * @return string view
     */
    public function filtered(Request $request)
    {
        $selected = $request->band_id;
        $bands = Band::pluck('name', 'id');
        $albums = $this->getAlbumsByBandIdOrNull($selected);
        $bands[0] = 'All';

        return (String) view('albums.partial', ['bands'=> $bands, 'albums' => $albums]);
    }
}
