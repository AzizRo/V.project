<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteerworks', function (Blueprint $table) {
            $table->increments('WorkID');
            $table->string('Name');
            $table->string('Description');
            $table->string('Skills');
            $table->string('Tasks');
            $table->string('Benefits');
            $table->string('Communication');
            $table->string('Volunteernum');
            $table->string('StartDate');
            $table->string('EndDate');
            $table->integer('Duration')->nullable();
            $table->integer('volunteer_hours');
            $table->string('Gender');
            $table->string('Major');
            $table->string('Location');
            $table->string('Field');
            $table->string('status')->default("Waiting for approval");
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


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
        Schema::dropIfExists('volunteerworks');
    }
}

