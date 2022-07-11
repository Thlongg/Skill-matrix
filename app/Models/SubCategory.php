<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $primaryKey = 'sub_categories_id';

    protected $table = 'sub_categories';

    protected $fillable = [
        // 'category_id',
        'name',
        'parent_id'
    ];

    public function cate()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'category_id');
    }
}
