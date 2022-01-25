<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Crm\Entities\Circuit;

class CreatePermissioningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissionings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Circuit::class)->onDelete('cascade');
            $table->string('customer_name');
            $table->string('address');
            $table->string('primary_phone')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('station_ids');
            $table->string('attempt_one')->nullable();
            $table->string('attempt_two')->nullable();
            $table->string('attempt_three')->nullable();
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
        Schema::dropIfExists('permissionings');
    }
}
