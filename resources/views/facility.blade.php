@extends('base.base')

@section('content')

{{-- ============ FLASH MESSAGE ============ --}}
    {{-- 
        session('success') mengecek apakah ada pesan sukses dari controller
        Pesan ini hanya muncul SEKALI setelah redirect, lalu otomatis hilang
    --}}
    @if(session('success'))
        <div id="alert-success" 
             class="fixed top-6 right-6 z-50 flex items-center gap-3 
                    bg-green-100 border border-green-400 text-green-800 
                    px-5 py-4 rounded-xl shadow-lg max-w-sm">
            
            {{-- Ikon centang --}}
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>

            {{-- Pesan --}}
            <span class="text-sm font-medium">{{ session('success') }}</span>

            {{-- Tombol tutup --}}
            <button onclick="document.getElementById('alert-success').style.display='none'"
                    class="ml-auto text-green-600 hover:text-green-800 font-bold text-lg leading-none">
                &times;
            </button>
        </div>
    @endif

    @if(session('error'))
    <div class="fixed top-6 right-6 z-50 flex items-center gap-3 
                bg-red-100 border border-red-400 text-red-800 
                px-5 py-4 rounded-xl shadow-lg max-w-sm">
        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span class="text-sm font-medium">{{ session('error') }}</span>
    </div>
    @endif

<!-- page header -->
    <div class="bg-blue-900 text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-3">Fasilitas</h1>
        <p class="text-blue-200">Temukan berbagai fasilitas unggulan di UK Petra</p>
        <!-- search bar (type) -->
        <form action="{{ route('facility') }}" method="GET" class="mt-6 max-w-md mx-auto">
            <div class="relative">
                <input type="text" id="searchInput" name="search" placeholder="Cari fasilitas..." value="{{ request('search') }}" 
                    class="w-full pl-4 pr-10 py-2 rounded-full border border-gray-300 text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </form>

    </div>

<!-- tombol tambah fasilitas baru-->
    <div class="max-w-6xl mx-auto px-6 pt-8 text-right">
        <a href=" {{ route('facility.create') }}" 
           class="inline-flex items-center gap-2 bg-green-600 text-white 
                  px-5 py-3 rounded-full text-sm font-semibold 
                  hover:bg-green-500 transition-colors duration-200">
            Tambah Fasilitas Baru
            {{-- Ikon plus kecil --}}
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </a>
    </div>

<!-- daftar fasilitas -->
    <section class="max-w-6xl mx-auto px-6 py-10 space-y-16">        
        @foreach($fasilitas as $item)
<!-- looping selang seling bds odd even-->
            <div class="facility-card flex flex-col {{ $loop->odd ? 'md:flex-row-reverse' : 'md:flex-row' }} 
                gap-8 items-center bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100" data-nama="{{ strtolower($item->nama) }}">
                <div class="w-full md:w-2/5 h-64 md:h-auto flex-shrink-0">
                    <img src="{{ asset($item->foto) }}" alt="{{ $item->nama }}" class="w-full h-full object-cover" style="min-height: 280px;">
                </div>
                <!-- isi text -->
                <div class="flex-1 p-8">

                <!-- nama fasilitas -->
                    <h2 class="text-2xl font-bold text-blue-900 mt-2 mb-4">
                        {{ $item->nama }}
                    </h2>

                    {{-- 
                        Keterangan menggunakan nl2br() agar \n jadi <br>
                        {!! !!} dipakai (bukan {{ }}) karena kita perlu render tag HTML <br>
                        e() tetap dipakai untuk escape karakter berbahaya
                    --}}
                    <p class="text-gray-600 leading-relaxed text-sm">
                        {!! nl2br(e($item->keterangan)) !!}
                    </p>

                    <!-- Tombol Visit (hanya tampil jika ada URL) -->
                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        
                        {{-- Kunjungi Website --}}
                        @if($item->url)
                            <a href="{{ $item->url }}" target="_blank"
                            class="inline-flex items-center gap-2 bg-blue-800 text-white 
                                    px-5 py-2.5 rounded-full text-sm font-semibold 
                                    hover:bg-blue-700 transition-colors duration-200">
                                Kunjungi Website
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        @endif

                        {{-- Edit --}}
                        <a href="{{ route('facility.edit', ['id' => $item->id]) }}"
                        class="inline-flex items-center gap-2 bg-yellow-500 text-white 
                                px-5 py-2.5 rounded-full text-sm font-semibold 
                                hover:bg-yellow-400 transition-colors duration-200">
                            Edit Data
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('facility.delete', ['id' => $item->id]) }}" 
                            method="POST" 
                            onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-2 bg-red-600 text-white 
                                        px-5 py-2.5 rounded-full text-sm font-semibold 
                                        hover:bg-red-500 transition-colors duration-200">
                                Hapus Data
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>

                    </div>

                </div>
            </div>

        @endforeach
        <div class="flex justify-center mt-8">
            {{ $fasilitas->links() }}
        </div>

        {{-- Pesan jika pencarian tidak menemukan hasil --}}
        <div id="empty-message" style="display:none;" class="text-center py-16">
            <p class="text-gray-400 text-lg">Fasilitas tidak ditemukan.</p>
            <p class="text-gray-300 text-sm mt-1">Coba kata kunci yang berbeda.</p>
        </div>

    </section>
    <script>
    // Ambil elemen input search
    const searchInput = document.getElementById('searchInput');
    
    // Ambil semua card fasilitas
    const cards = document.querySelectorAll('.facility-card');

    // Event 'input' terpanggil SETIAP kali user mengetik
    searchInput.addEventListener('input', function() {
        
        // Ambil nilai yang diketik, ubah ke huruf kecil
        const keyword = this.value.toLowerCase().trim();
        
        let visibleCount = 0;

        // Loop setiap card
        cards.forEach(function(card) {
            
            // Ambil nama fasilitas dari atribut data-nama
            const nama = card.getAttribute('data-nama');
            
            // Cek apakah nama mengandung keyword
            // includes() → true jika string mengandung substring
            if (nama.includes(keyword)) {
                card.style.display = '';   // tampilkan card
                visibleCount++;
            } else {
                card.style.display = 'none'; // sembunyikan card
            }
        });

        // Tampilkan pesan jika tidak ada hasil
        const emptyMsg = document.getElementById('empty-message');
        if (visibleCount === 0) {
            emptyMsg.style.display = 'block';
        } else {
            emptyMsg.style.display = 'none';
        }
    });
</script>

@endsection