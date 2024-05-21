<?php

namespace App\Http\Controllers;

use App\Http\Requests\BukuRequest;
use App\Http\Resources\BukuResource;
use App\Models\Buku;
use Illuminate\Http\Request;
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
            $sampul = $image->storeAs('image-buku', $imageName);
            return $imageName;
        } else {
            return 'kosong';
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
