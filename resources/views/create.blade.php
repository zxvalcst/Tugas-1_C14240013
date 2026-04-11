@extends('base.base')

@section('content')
<!-- header form tambah data-->
    <div class="bg-blue-900 text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-3">Tambah Fasilitas Baru</h1>
        <p class="text-blue-200">Isi form berikut untuk menambahkan fasilitas baru di UK Petra</p>
    </div>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<!-- form untuk mengisi data fasilitas baru -->
    <div class="max-w-3xl mx-auto px-6 py-10">
        <form action="{{ route('facility.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md">
            @csrf
            <div class="mb-6">
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Fasilitas</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto Fasilitas</label>
                <input type="file" id="foto" name="foto" value="{{ old('foto') }}" accept=".jpg,.jpeg,.png,.webp" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="mb-6">
                <label for="keterangan" class="block text-gray-700 font-semibold mb-2">Keterangan</label>
                <textarea id="keterangan" name="keterangan" value="{{ old('keterangan') }}" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <div class="mb-6">
                <label for="url" class="block text-gray-700 font-semibold mb-2">URL (opsional)</label>
                <input type="url" id="url" name="url" value="{{ old('url') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('url')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
            <button type="submit" class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-3 rounded-full text-sm font-semibold hover:bg-green-500 transition-colors duration-200">
                Simpan Fasilitas
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </button>
        </form>
    </div>
@endsection

