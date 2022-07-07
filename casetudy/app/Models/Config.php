<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = 'config';
    use HasFactory;
    public function product()
    {
        return $this->hasOne(Config::class, 'config_id', 'id');

    }
}
