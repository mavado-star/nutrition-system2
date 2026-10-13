<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClinicIdToChildren extends Migration
{
    public function up()
    {
        Schema::table('children', function (Blueprint $table) {
            if (!Schema::hasColumn('children', 'clinic_id')) {
                $table->unsignedBigInteger('clinic_id')->nullable()->after('id');
            }
        });
    }
    public function down()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropColumn('clinic_id');
        });
    }
}
