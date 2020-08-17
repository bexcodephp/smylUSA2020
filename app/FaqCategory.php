<?php

namespace App;

use App\Shop\Faq;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    public $table = "faq_categories";
    
    protected $primaryKey = 'faq_category_id';
    
    public function faq()
    {
        return $this->hasMany(Faq::class, 'faq_category_id');
    }
}
