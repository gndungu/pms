<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonLearnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_learned', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->references('id')->on('countries');
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->foreignId('thematic_area_id')->references('id')->on('thematic_areas');
            $table->foreignId('business_unit_id')->references('id')->on('business_units');
            $table->foreignId('staff_title_id')->references('id')->on('staff_titles');
            $table->text('lesson_learned');
            $table->text('barriers');
            $table->text('comment');
            $table->foreignId('created_by')->nullable()->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_learneds');
    }
}
