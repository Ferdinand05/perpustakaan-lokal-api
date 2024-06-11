<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::all();
        return BukuResource::collection($buku);
    }

    /**
     * store new buku.
     */
    public function store(BukuRequest $request)
    {

        $image = $request->file('sampul');
        if ($image) {
            $randomName = Str::random(15);
            $imageExtension = $image->extension();

            $imageName = $randomName . '.' . $imageExtension;
            $image->storeAs('image-buku', $imageName);
        } else {
            $imageName = null;
        }

        $buku = Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'id_kategori' => $request->id_kategori,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'sampul' => $imageName
        ]);

        return new BukuResource($buku);
    }


    /**
     * Display the specified resource.
     */
    public function show(Buku $buku, $id)
    {

        $buku = Buku::findOrFail($id);



        return new BukuResource($buku);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $image = $request->file('sampul');
        if ($image) {
            $randomName = Str::random(15);
            $imageExtension = $image->extension();

            $imageName = $randomName . '.' . $imageExtension;
            $image->storeAs('image-buku', $imageName);
            Storage::delete('image-buku/' . $buku->sampul);
        } else {
            $imageName = $buku->sampul;
        }

        $buku->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'id_kategori' => $request->id_kategori,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'sampul' => $imageName
        ]);

        return new BukuResource($buku);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        Storage::delete('image-buku/' . $buku->sampul);
        $buku->delete();

        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
}
