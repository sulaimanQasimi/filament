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
            $table->integer('konkor_year')->nullable();
            $table->integer('enter_year')->nullable();
            $table->integer('break_year')->nullable();
            $table->integer('drop_year')->nullable();
            $table->integer('fail_year')->nullable();
            $table->integer('graduate_year')->nullable();
            $table->string('degree')->nullable();
            /**
             * School
             */
            $table->string('konkor_id')->nullable();
            $table->string('konkor_score')->nullable();

            $table->string('school_name')->nullable();
            $table->integer('school_graduation_year')->nullable();
            /**
             * Research
             */
            $table->string('research_title')->nullable();
            $table->string('research_teacher')->nullable();
            $table->integer('research_defendent_year')->nullable();
            /**
             * Language
             */
            $table->string('language')->nullable();
            /**
             * info
             */
            $table->string('id_card')->nullable();
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
            $table->string('father_name_en')->nullable();
            $table->string('grand_father_name_en')->nullable();
            /**
             * Birth
             */
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            /**
             * contact
             */
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
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
