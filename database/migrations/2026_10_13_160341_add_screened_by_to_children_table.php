<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::table('children', function (Blueprint $table) {
            if (!Schema::hasColumn('children', 'screened_by')) {
                $table->unsignedBigInteger('screened_by')->nullable()->after('clinic_id');
            }
        });
    }
    public function down(){
        Schema::table('children', function (Blueprint $table) {
            $table->dropColumn('screened_by');
        });
    }
};