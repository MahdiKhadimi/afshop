<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_section', function (Blueprint $table) {
         
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('section_id')->references('id')->on('sections')
            ->cascadeOnDelete()
            ->casecadeOnUpdate();

            $table->foreign('product_id')->references('id')->on('products')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            

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
        Schema::dropIfExists('product_sections');
    }
};
