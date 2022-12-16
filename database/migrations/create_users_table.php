<?php

require(dirname(__DIR__) . '/../index.php');

use App\Models\Cabinet;
use App\Models\City;
use App\Models\School;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

/**
 * cities table
 */
Capsule::schema()->dropIfExists('cities');
Capsule::schema()->create('cities', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->timestamps();
});

/**
 * schools table
 */
Capsule::schema()->dropIfExists('schools');
Capsule::schema()->create('schools', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->foreignIdFor(City::class);
    $table->timestamps();
});

/**
 * users table
 */
Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('last_name');
    $table->string('email')->unique();
    $table->string('phone')->unique()->nullable();
    $table->string('password');
    $table->foreignIdFor(School::class);
    $table->boolean('is_admin')->default(false);
    $table->timestamps();
});

/**
 * cabinets table
 */
Capsule::schema()->dropIfExists('cabinets');
Capsule::schema()->create('cabinets', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->foreignIdFor(School::class);
    $table->timestamps();
});

/**
 * cabinet_bookings table
 */
Capsule::schema()->dropIfExists('cabinet_bookings');
Capsule::schema()->create('cabinet_bookings', function (Blueprint $table) {
    $table->id();
    $table->foreignIdFor(Cabinet::class);
    $table->foreignIdFor(User::class);
    $table->timestamp('started_id');
    $table->timestamp('ended_id');
});


