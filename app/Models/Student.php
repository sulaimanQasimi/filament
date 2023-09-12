<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = ['subject_total1'];
    public function getSubjectTotal1Attribute()
    {
        return $this->total_score(1);
    }

    public function getSubjectTotal2Attribute()
    {
        return $this->total_score(2);
    }

    public function getSubjectTotal3Attribute()
    {
        return $this->total_score(3);
    }

    public function getSubjectTotal4Attribute()
    {
        return $this->total_score(4);
    }

    public function getSubjectTotal5Attribute()
    {
        return $this->total_score(5);
    }

    public function getSubjectTotal6Attribute()
    {
        return $this->total_score(6);
    }

    public function getSubjectTotal7Attribute()
    {
        return $this->total_score(7);
    }

    public function getSubjectTotal8Attribute()
    {
        return $this->total_score(8);
    }
    private function total_score(int $semester)  {

        return  trans('Rate',['total'=>  $this->scores()->where('semister',$semester)->whereNotNull('subject')->sum('total'),'avg'=>  $this->scores()->where('semister',$semester)->whereNotNull('subject')->avg('total')])      ;
    }
    public function getFinalResultAttribute()  {

        return  trans('Rate',['total'=>  $this->scores()->whereNotNull('subject')->sum('total'),'avg'=>  $this->scores()->whereNotNull('subject')->avg('total')])      ;
    }
    protected $guarded = [];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
