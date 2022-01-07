<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::simplePaginate(5);

        return view('pages.items/index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'picture' => 'image',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);

        $item = new Item;
        $item->nama = $request->nama;
        if ($request->file('picture')) {
            $file = $request->file('picture');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());

            $file->move('picture', $nama_file);
            $item->picture = $nama_file;
        }
        $item->deskripsi = $request->deskripsi;
        $item->harga = $request->harga;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Berhasil menambahkan item baru!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('pages.items.edit')->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'picture' => 'image',
            'deskripsi' => 'required',
            'harga' => 'required'
        ]);

        $item->nama = $request->nama;

        $old_file = $item->picture;

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $nama_file = $old_file;

            $file->move('picture', $nama_file);
            $item->picture = $nama_file;
        }
        $item->deskripsi = $request->deskripsi;
        $item->status = $request->status;
        $item->harga = $request->harga;
        $item->save();

        return redirect()->route('items.index')->with('success', 'Berhasil mengedit data item!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $file = public_path('picture/' . $item->picture);

        if (file_exists($file)) {
            @unlink($file);
        }

        $item->delete();

        return redirect()->route('items.index')->with('warning', 'Berhasil menghapus item!');;
    }
}
