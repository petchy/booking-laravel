<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_room_types', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')
                    ->references('id')
                    ->on('services')->onDelete('cascade');

            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id')
                    ->references('id')
                    ->on('room_types')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['service_id', 'room_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_room_types');
    }
}
