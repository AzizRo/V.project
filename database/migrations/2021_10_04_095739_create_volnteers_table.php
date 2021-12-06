<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolnteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volnteers', function (Blueprint $table) {
            $table->increments("id");
            $table->string("first_name");
            $table->string("middle_name");
            $table->string("family_name");
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string("username");
            $table->string("Gender");
            $table->string("Major");
            $table->string("Work");
            $table->string('password');
            $table->string('password_confirm');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volnteers');
    }
}
