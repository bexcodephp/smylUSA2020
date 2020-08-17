<?php

namespace App\Shop;

use App\FaqCategory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
         'question',
         'answer'
    ];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}