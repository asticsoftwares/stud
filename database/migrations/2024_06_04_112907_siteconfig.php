<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('config', function(Blueprint $table) {
            $table->id();
            $table->string('isMaintenanceEnabled');
            $table->string('maintenanceKey');
            $table->string('isAlertShowing');
            $table->string('alertMessage');
            $table->string('alertType');
        });

        DB::table('config')->insert([
            'id' => 1,
            'isMaintenanceEnabled' => 'no',
            'maintenanceKey' => 'ILoveStud',
            'isAlertShowing' => 'yes',
            'alertMessage' => 'Welcome to Stud, traveller!',
            'alertType' => 'warning'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
