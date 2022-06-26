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
        Schema::table('users', function( $table ) {
            $table->string('github_id')->nullable();
            $table->string('preferred_login',10)->default('password');// 'password' or 'github'
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
          $table->dropColumn('github_id');
          $table->dropColumn('preferred_login');
          $table->dropColumn('avatar');
        });
    }
};
