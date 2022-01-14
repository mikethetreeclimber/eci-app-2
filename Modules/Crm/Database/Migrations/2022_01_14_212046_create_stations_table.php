<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Crm\Entities\Circuit;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Circuit::class);
            $table->integer('station_number');
            $table->text('units');
            $table->text('address');
            $table->text('contact_name');
            $table->text('contact_number');
            $table->text('alt_contact_number');
            $table->text('attempt_one');
            $table->text('attempt_two');
            $table->text('attempt_three');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
