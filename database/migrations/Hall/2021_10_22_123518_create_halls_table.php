<?php

use App\Enums\PriorityEnum;
use App\Enums\RateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
            $table->string('Latitude');
            $table->string('Longitude');
            $table->string('area');
            $table->string('address');
            $table->integer('capacity');
            $table->enum('priority', PriorityEnum::getValues())->default(PriorityEnum::low);
            $table->enum('rate', RateEnum::getValues());
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('halls');
    }
}