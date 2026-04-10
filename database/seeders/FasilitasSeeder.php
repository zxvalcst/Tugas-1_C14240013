<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fasilitas;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'nama' => 'Perpustakaan',
                'foto' => 'assets\img_perpus.png',
                'keterangan' => 'Gali pengetahuan di salah satu perpustakaan terbesar Jawa Timur. Sebagai caring learning zone Perpustakaan UK Petra tak hanya berperan sebagai pusat informasi saja, tetapi ikut membentuk masyarakat belajar serta menjadi mitra profesional bagi masyarakat akademis dan praktisi tanpa batasan ruang dan waktu.',
                'url' => 'https://library.petra.ac.id/'
            ],
            [
                'nama' => 'Layanan Kesehatan',
                'foto' => 'assets\img_kesehatan.png',
                'keterangan' => 'UK Petra menyediakan sejumlah layanan kesehatan umum dan gigi yang dapat diakses oleh Petranesian secara gratis maupun berbayar di Unit Klinik Pratama. Ingat, kamu diwajibkan untuk membawa Kartu Tanda Mahasiswa (KTM) yang masih berlaku; jika KTM tidak dibawa, maka kamu akan dianggap sebagai pasien biasa dan dikenakan biaya.',
                'url' => 'https://poliklinik.petra.ac.id/'
            ],
            [
                'nama' => 'PTIK',
                'foto' => 'assets\img_ptik.png',
                'keterangan' => 'Microsoft Open Value Subscription-Education Solutions Agreement (OVS-ES) & Microsoft Developer Network Academic Alliance (MSDN-AA). Untuk mendukung kegiatan belajar, mengajar, dan penelitian. Petranesian aktif, staff, serta dosen tetap UK Petra dapat mengunduh berbagai perangkat lunak Microsoft melalui program OVS-ES dan MSDN-AA dengan mengikuti peraturan dan prosedur yang berlaku.' .
                                "\n\nDaftar program yang tersedia dalam OVS-ES meliputi:" .
                                "\nMS Office 365 (termasuk MS Teams) — untuk Petranesian dan staff" .
                                "\nMS Windows 10 Professional — untuk staff" .
                                "\nMS Visio Professional 2019 — untuk staff",
                'url' => 'https://ptik.petra.ac.id/'
            ],
            [
                'nama' => 'Petra Career Center',
                'foto' => 'assets\img_pcc.png',
                'keterangan' => 'Petra Career Center ada untuk mempersiapkan Petranesian sebelum terjun ke dunia kerja melalui program-program onsite dan daring yang asik, seperti webinar, workshop, seminar, dan kamp. Pengenalan potensi karier untuk Petranesian juga diberikan melalui psikotes dan konsultasi karier. Tidak hanya itu, lulusan juga dihubungkan dengan perusahaan-perusahaan pencari tenaga kerja. Layanan-layanan Petra Career Center lainnya dapat diakses lewat Instagram, Youtube, website dan Facebook.' .
                                "\n\nHubungi kami" .
                                "\nEmail: careercenter@petra.ac.id" .
                                "\nInstagram dan LINE@: @petracareercenter" .
                                "\nInstagram khusus info lowongan: @petracareercenter. job" .
                                "\n\nWebsite: alumni.petra.ac.id" .
                                "\nWhatsApp (chat saja): 081232273747",
                'url' => 'https://alumni.petra.ac.id/blog/'
            ],
            [
                'nama' => 'BAKA',
                'foto' => 'assets\img_baka.png',
                'keterangan' => 'Biro Administrasi Kemahasiswaan dan Alumni (BAKA) memiliki tugas dalam mengurus administrasi dan pengembangan kemahasiswaan dan kesejahteraan mahasiswa dan pendataan Alumni.' .
                                "\n\nPetranesian yang ingin mengecek SKKK, mencari informasi mengenai bantuan keuangan, maupun mengurus administrasi Lembaga Kemahasiswaan (termasuk mengecek status proposal, pengajuan SKKK internal kampus, dan lain-lain) dapat mengakses sportfolio.petra.ac.id",
                'url' => 'http://sportfolio.petra.ac.id/bakabootsrap/baka/index.php'
            ],
            [
                'nama' => 'International Office (IO)',
                'foto' => 'assets\img_io.png',
                'keterangan' => 'KUI atau International Office bertugas untuk mendukung dan meningkatkan pelayanan dan mutu pendidikan Petra melalui kerjasama dalam dan luar negeri. Di sini, bebas berkunjung dan berkonsultasi mengenai rencana mengikuti program internasional seperti Student Exchange (SE), Joint/Double Degree (JD/DD), dan Summer Program. KUI terdiri dari 2 divisi, yaitu Divisi Mobilitas Mahasiswa dan Divisi Kemitraan.' .
                                "\n\nUntuk mengetahui daftar program yang dapat kamu ikuti, hubungi KUI di:" .
                                "\nWebsite — io.petra.ac.id" .
                                "\nP: (031) 298 3185-88" .
                                "\nF: (031) 849 2583" .
                                "\nE: io@petra.ac.id" .
                                "\nSenin-Jumat, 7.30-15.30",
                'url' => 'https://io.petra.ac.id/'
            ],
            [
                'nama' => 'Kantin dan Toko',
                'foto' => 'assets\img_kantin.png',
                'keterangan' => 'Dari makanan hingga perlengkapan perkuliahan, dapatkan kebutuhan-kebutuhanmu di sini.',
                'url' => null
            ],
            [
                'nama' => 'Pusat Kerohanian (PUSROH)',
                'foto' => 'assets\img_pusroh.png',
                'keterangan' => 'Pusat Kerohanian bertugas untuk memberikan layanan di bidang kerohanian kepada mahasiswa, dosen, dan tenaga kependidikan untuk mengembangkan wawasan dunia Kristen (Christian worldview) serta mendorong penerapan nilai-nilai kristiani (Christian values) sehingga dapat menolong pertumbuhan rohani yang diwujudkan dalam perilaku kristiani (Christian behavior) serta membangun atmosfer kristiani (Christian atmosphere) dalam kehidupan kampus. Pusroh terdiri dari 2 bagian, yaitu Pelayanan Kerohanian Mahasiswa dan Pelayanan Kerohanian Pegawai.' .
                                "\n\nUntuk mengetahui daftar program yang dapat kamu ikuti, hubungi Pusroh di:" .
                                "\nP: (031) 298 3197" .
                                "\nE: pusroh@petra.ac.id" .
                                "\nSenin-Jumat, 7.30-15.30",
                'url' => null
            ]
        ];

        foreach($datas as $data){
            Fasilitas::create($data);
        }
    }
}
