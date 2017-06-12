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
			$table->string('name', 150);
			$table->string('start_date', 4)->nullable();
			$table->string('website', 999)->nullable();
			$table->boolean('still_active')->default(1);

			$table->timestamps();
			$table->engine = 'innodb';
		});

                Schema::create('album', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('band_id')->unsigned()->default(0);
                        $table->foreign('band_id')->references('id')->on('band')->onDelete('cascade');
                        $table->string('name');
                        $table->string('recorded_date')->nullable();
                        $table->date('release_date')->nullable();
                        $table->integer('numberoftracks')->nullable();
                        $table->string('label', 250)->nullable();
                        $table->string('producer', 250)->nullable();
                        $table->string('genre', 150)->nullable();

			$table->timestamps();
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
