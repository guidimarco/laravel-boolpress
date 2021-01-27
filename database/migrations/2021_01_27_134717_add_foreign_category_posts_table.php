<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // new foreing key in posts -> category_id
            $table -> unsignedBigInteger('category_id') -> nullable() -> after('title');

            // constrained FK && category -> id
            $table -> foreign('category_id') -> references('id') -> on('categories') -> onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // delete constrain
        $table -> dropForeign('posts_category_id_foreign');
        // delete column
        $table -> dropColumn('category_id');
    }
}
