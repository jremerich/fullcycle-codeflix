<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Traits\Uuid;

    protected $fillable = ['name', 'is_active'];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    protected $keyType = 'string';
}
