<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('VolunteerName');
            $table->string('VolunteerId');
            $table->string('WorkId');
            $table->string('WorkName');
            $table->string('StartDate');
            $table->string('EndDate');
            $table->string('VolunteeringHours');
            $table->string('ProviderName');
            $table->string('Status')->default('طلب شهادة من صاحب العمل ');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
