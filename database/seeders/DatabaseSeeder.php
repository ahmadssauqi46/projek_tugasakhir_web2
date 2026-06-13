<?php
namespace Database\Seeders;

use App\Models\Module;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            [
                'title' => 'Pengertian Dasar Komputer',
                'slug' => 'pengertian-dasar-komputer',
                'summary' => 'Memahami pengertian komputer, konsep input-process-output-storage, data, informasi, dan contoh pemanfaatannya.',
                'image' => 'bi-pc-display-horizontal',
                'video_url' => 'https://www.youtube.com/results?search_query=pengertian+dasar+komputer+input+process+output+storage',
                'sections' => [
                    'Pengertian komputer' => 'Komputer adalah perangkat elektronik yang menerima data, mengolah data berdasarkan instruksi, menyimpan hasil pengolahan, lalu menghasilkan informasi yang berguna. Komputer tidak hanya berarti PC atau laptop, tetapi juga dapat ditemukan pada ponsel, mesin kasir, ATM, server, dan perangkat pintar.',
                    'Data dan informasi' => 'Data adalah bahan mentah seperti angka, teks, gambar, suara, atau video. Informasi adalah data yang sudah diproses sehingga memiliki arti. Contohnya daftar nilai mentah adalah data, sedangkan rata-rata nilai kelas dan siswa yang perlu remedial adalah informasi.',
                    'Siklus kerja komputer' => 'Siklus utama komputer terdiri dari input, process, output, dan storage. Input memasukkan data, process mengolah data, output menampilkan hasil, dan storage menyimpan data agar dapat digunakan kembali.',
                    'Contoh penggunaan' => 'Saat membuat presentasi, keyboard memasukkan teks, prosesor dan RAM mengolah instruksi, aplikasi presentasi mengatur slide, monitor menampilkan hasil, dan storage menyimpan file.',
                    'Kesimpulan' => 'Komputer adalah sistem yang bekerja melalui gabungan perangkat keras, perangkat lunak, dan pengguna. Memahami alur dasarnya membantu siswa memakai teknologi dengan lebih tepat.'
                ],
            ],
            [
                'title' => 'Hardware Input',
                'slug' => 'hardware-input',
                'summary' => 'Mengenal perangkat masukan seperti keyboard, mouse, scanner, microphone, kamera, touchscreen, dan sensor.',
                'image' => 'bi-keyboard',
                'video_url' => 'https://www.youtube.com/results?search_query=perangkat+input+komputer+keyboard+mouse+scanner+microphone+kamera',
                'sections' => [
                    'Fungsi perangkat input' => 'Perangkat input berfungsi memasukkan data atau perintah ke komputer. Tanpa perangkat input, komputer sulit menerima instruksi dari pengguna atau lingkungan sekitar.',
                    'Contoh perangkat input' => 'Keyboard digunakan untuk mengetik teks dan perintah. Mouse dan touchpad digunakan untuk memilih objek. Scanner mengubah dokumen fisik menjadi digital. Microphone merekam suara. Kamera mengambil gambar atau video. Touchscreen menggabungkan fungsi layar dan input sentuhan.',
                    'Cara memilih perangkat input' => 'Pemilihan perangkat input disesuaikan dengan kebutuhan. Desain grafis membutuhkan pen tablet, rapat online membutuhkan webcam dan microphone yang jelas, sedangkan pekerjaan administrasi membutuhkan keyboard yang nyaman.',
                    'Masalah umum' => 'Masalah yang sering terjadi adalah kabel rusak, baterai habis, driver belum terpasang, port tidak terbaca, atau pengaturan perangkat belum sesuai.',
                    'Kesimpulan' => 'Perangkat input menjadi pintu awal data masuk ke sistem komputer. Kualitas input sangat memengaruhi hasil pemrosesan.'
                ],
            ],
            [
                'title' => 'Hardware Process',
                'slug' => 'hardware-process',
                'summary' => 'Mempelajari CPU, RAM, motherboard, GPU, pendingin, dan peran komponen pemrosesan data.',
                'image' => 'bi-cpu',
                'video_url' => 'https://www.youtube.com/results?search_query=cpu+ram+motherboard+gpu+fungsi+komponen+komputer',
                'sections' => [
                    'Pengertian hardware process' => 'Hardware process adalah perangkat yang bertugas mengolah data dan menjalankan instruksi. Komponen ini menentukan seberapa cepat komputer menjalankan aplikasi dan menyelesaikan pekerjaan.',
                    'CPU' => 'CPU sering disebut otak komputer karena menjalankan instruksi utama. CPU membaca perintah dari software, melakukan perhitungan, mengatur alur data, dan mengirim hasil ke komponen lain.',
                    'RAM' => 'RAM adalah memori sementara yang digunakan saat program berjalan. Semakin besar dan cepat RAM, semakin banyak aplikasi yang dapat dibuka dengan lancar.',
                    'Motherboard dan GPU' => 'Motherboard menghubungkan CPU, RAM, storage, GPU, dan perangkat lain. GPU membantu memproses grafis, video, animasi, desain, dan game.',
                    'Kesimpulan' => 'Komponen process bekerja seperti pusat pengolahan. Jika salah satu komponen lemah, performa komputer bisa ikut menurun.'
                ],
            ],
            [
                'title' => 'Hardware Output',
                'slug' => 'hardware-output',
                'summary' => 'Memahami perangkat keluaran seperti monitor, printer, speaker, proyektor, dan headset.',
                'image' => 'bi-display',
                'video_url' => 'https://www.youtube.com/results?search_query=perangkat+output+komputer+monitor+printer+speaker+proyektor',
                'sections' => [
                    'Fungsi perangkat output' => 'Perangkat output menampilkan hasil pengolahan komputer agar dapat dilihat, didengar, atau digunakan manusia.',
                    'Output visual' => 'Monitor dan proyektor menampilkan teks, gambar, video, dan antarmuka aplikasi. Kualitas layar dipengaruhi resolusi, ukuran, refresh rate, dan akurasi warna.',
                    'Output cetak dan audio' => 'Printer menghasilkan dokumen fisik. Speaker dan headset menghasilkan suara untuk musik, video, panggilan, atau notifikasi.',
                    'Hubungan input dan output' => 'Saat mengetik, keyboard memberi input dan monitor memberi output berupa teks yang muncul. Saat mencetak, aplikasi mengirim perintah dan printer menghasilkan dokumen.',
                    'Kesimpulan' => 'Output membantu pengguna memahami hasil kerja komputer. Perangkat output harus dipilih sesuai kebutuhan belajar dan pekerjaan.'
                ],
            ],
            [
                'title' => 'Media Penyimpanan',
                'slug' => 'media-penyimpanan',
                'summary' => 'Mengenal HDD, SSD, flashdisk, kartu memori, cloud storage, backup, dan keamanan data.',
                'image' => 'bi-device-ssd',
                'video_url' => 'https://www.youtube.com/results?search_query=media+penyimpanan+komputer+hdd+ssd+flashdisk+cloud+storage',
                'sections' => [
                    'Fungsi storage' => 'Storage menyimpan sistem operasi, aplikasi, dokumen, foto, video, dan data lain agar tetap tersedia setelah komputer dimatikan.',
                    'HDD dan SSD' => 'HDD memakai piringan magnetik dan biasanya lebih murah untuk kapasitas besar. SSD memakai chip memori sehingga lebih cepat, tahan guncangan, dan membuat komputer lebih responsif.',
                    'Penyimpanan eksternal dan cloud' => 'Flashdisk, hard disk eksternal, dan kartu memori mudah dipindahkan. Cloud storage menyimpan data melalui internet sehingga bisa diakses dari banyak perangkat.',
                    'Backup dan keamanan' => 'Data penting sebaiknya memiliki cadangan. Gunakan password kuat, hindari flashdisk tidak dikenal, dan jangan menyimpan data penting hanya di satu tempat.',
                    'Kesimpulan' => 'Storage bukan hanya soal kapasitas, tetapi juga kecepatan, keamanan, dan kebiasaan backup.'
                ],
            ],
            [
                'title' => 'Software dan Jenisnya',
                'slug' => 'software-dan-jenisnya',
                'summary' => 'Memahami sistem operasi, aplikasi, utility, driver, firmware, lisensi, update, dan keamanan software.',
                'image' => 'bi-window-desktop',
                'video_url' => 'https://www.youtube.com/results?search_query=software+komputer+sistem+operasi+aplikasi+driver+utility',
                'sections' => [
                    'Pengertian software' => 'Software adalah kumpulan instruksi atau program yang mengatur cara komputer bekerja. Software tidak dapat disentuh secara fisik, tetapi dapat dijalankan dan digunakan.',
                    'Sistem operasi' => 'Sistem operasi seperti Windows, Linux, macOS, Android, dan iOS mengatur hardware, file, aplikasi, keamanan, serta interaksi pengguna.',
                    'Aplikasi dan utility' => 'Aplikasi membantu pengguna menyelesaikan tugas seperti mengetik, menghitung, desain, dan komunikasi. Utility membantu perawatan seperti antivirus, backup, kompresi file, dan pembersihan sistem.',
                    'Driver dan firmware' => 'Driver membantu sistem operasi mengenali hardware. Firmware adalah software kecil yang tertanam pada perangkat seperti router, printer, atau BIOS komputer.',
                    'Kesimpulan' => 'Software membuat hardware memiliki fungsi. Tanpa software, komputer hanya perangkat elektronik yang tidak dapat menjalankan tugas sesuai kebutuhan pengguna.'
                ],
            ],
            [
                'title' => 'Hubungan Hardware dan Software',
                'slug' => 'hubungan-hardware-dan-software',
                'summary' => 'Memahami hubungan hardware, software, brainware, sistem operasi, driver, dan alur kerja komputer.',
                'image' => 'bi-diagram-3',
                'video_url' => 'https://www.youtube.com/results?search_query=hubungan+hardware+software+brainware+komputer',
                'sections' => [
                    'Komputer sebagai sistem' => 'Komputer bekerja karena ada kerja sama antara hardware, software, dan brainware. Brainware adalah manusia yang menggunakan dan mengatur komputer.',
                    'Peran sistem operasi' => 'Sistem operasi menjadi penghubung antara aplikasi dan hardware. Saat pengguna membuka aplikasi, sistem operasi mengatur memori, prosesor, storage, dan perangkat input-output.',
                    'Contoh alur kerja' => 'Ketika siswa mencetak tugas, aplikasi pengolah kata mengirim perintah ke sistem operasi, driver menerjemahkan perintah untuk printer, lalu printer menghasilkan output berupa kertas.',
                    'Gangguan hubungan' => 'Jika driver tidak cocok, printer bisa tidak terbaca. Jika RAM kurang, aplikasi lambat. Jika software rusak, hardware yang bagus pun tidak bekerja maksimal.',
                    'Kesimpulan' => 'Hardware dan software saling membutuhkan. Memahami hubungan keduanya membantu siswa memecahkan masalah komputer secara logis.'
                ],
            ],
        ];

        foreach ($modules as $index => $module) {
            Module::updateOrCreate(
                ['slug' => $module['slug']],
                [
                    'title' => $module['title'],
                    'summary' => $module['summary'],
                    'image' => $module['image'],
                    'video_url' => $module['video_url'],
                    'order' => $index + 1,
                    'content' => $this->content($module['sections']),
                    'is_active' => true,
                ]
            );
        }

        $latihan = [
            ['Apa fungsi utama komputer dalam pengolahan data?', 'Mengubah data menjadi informasi', 'Menghapus semua file', 'Mengganti buku tulis', 'Mematikan listrik', 'A'],
            ['Tahap awal dalam alur kerja komputer adalah ...', 'Output', 'Input', 'Storage', 'Backup', 'B'],
            ['CPU dalam komputer berfungsi untuk ...', 'Mencetak dokumen', 'Memproses instruksi', 'Menampilkan suara', 'Menyimpan kertas', 'B'],
            ['Contoh perangkat output adalah ...', 'Keyboard', 'Mouse', 'Monitor', 'Scanner', 'C'],
            ['Software adalah ...', 'Komponen fisik komputer', 'Program yang mengatur kerja komputer', 'Kabel jaringan', 'Meja komputer', 'B'],
        ];

        foreach (Module::all() as $module) {
            foreach ($latihan as $question) {
                Question::updateOrCreate(
                    ['module_id' => $module->id, 'type' => 'latihan', 'question' => $question[0]],
                    ['option_a' => $question[1], 'option_b' => $question[2], 'option_c' => $question[3], 'option_d' => $question[4], 'correct_answer' => $question[5], 'explanation' => 'Pembahasan latihan untuk materi ' . $module->title . '.']
                );
            }
        }

        $quiz = [
            ['Komputer disebut sistem karena ...', 'Terdiri dari komponen yang saling bekerja sama', 'Hanya memiliki monitor', 'Tidak membutuhkan software', 'Selalu terhubung internet', 'A'],
            ['Keyboard termasuk perangkat ...', 'Output', 'Input', 'Process', 'Storage', 'B'],
            ['RAM digunakan untuk ...', 'Penyimpanan sementara saat program berjalan', 'Mencetak dokumen', 'Menampilkan gambar', 'Menghubungkan listrik', 'A'],
            ['Printer termasuk perangkat ...', 'Input', 'Output', 'Process', 'Utility', 'B'],
            ['SSD termasuk media ...', 'Penyimpanan', 'Input', 'Output', 'Aplikasi', 'A'],
            ['Windows dan Linux termasuk ...', 'Sistem operasi', 'Hardware process', 'Perangkat output', 'File gambar', 'A'],
            ['Driver berfungsi untuk ...', 'Membantu hardware dikenali sistem operasi', 'Menghapus keyboard', 'Memperbesar monitor', 'Mengganti casing', 'A'],
            ['Hubungan hardware dan software bersifat ...', 'Saling membutuhkan', 'Tidak berhubungan', 'Selalu terpisah', 'Hanya untuk game', 'A'],
            ['Aplikasi pengolah kata termasuk ...', 'Software aplikasi', 'Hardware input', 'Storage eksternal', 'CPU', 'A'],
            ['Contoh aktivitas input adalah ...', 'Mengetik menggunakan keyboard', 'Melihat monitor', 'Mendengar speaker', 'Mencetak dokumen', 'A'],
        ];

        foreach (Module::all() as $module) {
            foreach ($quiz as $question) {
                Question::updateOrCreate(
                    ['module_id' => $module->id, 'type' => 'quiz', 'question' => $question[0]],
                    ['option_a' => $question[1], 'option_b' => $question[2], 'option_c' => $question[3], 'option_d' => $question[4], 'correct_answer' => $question[5], 'explanation' => 'Pembahasan quiz untuk materi ' . $module->title . '.']
                );
            }
        }

        $evaluasi = array_merge($quiz, [
            ['Tujuan utama sistem operasi adalah ...', 'Mengelola perangkat dan sumber daya komputer', 'Menjadi casing komputer', 'Mengganti monitor', 'Mencetak gambar', 'A'],
            ['Scanner berfungsi untuk ...', 'Memasukkan gambar atau dokumen ke komputer', 'Mengeluarkan suara', 'Memproses CPU', 'Menyimpan listrik', 'A'],
            ['GPU lebih berkaitan dengan proses ...', 'Grafis dan tampilan visual', 'Pengisian baterai', 'Pencetakan kertas', 'Pembersihan keyboard', 'A'],
            ['Cloud storage berarti ...', 'Penyimpanan berbasis internet', 'Penyimpanan di kertas', 'Monitor tambahan', 'Jenis CPU', 'A'],
            ['Antivirus termasuk software ...', 'Keamanan atau utility', 'Output', 'Input', 'Process hardware', 'A'],
            ['Hardware tanpa software akan ...', 'Sulit menjalankan instruksi sesuai kebutuhan', 'Semakin cepat otomatis', 'Tidak butuh listrik', 'Menjadi aplikasi', 'A'],
            ['Software membutuhkan hardware karena ...', 'Program perlu perangkat fisik untuk dijalankan', 'Software adalah kabel', 'Software adalah meja', 'Software tidak punya fungsi', 'A'],
            ['Contoh perangkat process adalah ...', 'CPU', 'Keyboard', 'Printer', 'Speaker', 'A'],
            ['Perangkat output audio adalah ...', 'Speaker', 'Keyboard', 'Mouse', 'Scanner', 'A'],
            ['Belajar hardware dan software penting agar siswa ...', 'Memahami cara kerja komputer dengan benar', 'Hanya menghafal merek', 'Tidak memakai komputer', 'Menghapus sistem operasi', 'A'],
        ]);

        foreach ($evaluasi as $question) {
            Question::updateOrCreate(
                ['module_id' => null, 'type' => 'evaluasi', 'question' => $question[0]],
                ['option_a' => $question[1], 'option_b' => $question[2], 'option_c' => $question[3], 'option_d' => $question[4], 'correct_answer' => $question[5], 'explanation' => 'Pembahasan evaluasi akhir.']
            );
        }
    }

    private function content(array $sections): string
    {
        $html = '<div class="material-rich">';
        foreach ($sections as $heading => $body) {
            $html .= '<h4 class="text-primary fw-bold mt-4">' . e($heading) . '</h4>';
            $html .= '<p>' . e($body) . '</p>';
        }
        $html .= '</div>';

        return $html;
    }
}