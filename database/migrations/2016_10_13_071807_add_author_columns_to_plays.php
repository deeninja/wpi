<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorColumnsToPlays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plays', function (Blueprint $table) {
            //
            $table->integer('photo_id')->after('conference_id');
            $table->string('author1')->default('na');
            $table->string('author2')->default('na');
            $table->string('author3')->default('na');
            $table->string('author4')->default('na');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plays', function (Blueprint $table) {
            $table->dropColumn('photo_id');
            $table->dropColumn('author1');
            $table->dropColumn('author2');
            $table->dropColumn('author3');
            $table->dropColumn('author4');
        });


    }
}
