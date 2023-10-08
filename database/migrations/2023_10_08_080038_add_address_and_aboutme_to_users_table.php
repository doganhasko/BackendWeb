<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressAndAboutmeToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('aboutme')->nullable();
            $table->string('address')->nullable();

        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('aboutme');
            $table->string('address');
        });
    }
}