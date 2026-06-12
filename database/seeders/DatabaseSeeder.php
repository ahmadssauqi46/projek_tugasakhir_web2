<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $modules = [
            ['Pengertian Dasar Komputer','pengertian-dasar-komputer','Memahami definisi komputer, fungsi utama, dan cara kerja sistem komputer.','bi-pc-display-horizontal'],
            ['Hardware Input','hardware-input','Mengenal perangkat masukan seperti keyboard, mouse, scanner, microphone, dan kamera.','bi-keyboard'],
            ['Hardware Process','hardware-process','Mempelajari CPU, RAM, motherboard, GPU, dan komponen pemrosesan data.','bi-cpu'],
            ['Hardware Output','hardware-output','Memahami perangkat keluaran seperti monitor, printer, speaker, dan proyektor.','bi-display'],
            ['Media Penyimpanan','media-penyimpanan','Mengenal HDD, SSD, flashdisk, memory card, cloud storage, dan cara memilihnya.','bi-device-ssd'],
            ['Software dan Jenisnya','software-dan-jenisnya','Memahami sistem operasi, aplikasi, utility, driver, firmware, dan software keamanan.','bi-window-desktop'],
            ['Hubungan Hardware dan Software','hubungan-hardware-dan-software','Memahami kerja sama hardware dan software dalam menjalankan instruksi komputer.','bi-diagram-3'],
        ];
        foreach ($modules as $i => $m) {
            $content = '<h4 class="text-primary fw-bold">Tujuan Pembelajaran</h4><p>Siswa mampu menjelaskan konsep '.$m[0].', mengidentifikasi contoh yang tepat, serta menghubungkan materi dengan penggunaan komputer dalam kehidupan sekolah dan pekerjaan sehari-hari.</p>'
            .'<h4 class="text-primary fw-bold mt-4">Narasi Pembuka</h4><p>'.$m[0].' merupakan bagian penting dalam pengenalan dasar komputer. Pada tahap ini siswa tidak hanya menghafal istilah, tetapi juga memahami fungsi, alur kerja, dan manfaatnya. Komputer bekerja sebagai sebuah sistem yang menerima data, memproses data, menyimpan data, lalu menghasilkan informasi yang dapat digunakan oleh manusia.</p><p>Dalam pembelajaran SMA kelas 10–11, pemahaman ini penting karena hampir semua kegiatan belajar menggunakan perangkat digital. Siswa perlu mengetahui perbedaan perangkat keras dan perangkat lunak, cara keduanya saling terhubung, serta bagaimana memilih perangkat yang sesuai dengan kebutuhan.</p>'
            .'<h4 class="text-primary fw-bold mt-4">Contoh dalam Kehidupan Sehari-hari</h4><p>Contohnya saat siswa membuat tugas presentasi. Keyboard digunakan untuk mengetik, mouse untuk memilih menu, CPU dan RAM memproses perintah, storage menyimpan file, software presentasi mengatur tampilan slide, dan monitor menampilkan hasil pekerjaan. Semua komponen tersebut saling bekerja sama.</p>'
            .'<h4 class="text-primary fw-bold mt-4">Rangkuman</h4><p>'.$m[0].' membantu siswa memahami bahwa komputer bukan hanya alat untuk mengetik atau bermain, tetapi sistem teknologi yang terdiri dari berbagai komponen. Setiap komponen memiliki fungsi berbeda, tetapi saling mendukung agar komputer dapat berjalan dengan baik.</p>';
            Module::updateOrCreate(['slug'=>$m[1]], ['title'=>$m[0], 'summary'=>$m[2], 'image'=>$m[3], 'order'=>$i+1, 'content'=>$content, 'is_active'=>true]);
        }

        $latihan = [
            ['Apa fungsi utama komputer dalam pengolahan data?','Mengubah data menjadi informasi','Menghapus semua file','Mengganti buku tulis','Mematikan listrik','A'],
            ['Perangkat yang digunakan untuk memasukkan data disebut ...','Output','Input','Storage','Jaringan','B'],
            ['CPU dalam komputer berfungsi untuk ...','Mencetak dokumen','Memproses instruksi','Menampilkan suara','Menyimpan kertas','B'],
            ['Contoh perangkat output adalah ...','Keyboard','Mouse','Monitor','Scanner','C'],
            ['Software adalah ...','Komponen fisik komputer','Instruksi/program yang mengatur kerja komputer','Kabel jaringan','Meja komputer','B'],
        ];
        foreach (Module::all() as $mod) {
            foreach ($latihan as $idx=>$q) {
                Question::updateOrCreate(['module_id'=>$mod->id,'type'=>'latihan','question'=>'['.$mod->title.'] '.$q[0]], ['option_a'=>$q[1],'option_b'=>$q[2],'option_c'=>$q[3],'option_d'=>$q[4],'correct_answer'=>$q[5],'explanation'=>'Jawaban ini sesuai dengan konsep dasar '.$mod->title.'.']);
            }
        }

        $quiz = [
            ['Komputer disebut sistem karena ...','Terdiri dari komponen yang saling bekerja sama','Hanya memiliki monitor','Tidak membutuhkan software','Selalu terhubung internet','A'],
            ['Keyboard termasuk perangkat ...','Output','Input','Process','Storage','B'],
            ['RAM digunakan untuk ...','Penyimpanan sementara saat program berjalan','Mencetak dokumen','Menampilkan gambar','Menghubungkan listrik','A'],
            ['Printer termasuk perangkat ...','Input','Output','Process','Utility','B'],
            ['SSD termasuk media ...','Penyimpanan','Input','Output','Aplikasi','A'],
            ['Windows dan Linux termasuk ...','Sistem operasi','Hardware process','Perangkat output','File gambar','A'],
            ['Driver berfungsi untuk ...','Membantu hardware dikenali sistem operasi','Menghapus keyboard','Memperbesar monitor','Mengganti casing','A'],
            ['Hubungan hardware dan software bersifat ...','Saling membutuhkan','Tidak berhubungan','Selalu terpisah','Hanya untuk game','A'],
            ['Aplikasi pengolah kata termasuk ...','Software aplikasi','Hardware input','Storage eksternal','CPU','A'],
            ['Contoh aktivitas input adalah ...','Mengetik menggunakan keyboard','Melihat monitor','Mendengar speaker','Mencetak dokumen','A'],
        ];
        $first = Module::orderBy('order')->first();
        foreach ($quiz as $q) Question::updateOrCreate(['module_id'=>$first->id,'type'=>'quiz','question'=>$q[0]], ['option_a'=>$q[1],'option_b'=>$q[2],'option_c'=>$q[3],'option_d'=>$q[4],'correct_answer'=>$q[5],'explanation'=>'Pembahasan quiz dasar komputer.']);
        foreach (Module::where('id','!=',$first->id)->get() as $mod) {
            for($i=0;$i<10;$i++) Question::updateOrCreate(['module_id'=>$mod->id,'type'=>'quiz','question'=>'['.$mod->title.'] '.$quiz[$i][0]], ['option_a'=>$quiz[$i][1],'option_b'=>$quiz[$i][2],'option_c'=>$quiz[$i][3],'option_d'=>$quiz[$i][4],'correct_answer'=>$quiz[$i][5],'explanation'=>'Pembahasan quiz '.$mod->title.'.']);
        }

        $evals = array_merge($quiz, [
            ['Tujuan utama sistem operasi adalah ...','Mengelola perangkat dan sumber daya komputer','Menjadi casing komputer','Mengganti monitor','Mencetak gambar','A'],
            ['Scanner berfungsi untuk ...','Memasukkan gambar/dokumen ke komputer','Mengeluarkan suara','Memproses CPU','Menyimpan listrik','A'],
            ['GPU lebih berkaitan dengan proses ...','Grafis dan tampilan visual','Pengisian baterai','Pencetakan kertas','Pembersihan keyboard','A'],
            ['Cloud storage berarti ...','Penyimpanan berbasis internet','Penyimpanan di kertas','Monitor tambahan','Jenis CPU','A'],
            ['Antivirus termasuk software ...','Keamanan/utility','Output','Input','Process hardware','A'],
            ['Hardware tanpa software akan ...','Sulit menjalankan instruksi sesuai kebutuhan','Semakin cepat otomatis','Tidak butuh listrik','Menjadi aplikasi','A'],
            ['Software membutuhkan hardware karena ...','Program perlu perangkat fisik untuk dijalankan','Software adalah kabel','Software adalah meja','Software tidak punya fungsi','A'],
            ['Contoh perangkat process adalah ...','CPU','Keyboard','Printer','Speaker','A'],
            ['Perangkat output audio adalah ...','Speaker','Keyboard','Mouse','Scanner','A'],
            ['Belajar hardware dan software penting agar siswa ...','Memahami cara kerja komputer dengan benar','Hanya menghafal merek','Tidak memakai komputer','Menghapus sistem operasi','A'],
        ]);
        foreach ($evals as $q) Question::updateOrCreate(['module_id'=>null,'type'=>'evaluasi','question'=>$q[0]], ['option_a'=>$q[1],'option_b'=>$q[2],'option_c'=>$q[3],'option_d'=>$q[4],'correct_answer'=>$q[5],'explanation'=>'Pembahasan evaluasi akhir.']);
    }
}
