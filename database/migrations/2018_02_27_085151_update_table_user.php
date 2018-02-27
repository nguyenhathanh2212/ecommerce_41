<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'firstname');
            $table->string('lastname');
            $table->boolean('is_admin');
            $table->string('avatar')->nullable();
            $table->string('numberphone')->nullable();
            $table->string('delivery_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('firstname', 'mame');
            $table->dropColumn('lastname');
            $table->dropColumn('avatar');
            $table->dropColumn('numberphone');
            $table->dropColumn('delivery_address');
        });
    }
}
