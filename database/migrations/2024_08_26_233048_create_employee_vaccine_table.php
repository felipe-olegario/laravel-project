<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVaccineTable extends Migration
{
    public function up()
    {
        Schema::create('employee_vaccine', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('vaccine_id')->constrained()->onDelete('cascade');
            $table->integer('type'); // 1, 2 ou 3 para primeira, segunda ou terceira vacina
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_vaccine');
    }
}
