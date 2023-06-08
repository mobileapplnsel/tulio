<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectRoomProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_room_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_room_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('quantity');
            $table->string('unit')->nullable();
            $table->string('name');
            $table->string('color')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('lining_type')->nullable();
            $table->string('mount_type')->nullable();
            $table->string('hardware_type')->nullable();
            $table->string('power_type')->nullable();
            $table->string('control_type')->nullable();
            $table->decimal('price')->default(0.0);
            $table->decimal('tax')->default(0.0);
            $table->decimal('total')->default(0.0);
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('project_room_products');
    }
}
