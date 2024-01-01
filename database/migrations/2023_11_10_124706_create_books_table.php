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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('photo');
            $table->integer('price');
            $table->date('publication_date');
            $table->integer('quantity');
            $table->foreignId('id_publisher')->constrained('publishers')->onDelete('cascade');
            $table->foreignId('id_writer')->constrained('writers')->onDelete('cascade');
            $table->foreignId('id_category')->constrained('categories')->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
