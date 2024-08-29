<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function generateNoAnggota(){
        $prefix = Str::upper(Str::random(2));
        $number = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        $code = $prefix . $number;
        return $code;

        if(Anggota::find($code)){
            $this->generateNoAnggota();
        }
    }

    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Anggota::create([
            'no_anggota'  => $this->generateNoAnggota(),
            'nama' => $request->nama,
            'no_ktp' => $request->no_ktp,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_bergabung' => Date::now(),
        ]);
        Alert::success('Success!', 'New Member added successfully!');
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
