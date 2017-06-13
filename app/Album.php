<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
        protected $table = 'album';

        protected $guarded = ['id'];

        protected $fillable = [
            'name',
            'recorded_date',
            'release_date',
            'numberoftracks',
            'label',
            'producer',
            'genre',
        ];

        /**
         * @return object
         */
        public function band()
        {
            return $this->belongsTo('App\Band', 'band_id');
        }

}
