<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kategori'];


    /**
     * Get all of the buku for the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class, 'id_kategori', 'id');
    }
}
