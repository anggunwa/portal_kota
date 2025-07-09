<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['opd_id', 'nama_layanan', 'deskripsi', 'link'];

    public function opd() {
        return $this->belongsTo(OPD::class);
    }
}
