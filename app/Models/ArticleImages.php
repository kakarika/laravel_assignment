<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleImages extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'image'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
