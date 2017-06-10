<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandAlbumTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('band', function(Blueprint $table) {
			$table->increments('id');
			$table->date('start_date');
			$table->string('website', 999);
			$table->boolean('still_active')->default(1);

			$table->engine = 'innodb';
		});

                Schema::create('album', function(Blueprint $table) {
			$table->increments('id');
                        $table->integer('band_id');
                        $table->string('name');
                        $table->date('recorded_date');
                        $table->date('release_date');
                        $table->integer('numberoftracks');
                        $table->string('label');
                        $table->string('producer');
                        $table->string('genre');

			$table->engine = 'innodb';
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('album');
            Schema::dropIfExists('band');
    }
}
