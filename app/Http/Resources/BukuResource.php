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
            'id_kategori' => $this->id_kategori,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
