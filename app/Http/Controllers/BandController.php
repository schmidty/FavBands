<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Band;
use App\Album;

class BandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = DB::table('band')
            ->leftJoin('album', 'band.id', '=', 'album.band_id')
            ->select('band.*', 'album.name as album_name')
            ->get();
        return view('bands.index', ['bands'=>$bands]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bands.create');
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
        Band::create($input);
        return redirect('bands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $band = Band::findOrFail($id);

        return view('band.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $band = Band::findOrFail($id);
        $band = Band::find($id);

        return view('bands.edit')->withBand($band);
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
        $band = Band::findOrFail($id);
        $input = $request->all();

        // handle the boolean for still_active
        if (!array_key_exists('still_active', $input)) {
            $input['still_active'] = 0;
        } else {
            $input['still_active'] = 1;
        }

        $band->fill($input)->save();

        return Redirect('bands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $band = Band::find($id);
        $band->albums()->delete();
        $band->delete();

        return Redirect('bands');
    }
}
