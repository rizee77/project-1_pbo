<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggaran extends Model
{
    use HasFactory;

    protected $fillable = ['catatan_id', 'jumlah', 'keterangan'];

    public function catatan()
    {
        return $this->belongsTo(Catatan::class);
    }
}
