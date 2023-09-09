<?php

use App\Models\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->nullable();
            $table->string('subject');
            $table->string('credit')->nullable();
            $table->integer('chance_1')->nullable();
            $table->integer('chance_2')->nullable();
            $table->integer('chance_3')->nullable();
            $table->integer('chance_4')->nullable();
            $table->integer('chance_5')->nullable();
            $table->integer('total')->nullable();
            $table->string('group')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
