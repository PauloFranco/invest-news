<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'subjects', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->unsignedInteger( 'category_id' );

            $table->string( 'name', 150 );

            $table->timestamps();
            $table->softDeletes();

            $table->foreign( 'category_id' )->references( 'id' )->on( 'categories' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'subjects' );
    }
}
