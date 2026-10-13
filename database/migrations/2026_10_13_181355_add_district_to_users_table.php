<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'clinic_name')) {
                $table->string('clinic_name')->nullable()->after('name');
            }
            if (!Schema::hasColumn('users', 'district')) {
                $table->string('district')->nullable()->after('clinic_name');
            }
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('clinic_admin')->after('email');
            }
            if (!Schema::hasColumn('users', 'is_approved')) {
                $table->boolean('is_approved')->default(false)->after('role');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['clinic_name', 'district']);
        });
    }
};