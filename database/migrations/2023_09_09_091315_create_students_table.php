<?php

use App\Models\Department;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            /**
             * University
             */
            $table->foreignIdFor(Department::class);
            $table->string('konkor_id')->nullable();
            $table->string('section')->nullable();
            //$table->string('');
            /**
             * Language
             */
            $table->string('language')->nullable();
            /**
             * info
             */
            $table->string('year')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('mother_name')->nullable();
            /**
             * English Field
             */
            $table->string('name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('grand_father_name_en')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('department_id')->on('departments')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
