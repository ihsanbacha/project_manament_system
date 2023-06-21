<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_model extends Model
{
    protected $primaryKey = 'file_id';
    protected $table = 'files';
    use HasFactory;
}
