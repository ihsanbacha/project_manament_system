<?php

namespace App\Models\back_end;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employes_model extends Model
{
    protected $table = 'employes';
    protected $primaryKey = 'employe_id';
    use HasFactory;
}
