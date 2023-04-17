<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use PhpParser\Node\Expr\Assign;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'ids',
        'artikelnummer',
        'title',
        'description',
        'color',
        'Size',
        'regal',
        'gewicht',
        'hohe',
        'menge',
        'einzel_versandart',
        'gebraucht',
        'VK_preis',
        'fach',
        'barcode',
        'tiefe',
        'lieferant',
        'datum',
        'uhrzeit',
        'image',


    ];

    public function assignedArticles(): MorphMany
    {
        return $this->morphMany(AssignArticle::class, 'origin');
    }
}
