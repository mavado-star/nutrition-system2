Schema::create('children', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('age');
    $table->string('gender')->nullable();
    $table->double('weight_kg');
    $table->double('height_cm');
    $table->double('muac_cm');
    $table->double('bmi');
    $table->string('village');
    $table->string('parent_name')->nullable();
    $table->string('phone')->nullable();
    $table->string('status');
    $table->timestamps();
});