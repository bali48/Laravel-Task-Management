<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForienKeyToUsersRight extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          //  $table->unsignedBigInteger('role_id');
           // $table->foreign('role_id')->references('id')->on('roles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_right', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign('users_role_id_roles');
                $table->dropColumn('role_id');
            });
        });
    }
}
