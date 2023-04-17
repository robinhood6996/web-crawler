<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class FreelancerMap extends Model
{
    use HasFactory;

     protected $fillable = [
         'id',
        'title',
        'description',
        'name',
        'url',
        'website',
        'telefon',
        'location',
        'status',
        'ansprechpartner',


    ];
    public function assignedArticles(): MorphMany
    {
        return $this->morphMany(AssignArticle::class, 'origin');
    }
}
