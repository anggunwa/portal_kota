<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPD extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'slug', 'link', 'logo'];
    protected $table = 'opds';

    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'opd_id');
    }

}
