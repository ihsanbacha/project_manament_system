<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_model extends Model
{
    protected $primaryKey = 'project_id';
    protected $table = 'projects';
    use HasFactory;
}
