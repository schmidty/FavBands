<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;

class BandController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
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
        try {
            $input = $request->all();
            Band::create($input);
            return redirect('bands');
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
        try {
            Band::find($id)->delete();
            return Redirect('bands');
        } catch (Exception $ex) {
            return Response::json("{}", 404);
        }
    }
}
