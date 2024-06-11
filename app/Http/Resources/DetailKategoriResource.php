<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailKategoriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_kategori' => $this->nama_kategori,
            'buku' => $this->buku->map(function ($b) {
                return [
                    'id' => $b->id,
                    'judul' => $b->judul,
                    'pengarang' => $b->pengarang,
                    'penerbit' => $b->penerbit,
                    'tahun_terbit' => $b->tahun_terbit,
                    'sampul' => $b->sampul,
                    'created_at' => $b->created_at->diffForHumans()
                ];
            }),
            'jumlah_buku' => $this->buku->count(),
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
