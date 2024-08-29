<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        return view('buku.index');
    }

    public function mybook()
    {
        return view('buku.my-book');
    }

    public function history()
    {
        $Anggota =  Anggota::find(Auth::user()->no_anggota);
        $buku = $Anggota->bukuSudahDikembalikan();
        return view('buku.history', compact('buku'));
    }

    public function trace()
    {
        $buku = new Buku();
        $borrowedBooks = $buku->getBorrowedBooks();
        return view('buku.trace', compact('borrowedBooks'));
    }

    // Menampilkan form untuk menambahkan buku baru
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'stok' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Buku::create($request->only(['judul_buku', 'stok', 'jumlah_halaman', 'harga']));
        Alert::success('Success!', 'New book added successfully!');
        return redirect()->route('buku.index');
    }

    // Menampilkan detail buku tertentu
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function borrow(Request $request) {

        Peminjaman::create([
            'no_anggota'  => Auth::user()->no_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => Date::now(),
        ]);

        Pengembalian::create([
            'no_anggota'  => Auth::user()->no_anggota,
            'id_buku' => $request->id_buku,
        ]);

        Alert::success('Success!', 'Book Borrowed successfully!');
        return redirect()->route('buku.dipinjam');
    }

    public function return(Request $request){
        $Pengembalian = Pengembalian::where([
            ['no_anggota', '=', Auth::user()->no_anggota],
            ['id_buku', '=', $request->id_buku],
        ]);
        $Pengembalian->update(['tgl_kembali' => Date::now()]);
        Alert::success('Success!', 'Book Returned successfully!');
        return redirect()->route('buku.dipinjam');
    }

    // Menampilkan form untuk mengedit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Memperbarui buku di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required',
            'stok' => 'required|integer',
            'jumlah_halaman' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->only(['judul_buku', 'stok', 'jumlah_halaman', 'harga']));
        Alert::success('Success!', 'Book updated successfully!');
        return redirect()->route('buku.index');
    }

    // Menghapus buku dari database
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        Alert::success('Success!', 'Book deleted successfully!');
        return redirect()->route('buku.index');
    }
}
