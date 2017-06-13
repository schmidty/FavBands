<?php

use Illuminate\Database\Seeder;

class BandsAlbumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Bands
            $bands = array(
                ['name'=>"Guns 'N Roses",'start_date'=>"1985", 'website'=>"http://www.gunsnroses.com/",'still_active'=>1],
                ['name'=>"Led Zeppelin",'start_date'=>"1968",'website'=>"http://www.ledzeppelin.com/",'still_active'=>0],
                ['name'=>"Aerosmith",'start_date'=>"1970",'website'=>"http://www.aerosmith.com/",'still_active'=>1],
                ['name'=>"Queen",'start_date'=>"1970",'website'=>"http://www.queenonline.com/",'still_active'=>1],
            );
            DB::table("band")->insert($bands);
            

            // Albums
            $band_id = DB::table('band')->select('id')->where('name', "Guns 'N Roses")->first()->id;
            DB::table("album")->insert([
                'band_id'=>$band_id,
                'name'=>"Appetite For Destruction",
                'recorded_date'=>"1987",
                'release_date'=>"1987-07-21",
                'numberoftracks'=>12,
                'label'=>"Geffen",
                'producer'=>"Mike Clink",
                'genre'=>"hard rock"
            ]);

            DB::table("album")->insert([
                'band_id'=>$band_id,
                'name'=>"Lies",
                'recorded_date'=>"1988",
                'release_date'=>"1988-11-30",
                'numberoftracks'=>8,
                'label'=>"Geffen",
                'producer'=>"Mike Clink and Guns 'N Roses",
                'genre'=>"hard rock"
            ]);

            $band_id = DB::table('band')->select('id')->where('name', '=', "Led Zeppelin")->first()->id;
            DB::table("album")->insert([
                'band_id'=>$band_id,
                'name'=>"Led Zeppelin IV",
                'recorded_date'=>"1971",
                'release_date'=>"1971-11-08",
                'numberoftracks'=>8,
                'label'=>"Atlantic",
                'producer'=>"Jimmy Page",
                'genre'=>"hard rock"
            ]);

            $band_id = DB::table('band')->select('id')->where('name', '=', "Aerosmith")->first()->id;
            DB::table("album")->insert([
                'band_id'=>$band_id,
                'name'=>"Toys In The Attic",
                'recorded_date'=>"1975",
                'release_date'=>"1975-04-08",
                'numberoftracks'=>9,
                'label'=>"Columbia",
                'producer'=>"Jack Douglas",
                'genre'=>"hard rock"
            ]);

            $band_id = DB::table('band')->select('id')->where('name', '=', "Queen")->first()->id;
            DB::table("album")->insert([
                'band_id'=>$band_id,
                'name'=>"A Night At The Opera",
                'recorded_date'=>"1975",
                'release_date'=>"1975-11-21",
                'numberoftracks'=>12,
                'label'=>"EMI-Elektra",
                'producer'=>"Roy Thomas Baker",
                'genre'=>"hard rock"
            ]);
    }
}
