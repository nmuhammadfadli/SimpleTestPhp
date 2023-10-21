<?php
// File : Wordcount.php
class Wordcount{ // definisi kelas yang disebut "Wordcount". 
    //Kelas ini akan digunakan untuk menghitung jumlah kata dalam sebuah kalimat
    public function countWords($sentence)//metode dalam kelas Wordcount yang bernama countWords()
     //Metode ini menerima satu parameter, yaitu $sentence, yang harus berisi kalimat yang akan dihitung jumlah katanya.
    {
        return count(explode(" ",$sentence)); //pernyataan dalam metode countWords() yang dibuat untuk  menghitung jumlah kata dalam kalimat 
        //explode bertujuan untuk  memecah kalimat yang diberikan, menggunakan spasi (" ") sebagai pemisah, dan mengembalikan array kata-kata.
//count(...): Ini menghitung jumlah elemen dalam array yang dihasilkan oleh explode(), yang pada dasarnya adalah jumlah kata dalam kalimat.
//return ...;: Hasil dari perhitungan jumlah kata dikembalikan dari metode ini.
    }
}
?>