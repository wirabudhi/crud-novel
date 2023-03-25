<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Novel\StoreRequest;
use App\Http\Requests\Novel\UpdateRequest;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // - Memberikan response berupa view untuk menampilkan halaman index
        return response()->view('novel.index', [
            // - Menangkap data dalam Model Novel dan mengurutkanya berdasarkan waktu terakhir update
            'novel' => Novel::orderBy('updated_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        // - Memberikan response berupa view dari form tambah novel
        return response()->view('novel.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        // - Melakukan validasi terhadap hasil inputan
        $validated = $request->validated();

        // ? Mengecek apabila terdapat request file dengan nama gambar
        if ($request->hasFile('gambar')) {
            // - Menyimpan file dalam public storage
            $filePath = Storage::disk('public')->put('images/posts/gambar', request()->file('gambar'));
            // - Melakukan validasi gambar
            $validated['gambar'] = $filePath;
        }

        // - Menyimpan data yang telah divalidasi
        $create = Novel::create($validated);

        // ? Apabila data berhasil tersimpan
        if($create) {
            // - Tambahkan notif sukses
            session()->flash('notif.success', 'Novel berhasil ditambahkan!');
            // - Mengembalikan halaman menuju index
            return redirect()->route('novel.index');
        }

        // - Menentukan port request menjadi 500
        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        // - Memberikan response berupa view dari halaman detail novel
        return response()->view('novel.show', [
            // - Menangkap data novel berdasarkan id jika ada dan jika tidak maka akan gagal
            'novel' => Novel::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        // - Memberikan response berupa view dari halaman detail novel
        return response()->view('novel.form', [
            // - Menangkap data novel berdasarkan id jika ada dan jika tidak maka akan gagal
            'novel' => Novel::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        // - Menangkap data novel berdasarkan id jika ada dan jika tidak maka akan gagal
        $novel = Novel::findOrFail($id);
        // - Melakukan validasi data
        $validated = $request->validated();

        // ? Jika terdapat file dengan nama gambar
        if ($request->hasFile('gambar')) {
            // - Hapus gambar sebelumnya yang tersimpan
            Storage::disk('public')->delete($novel->gambar);
            // - Tambahkan gambar baru ke dalam folder public
            $filePath = Storage::disk('public')->put('images/posts/gambar', request()->file('gambar'), 'public');
            // - Melakukan validasi gambar
            $validated['gambar'] = $filePath;
        }

        // - Melakukan update data yang sudah divalidasi
        $update = $novel->update($validated);

        // ? Apabila terdapat update
        if($update) {
            // - Maka berikan notifikasi novel berhasil diupdate
            session()->flash('notif.success', 'Novel berhasil diupdate!');
            // - Mengembalikan halaman menuju index
            return redirect()->route('novel.index');
        }

        // - Menambahkan port request menjadi 500
        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // - Menangkap data novel berdasarkan id jika ada dan jika tidak maka akan gagal
        $novel = Novel::findOrFail($id);
        // - Menghapus file gambar dari folder
        Storage::disk('public')->delete($novel->gambar);
        // - Menghapus data berdasarkan id
        $delete = $novel->delete($id);
        // ? Apabila berhasil melakukan delete
        if($delete) {
            // - Memberikan notifikasi
            session()->flash('notif.success', 'Novel berhasil dihapus!');
            // - Mengembalikan halaman menuju index
            return redirect()->route('novel.index');
        }

        // - Menambahkan port request menjadi 500
        return abort(500);
    }
}
