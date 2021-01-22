<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUseridToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); //user_idカラムの追加
            
            //外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            
            //外部キー削除
            $table->dropForeign('tasks_user_id_foreign');
            //user_idカラムの削除
            $table->dropColumn('user_id');
        });
    }
}
