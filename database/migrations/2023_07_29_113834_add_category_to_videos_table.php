<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {

//            $table->unsignedBigInteger('category_id')->unsigned()->index();
//
//            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropForeign('videos_category_id_foreign');
            $table->dropColumn('category_id');
        });
    }
}
