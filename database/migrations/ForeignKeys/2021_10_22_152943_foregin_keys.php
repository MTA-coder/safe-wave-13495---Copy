<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeginKeys extends Migration
{

    public function up()
    {
        Schema::table('discounts', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });

        Schema::table('feature_halls', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
            $table->foreignId('feature_id')->constrained('features', 'id');
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('hall_id')->nullable()->constrained('halls', 'id');
            $table->foreignId('offer_id')->nullable()->constrained('offers', 'id');
        });

        Schema::table('res_halls', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });

        Schema::table('halls', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('city_id')->constrained('cities', 'id');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('type_service_id')->constrained('type_services', 'id');
        });

        Schema::table('res_services', function (Blueprint $table) {
            $table->foreignId('service_id')->constrained('services', 'id');
        });

        Schema::table('type_halls_halls', function (Blueprint $table) {
            $table->foreignId('type_hall_id')->constrained('type_halls', 'id');
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });

        Schema::table('occasion_halls', function (Blueprint $table) {
            $table->foreignId('occasion_id')->constrained('occasions', 'id');
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });

        Schema::table('rates', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
        });

        Schema::table('watches', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
        });

        Schema::table('favourites', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
        });

        Schema::table('prices', function (Blueprint $table) {
            $table->foreignId('hall_id')->constrained('halls', 'id');
        });
    }

    public function down()
    {
        //
    }
}