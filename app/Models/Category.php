<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'slug', 'parent_id', 'description', 'image', 'status'
    ];

    //Dynamic Relationship
    public function parent()
    {
        return 
        $this->belongsTo(
            Category::class,'parent_id',
            'id',
            'categories'
        );
    }
    public function children() {
    return $this->hasMany(
        Category::class,
        'parent_id',
        'id');
    }
}