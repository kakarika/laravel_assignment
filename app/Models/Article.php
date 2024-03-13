<?php

namespace App\Models;

use App\Models\ArticleImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'context', 'excerpt'];

    public function images()
    {
        return $this->hasMany(ArticleImages::class);
    }
}
