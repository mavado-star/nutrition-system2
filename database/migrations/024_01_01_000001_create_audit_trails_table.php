<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateAuditTrailsTable extends Migration {
public function up(){ Schema::create('audit_trails', function(Blueprint $t){ $t->id(); $t->unsignedBigInteger('user_id')->nullable(); $t->string('action'); $t->timestamps(); }); }
public function down(){ Schema::dropIfExists('audit_trails'); }
}