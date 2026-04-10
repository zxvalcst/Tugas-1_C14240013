@extends('base.base')

@section('content')

<!-- page header -->
    <div class="bg-blue-900 text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-3">Fasilitas</h1>
        <p class="text-blue-200">Temukan berbagai fasilitas unggulan di UK Petra</p>
    </div>

<!-- daftar fasilitas -->
    <section class="max-w-6xl mx-auto px-6 py-16 space-y-16">
        @foreach($fasilitas as $item)
<!-- looping selang seling bds odd even-->
            <div class="flex flex-col {{ $loop->odd ? 'md:flex-row-reverse' : 'md:flex-row' }} 
                        gap-8 items-center bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-100">
                <div class="w-full md:w-2/5 h-64 md:h-auto flex-shrink-0">
                    <img 
                        src="{{ asset($item->foto) }}" 
                        alt="{{ $item->nama }}"
                        class="w-full h-full object-cover"
                        style="min-height: 280px;"
                    >
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
                    @if($item->url)
                        <div class="mt-6">
                            <a href="{{ $item->url }}" 
                               target="_blank"
                               class="inline-flex items-center gap-2 bg-blue-800 text-white 
                                      px-5 py-2.5 rounded-full text-sm font-semibold 
                                      hover:bg-blue-700 transition-colors duration-200">
                                Kunjungi Website
                                {{-- Ikon panah kecil --}}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        @endforeach
    </section>

@endsection