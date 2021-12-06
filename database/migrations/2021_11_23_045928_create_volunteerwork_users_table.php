<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerworkUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteerwork_users', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('volunteer_id');
            $table->foreign('volunteer_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');



            $table->unsignedInteger('V_WorkID');
            $table->foreign('V_WorkID')
                ->references('WorkID')
                ->on('volunteerworks')
                ->onDelete('cascade');

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
        Schema::dropIfExists('volunteerwork_users');
    }
}
