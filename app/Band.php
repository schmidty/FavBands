<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
        protected $table = 'band';

        protected $guarded = ['id'];

        /**
         * @return object
         */
        public function albums()
        {
            return $this->hasMany('App\Album');
        }

}
