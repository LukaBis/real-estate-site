<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestemonialTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testemonial_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('testemonial_id');
            $table->foreign('testemonial_id')->references('id')->on('testemonials')->onDelete('cascade');

            $table->longText('text');
            $table->string('locale');

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
        Schema::dropIfExists('testemonial_translations');
    }
}
