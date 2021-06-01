<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'articles', function ( Blueprint $table ) {
            $table->increments( 'id' );

            $table->unsignedInteger( 'subject_id' );

            $table->string( 'name', 255 );
            $table->text('comment');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign( 'subject_id' )->references( 'id' )->on( 'subjects' );
            // user_id does not have a foreign key because user_id is in a different DB
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'articles' );
    }
}
