<?php

use App\Enums\ImageType;
use App\Enums\ResType;
use App\Enums\VideoType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResHallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_halls', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->enum('type', ResType::getValues());
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
        Schema::dropIfExists('res_halls');
    }
}