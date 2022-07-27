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
        Schema::create('category_sections', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('section_id')->references('id')->on('sections')
            ->cascadeOnDelete()
           -> cascadeOnUpdate();
            $table->foreign('category_id')->references('id')->on('categories')
            ->cascadeOnDelete()
            ->cascadeOnUpdate(); 
                        
            $table->primary(['section_id','category_id']);
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
        Schema::dropIfExists('category_sections');
    }
};
