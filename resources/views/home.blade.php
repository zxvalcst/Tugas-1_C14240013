@extends('base.base')

@section('content')
<!-- hero image-->
    <div class="w-full h-[600px] overflow-hidden relative">
        <img 
            src="{{ asset('assets/home.jpg') }}" 
            alt="Universitas Kristen Petra"
            class="w-full h-full object-cover object-center"
        >
    </div>

    <section class="max-w-4xl mx-auto px-6 py-16 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">
            Selamat Datang di UK Petra
        </h2>

        <p class="text-gray-600 text-lg leading-relaxed">
            Universitas Kristen Petra adalah tempat di mana pemimpin-pemimpin sosial global 
            dibentuk dan ditempa berlandaskan nilai-nilai kristiani. Kami mengundangmu untuk 
            menimba ilmu di universitas yang peduli dan global, untuk belajar di bawah staf 
            pengajar yang teruji dan bergabung dengan para mahasiswa dengan visi yang 
            sama—membawa dampak bagi dunia.
        </p>
    </section>
@endsection