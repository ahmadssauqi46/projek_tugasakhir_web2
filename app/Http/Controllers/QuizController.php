<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function hardware()
    {
        $soal = [
            [
                'pertanyaan' => 'Apa komponen utama komputer yang berfungsi sebagai "otak" untuk memproses instruksi data?',
                'pilihan' => ['Harddisk', 'RAM', 'CPU (Central Processing Unit)', 'Monitor'],
                'jawaban_benar' => 'CPU (Central Processing Unit)'
            ],
            [
                'pertanyaan' => 'Perangkat keras mana yang berfungsi sebagai tempat penyimpanan data sementara saat aplikasi berjalan?',
                'pilihan' => ['SSD', 'RAM', 'Processor', 'Flashdisk'],
                'jawaban_benar' => 'RAM'
            ],
            [
                'pertanyaan' => 'Manakah di bawah ini yang tergolong sebagai perangkat input komputer?',
                'pilihan' => ['Monitor', 'Printer', 'Keyboard', 'Speaker'],
                'jawaban_benar' => 'Keyboard'
            ],
            [
                'pertanyaan' => 'Media penyimpanan permanen modern yang memiliki kecepatan transfer data sangat tinggi adalah...',
                'pilihan' => ['SSD (Solid State Drive)', 'HDD (Hard Disk Drive)', 'RAM', 'Floppy Disk'],
                'jawaban_benar' => 'SSD (Solid State Drive)'
            ],
            [
                'pertanyaan' => 'Perangkat keras yang berfungsi memproyeksikan atau menampilkan grafis visual pada komputer adalah...',
                'pilihan' => ['Proyektor', 'Monitor', 'VGA Card', 'Benar Semua'],
                'jawaban_benar' => 'Benar Semua'
            ]
        ];

        return view('quiz.isi', [
            'topik' => 'Hardware Komputer',
            'daftar_soal' => $soal
        ]);
    }

    public function software()
    {
        $soal = [
            [
                'pertanyaan' => 'Manakah di bawah ini yang merupakan contoh dari perangkat lunak Sistem Operasi?',
                'pilihan' => ['Microsoft Word', 'Windows 11', 'Google Chrome', 'Photoshop'],
                'jawaban_benar' => 'Windows 11'
            ],
            [
                'pertanyaan' => 'Software yang secara spesifik digunakan untuk menjelajahi internet dinamakan...',
                'pilihan' => ['Web Browser', 'Sistem Operasi', 'Antivirus', 'Database Management'],
                'jawaban_benar' => 'Web Browser'
            ],
            [
                'pertanyaan' => 'Program utilitas yang bertugas melindungi komputer dari serangan malware dan virus adalah...',
                'pilihan' => ['WinRAR', 'Disk Defragmenter', 'Antivirus', 'Command Prompt'],
                'jawaban_benar' => 'Antivirus'
            ],
            [
                'pertanyaan' => 'Format file ekstensi instalasi aplikasi yang umum digunakan pada sistem operasi Windows adalah...',
                'pilihan' => ['.apk', '.exe', '.dmg', '.pdf'],
                'jawaban_benar' => '.exe'
            ],
            [
                'pertanyaan' => 'Perangkat lunak yang bersifat open-source (kode sumber terbuka) dan gratis untuk dikembangkan adalah...',
                'pilihan' => ['Linux', 'Windows', 'macOS', 'Microsoft Office'],
                'jawaban_benar' => 'Linux'
            ]
        ];

        return view('quiz.isi', [
            'topik' => 'Software Komputer',
            'daftar_soal' => $soal
        ]);
    }

    public function jaringan()
    {
        $soal = [
            [
                'pertanyaan' => 'Jenis jaringan komputer yang mencakup area lokal berskala kecil seperti rumah atau sekolah disebut...',
                'pilihan' => ['LAN (Local Area Network)', 'WAN (Wide Area Network)', 'MAN (Metropolitan Area Network)', 'Internet'],
                'jawaban_benar' => 'LAN (Local Area Network)'
            ],
            [
                'pertanyaan' => 'Jaringan komputer global berskala raksasa yang menghubungkan perangkat di seluruh penjuru dunia bernama...',
                'pilihan' => ['Intranet', 'LAN', 'MAN', 'Internet'],
                'jawaban_benar' => 'Internet'
            ],
            [
                'pertanyaan' => 'Perangkat jaringan yang bertugas pintar untuk mengatur rute/jalur distribusi data ke internet adalah...',
                'pilihan' => ['Switch', 'Hub', 'Router', 'Kabel UTP'],
                'jawaban_benar' => 'Router'
            ],
            [
                'pertanyaan' => 'Teknologi jaringan nirkabel yang memanfaatkan gelombang radio untuk bertukar data tanpa kabel disebut...',
                'pilihan' => ['Bluetooth', 'Wi-Fi', 'Fiber Optic', 'Infrared'],
                'jawaban_benar' => 'Wi-Fi'
            ],
            [
                'pertanyaan' => 'Kabel jaringan yang menggunakan serat kaca dan memiliki kecepatan transfer paling stabil dan cepat saat ini adalah...',
                'pilihan' => ['Kabel Coaxial', 'Kabel UTP', 'Kabel Fiber Optic', 'Kabel Telepon'],
                'jawaban_benar' => 'Kabel Fiber Optic'
            ]
        ];

        return view('quiz.isi', [
            'topik' => 'Jaringan Komputer',
            'daftar_soal' => $soal
        ]);
    }
}