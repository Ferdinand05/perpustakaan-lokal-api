<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BukuResource extends JsonResource
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
            'judul' => $this->judul,
            'pengarang' => $this->pengarang,
            'kategori' => [
                'id_kategori' => $this->kategori->id,
                'nama_kategori' => $this->kategori->nama_kategori
            ],
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'sampul' => $this->sampul,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
