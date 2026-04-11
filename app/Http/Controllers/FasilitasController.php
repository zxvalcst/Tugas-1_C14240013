<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function home(){
        return view('home');
    }

    // Halaman Facility
    public function facility()
    {
        $fasilitas = Fasilitas::paginate(5); // ambil data fasilitas dengan pagination 5 per halaman
        return view('facility', ['fasilitas' => $fasilitas]);
    }

    // tambah fasilitas baru
    public function create(){
        $fasilitas = Fasilitas::all();
        return view('create', ['fasilitas' => $fasilitas]);
    }

    // validasi field data yg masuk
    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan' => 'required|string',
            'url' => 'nullable|url'
        ],
        [
            'nama.required'       => 'Nama fasilitas harus diisi.',
            'foto.required'       => 'Foto fasilitas harus diisi.',
            'foto.image'          => 'File harus berupa gambar.',
            'foto.mimes'          => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'foto.max'            => 'Ukuran gambar maksimal 2MB.',
            'keterangan.required' => 'Keterangan fasilitas harus diisi.',
            'url.url'             => 'URL harus berupa alamat yang valid.'
        ]);

        // Proses upload foto
        // $request->file('foto')        → ambil file yang diupload
        // ->getClientOriginalName()     → ambil nama asli file dari komputer user
        $originalName = $request->file('foto')->getClientOriginalName();
        
        // Pindahkan file ke folder public/assets/
        // Parameter: (folder tujuan, disk)
        // 'public' di sini = storage/app/public, tapi kita mau ke public/assets langsung
        $request->file('foto')->move(public_path('assets'), $originalName);
        
        // Path yang disimpan ke database (sama seperti format seeder)
        $fotoPath = 'assets/' . $originalName;

        try {
            $fasilitas = new Fasilitas();
            $fasilitas->nama = $request->nama;
            $fasilitas->foto = $fotoPath;      // simpan PATH STRING, bukan file
            $fasilitas->keterangan = $request->keterangan;
            $fasilitas->url = $request->url;

            if ($fasilitas->save()) {
                return redirect()->route('facility')->with('success', 'Fasilitas berhasil ditambahkan.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menambahkan fasilitas. Silakan coba lagi.');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $fasilitas = Fasilitas::findOrFail($id);
        return view('edit', ['fasilitas' => $fasilitas]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama'       => 'required|string|max:255',
            'foto'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // nullable
            'keterangan' => 'required|string',
            'url'        => 'nullable|url'
        ]);

        $fasilitas = Fasilitas::findOrFail($id); // gunakan $id bukan $request->id
        $fasilitas->nama       = $request->nama;
        $fasilitas->keterangan = $request->keterangan;
        $fasilitas->url        = $request->url;

        // Hanya update foto jika ada file baru yang diupload
        if ($request->hasFile('foto')) {
            $originalName = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('assets'), $originalName);
            $fasilitas->foto = 'assets/' . $originalName;
        }
        // Kalau tidak ada file baru → foto tetap yang lama (tidak diubah)

        $fasilitas->save();

        return redirect()->route('facility')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function delete($id){
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        return redirect()->route('facility')->with('success', 'Fasilitas berhasil dihapus.');
    }

}

