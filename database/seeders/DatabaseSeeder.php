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
            ['title'=>'Hardware Komputer','slug'=>'hardware','summary'=>'Mempelajari CPU, memori, storage, motherboard, dan perangkat input-output.','image'=>'💻','order'=>1,'content'=>'<h3>Pengantar Hardware Komputer</h3><p>Hardware adalah perangkat fisik yang dapat dilihat dan disentuh. Pada komputer, hardware bekerja sebagai alat input, proses, output, dan penyimpanan data.</p><h4>1. CPU dan Memori</h4><p>CPU berfungsi sebagai pusat pemrosesan. RAM menyimpan data sementara agar proses berjalan cepat, sedangkan storage menyimpan data secara permanen.</p><h4>2. Motherboard dan I/O</h4><p>Motherboard menghubungkan seluruh komponen. Perangkat input seperti keyboard dan mouse memasukkan data, sedangkan monitor dan printer menampilkan hasil.</p><h4>TPACK</h4><p>Materi memakai pendekatan teknologi melalui web interaktif, pedagogi melalui latihan bertahap, dan konten berupa konsep perangkat keras.</p>'],
            ['title'=>'Software Komputer','slug'=>'software','summary'=>'Memahami sistem operasi, aplikasi, utility, driver, dan keamanan perangkat lunak.','image'=>'⚙️','order'=>2,'content'=>'<h3>Pengantar Software Komputer</h3><p>Software adalah kumpulan instruksi yang mengatur kerja hardware. Tanpa software, komputer tidak dapat menjalankan tugas sesuai kebutuhan pengguna.</p><h4>1. Sistem Operasi</h4><p>Sistem operasi mengelola memori, file, perangkat, dan antarmuka pengguna. Contohnya Windows, Linux, dan Android.</p><h4>2. Aplikasi dan Utility</h4><p>Aplikasi membantu pekerjaan pengguna, sedangkan utility merawat sistem seperti antivirus, backup, dan disk cleanup.</p><h4>TPACK</h4><p>Pembelajaran software disajikan dengan contoh digital, pertanyaan cepat, dan evaluasi untuk mengukur pemahaman.</p>'],
            ['title'=>'Jaringan Komputer','slug'=>'jaringan','summary'=>'Mempelajari LAN, WAN, topologi, OSI, IP address, dan komunikasi data.','image'=>'🌐','order'=>3,'content'=>'<h3>Pengantar Jaringan Komputer</h3><p>Jaringan komputer menghubungkan beberapa perangkat agar dapat bertukar data dan berbagi sumber daya.</p><h4>1. Jenis Jaringan</h4><p>LAN digunakan dalam area kecil seperti sekolah, sedangkan WAN menjangkau area luas seperti antarkota atau negara.</p><h4>2. Topologi dan IP</h4><p>Topologi adalah pola hubungan antarperangkat. IP address berfungsi sebagai alamat perangkat dalam jaringan.</p><h4>TPACK</h4><p>Konsep jaringan dipelajari melalui media web, latihan interaktif, dan konteks nyata komunikasi data.</p>'],
        ];
        foreach ($modules as $m) Module::updateOrCreate(['slug'=>$m['slug']], $m);
        $qs = [
            ['hardware','latihan','Perangkat yang berfungsi sebagai otak komputer adalah ...','Monitor','CPU','Keyboard','Speaker','B','CPU memproses instruksi dan data.'],
            ['hardware','latihan','RAM berfungsi untuk ...','Menyimpan data sementara','Mencetak dokumen','Menampilkan gambar','Menghubungkan internet','A','RAM adalah memori sementara.'],
            ['software','latihan','Contoh sistem operasi adalah ...','Microsoft Word','Windows','Printer','Mouse','B','Windows termasuk sistem operasi.'],
            ['software','latihan','Antivirus termasuk jenis software ...','Utility','Game','Hardware','Browser','A','Antivirus membantu merawat keamanan sistem.'],
            ['jaringan','latihan','Jaringan area kecil seperti lab komputer disebut ...','WAN','MAN','LAN','Internet','C','LAN digunakan pada area terbatas.'],
            ['jaringan','latihan','Alamat perangkat dalam jaringan disebut ...','IP Address','Folder','Monitor','RAM','A','IP address adalah alamat perangkat.'],
        ];
        foreach (['hardware','software','jaringan'] as $slug) {
            $mod = Module::where('slug',$slug)->first();
            foreach (['quiz','evaluasi'] as $type) {
                Question::updateOrCreate(['module_id'=>$mod->id,'type'=>$type,'question'=>'Fungsi utama materi '.$mod->title.' adalah ...'], ['option_a'=>'Mendukung pemahaman komputer','option_b'=>'Menghapus semua data','option_c'=>'Mengganti listrik','option_d'=>'Membuat gedung','correct_answer'=>'A','explanation'=>'Jawaban paling tepat adalah mendukung pemahaman komputer.']);
                Question::updateOrCreate(['module_id'=>$mod->id,'type'=>$type,'question'=>'Agar belajar efektif, media ini menyediakan ...'], ['option_a'=>'Latihan, quiz, dan evaluasi','option_b'=>'Hiburan saja','option_c'=>'Iklan produk','option_d'=>'Database tanpa soal','correct_answer'=>'A','explanation'=>'Media pembelajaran umum memakai latihan, quiz, dan evaluasi.']);
            }
        }
        foreach ($qs as $q) {
            $mod = Module::where('slug',$q[0])->first();
            Question::updateOrCreate(['module_id'=>$mod->id,'type'=>$q[1],'question'=>$q[2]], ['option_a'=>$q[3],'option_b'=>$q[4],'option_c'=>$q[5],'option_d'=>$q[6],'correct_answer'=>$q[7],'explanation'=>$q[8]]);
        }
    }
}
