<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_model extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name', 'parent_cat_id'];

    public function children()
    {
        return $this->hasMany(category_model::class, 'parent_cat_id', 'cat_id');
    }
   
    use HasFactory;
}
