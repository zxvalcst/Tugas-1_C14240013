@extends('base.base')

@section('content')
<!-- page header - edit data-->
    <div class="bg-blue-900 text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-3">Edit Fasilitas "{{ $fasilitas->nama }}"</h1>
        <p class="text-blue-200">Perbarui informasi fasilitas di UK Petra</p>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<!-- form untuk mengedit data fasilitas -->
 <div class="max-w-3xl mx-auto px-6 py-10">
        <form action="{{ route('facility.update', ['id' => $fasilitas->id]) }}" 
        method="POST" enctype="multipart/form-data" 
        class="bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Fasilitas</label>
            <input type="text" id="nama" name="nama" 
                value="{{ old('nama', $fasilitas->nama) }}" 
                required 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto Fasilitas</label>
            
            {{-- Tampilkan foto saat ini --}}
            @if($fasilitas->foto)
                <img src="{{ asset($fasilitas->foto) }}" 
                    class="w-32 h-32 object-cover rounded-lg mb-3">
                <p class="text-xs text-gray-400 mb-2">Kosongkan jika tidak ingin mengganti foto</p>
            @endif

            <input type="file" id="foto" name="foto" 
                accept=".jpg,.jpeg,.png,.webp"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block text-gray-700 font-semibold mb-2">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="4" required 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('keterangan', $fasilitas->keterangan) }}</textarea>
        </div>

        <div class="mb-6">
            <label for="url" class="block text-gray-700 font-semibold mb-2">URL (opsional)</label>
            <input type="url" id="url" name="url" 
                value="{{ old('url', $fasilitas->url) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('url')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="inline-flex items-center gap-2 bg-green-600 text-white px-5 py-3 rounded-full text-sm font-semibold hover:bg-green-500 transition-colors duration-200">
            Simpan Perubahan
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </button>
    </form>
</div>
@endsection
