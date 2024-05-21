<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return KategoriResource::collection($kategori);
    }
}
