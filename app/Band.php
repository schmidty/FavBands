<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'band';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'start_date',
        'website',
        'still_active',
    ];

    /**
     * @return object
     */
    public function albums()
    {
        return $this->hasMany('App\Album', 'band_id', 'id');
    }
}
