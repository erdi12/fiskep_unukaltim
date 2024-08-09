<?php

namespace Database\Seeders;

use App\Models\PaudQuote;
use Illuminate\Database\Seeder;

class PaudQuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotes = [
        
            '"Pendidikan adalah paspor untuk masa depan, karena hari esok adalah milik mereka yang mempersiapkannya hari ini." - Malcolm X',
            '"Tujuan pendidikan adalah menggantikan pikiran kosong dengan pikiran terbuka." - Malcolm Forbes',
            '"Pendidikan adalah senjata paling ampuh yang bisa kamu gunakan untuk mengubah dunia." - Nelson Mandela',
            '"Investasi dalam pengetahuan memberikan bunga yang terbaik." - Benjamin Franklin',
            '"Pendidikan adalah kunci untuk membuka pintu emas kebebasan." - George Washington Carver',
            '"Pendidikan bukan hanya persiapan untuk hidup; pendidikan adalah hidup itu sendiri." - John Dewey',
            '"Pendidikan adalah ornamen dalam kemakmuran dan tempat perlindungan dalam kesulitan." - Aristoteles',
            '"Akar pendidikan itu pahit, tapi buahnya manis." - Aristoteles',
            '"Pendidikan adalah kebebasan intelektual." - Oprah Winfrey',
            '"Tujuan utama dari pendidikan adalah menciptakan individu yang mampu melakukan hal-hal baru, bukan hanya mengulangi apa yang telah dilakukan generasi sebelumnya." - Jean Piaget',
            '"Pendidikan adalah apa yang tersisa setelah seseorang melupakan apa yang telah dia pelajari di sekolah." - Albert Einstein',
            '"Pendidikan adalah penemuan progresif dari kebodohan kita sendiri." - Will Durant',
            '"Satu-satunya hal yang mengganggu belajar saya adalah pendidikan saya." - Albert Einstein',
            '"Pendidikan adalah penemuan diri sendiri." - George Bernard Shaw',
            '"Pendidikan adalah proses sosial, pendidikan adalah perkembangan, pendidikan bukan persiapan untuk hidup tetapi pendidikan adalah hidup itu sendiri." - John Dewey',
            '"Pendidikan adalah pergerakan dari kegelapan ke cahaya." - Allan Bloom',
            '"Pendidikan adalah kemampuan untuk mendengarkan hampir semua hal tanpa kehilangan kesabaran atau kepercayaan diri." - Robert Frost',
            '"Pendidikan adalah investasi terbesar yang dapat dilakukan oleh suatu bangsa." - Benjamin Franklin',
            '"Pendidikan adalah jalan menuju kebebasan." - Oprah Winfrey',
            '"Pendidikan adalah senjata untuk melepaskan kunci kekayaan dunia." - John Dewey',
            '"Pendidikan adalah perlindungan terbaik bagi orang tua." - Aristoteles',
            '"Pendidikan adalah alat yang kita gunakan untuk mempersiapkan masa depan." - Malcolm X',
            '"Pendidikan adalah pintu menuju kebebasan dan kesempatan." - Oprah Winfrey',
            '"Pendidikan adalah kunci untuk membebaskan pikiran." - Malcolm X',
            '"Pendidikan adalah kunci untuk membuka potensi manusia." - John Dewey',
            '"Pendidikan adalah jalan menuju kemakmuran." - George Washington Carver',
            '"Pendidikan adalah investasi terbaik." - Benjamin Franklin',
            '"Pendidikan adalah kekuatan." - Kofi Annan',
            '"Pendidikan adalah kunci untuk membuka pintu kesempatan." - Oprah Winfrey',
            '"Pendidikan adalah kunci untuk kebebasan intelektual." - Nelson Mandela',
            '"Pendidikan adalah jembatan ke masa depan." - George Washington Carver',
            '"Pendidikan adalah investasi dalam masa depan." - Benjamin Franklin',
            '"Pendidikan adalah cara terbaik untuk mempersiapkan masa depan." - Malcolm X',
            '"Pendidikan adalah kunci untuk membuka pintu-pintu baru." - Oprah Winfrey',
            '"Pendidikan adalah jalan menuju kebebasan dan kesuksesan." - George Washington Carver',
            '"Pendidikan adalah investasi yang menghasilkan bunga terbaik." - Benjamin Franklin',
            '"Pendidikan adalah kekuatan untuk mengubah dunia." - Nelson Mandela',
            '"Pendidikan adalah kunci untuk membuka potensi diri." - John Dewey',
            '"Pendidikan adalah senjata untuk memerangi kebodohan." - Malcolm X',
            '"Pendidikan adalah kunci untuk membuka pintu-pintu keberhasilan." - Oprah Winfrey',
            '"Pendidikan adalah jalan menuju kemajuan." - George Washington Carver',
            '"Pendidikan adalah investasi terbesar dalam hidup." - Benjamin Franklin',
            '"Pendidikan adalah alat untuk membuka kunci potensi manusia." - John Dewey',
            '"Pendidikan adalah senjata untuk membuka pintu kesempatan." - Malcolm X',
            '"Pendidikan adalah jalan menuju kebebasan intelektual." - Nelson Mandela',
            '"Pendidikan adalah investasi terbaik yang dapat kita lakukan." - Benjamin Franklin',
            '"Pendidikan adalah jendela dunia." - George Washington Carver',
            '"Pendidikan adalah kunci untuk membuka pikiran." - Oprah Winfrey',
            '"Pendidikan adalah senjata paling ampuh untuk mengubah dunia." - Nelson Mandela',
            '"Pendidikan adalah investasi dalam pikiran kita." - Benjamin Franklin'
        ];

        foreach ($quotes as $quote) {
            PaudQuote::create(['quote' => $quote]);
        }
    }
}
