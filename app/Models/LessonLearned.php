<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonLearned extends Model
{
    use HasFactory;

    protected $table = 'lesson_learned';

    protected $fillable = [
        'country_id',
        'project_id',
        'thematic_area_id',
        'business_unit_id',
        'staff_title_id',
        'lesson_learned',
        'barriers',
        'comment',
        'created_by',
    ];

    public function country()
  	{
  	    return $this->belongsTo(Country::class);
  	}

    public function project()
  	{
  	    return $this->belongsTo(Project::class);
  	}

    public function thematic_area()
  	{
  	    return $this->belongsTo(ThematicArea::class);
  	}

    public function business_unit()
  	{
  	    return $this->belongsTo(BusinessUnit::class);
  	}

    public function staff_title()
  	{
  	    return $this->belongsTo(StaffTitle::class);
  	}
    public function user()
  	{
  	    return $this->belongsTo(User::class, 'created_by');
  	}
}
