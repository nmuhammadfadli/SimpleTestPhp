<?php
use PHPUnit\Framework\TestCase; //pernyataan untuk mengimpor kelas 
//TestCase adalah kelas dasar yang digunakan untuk membuat unit tes dalam PHPUnit
require_once 'D:\Xampp\htdocs\PhpTesting\Wordcount.php'; //pernyataan yang digunakan untuk memuat file Wordcount.php yang terletak di jalur yang ditentukan
// require_once digunakan untuk memastikan bahwa file hanya dimuat sekali, jika sudah dimuat sebelumnya, maka tidak akan dimuat lagi

class SimpleTest extends TestCase //mendefinisikan kelas SimpleTest yang merupakan subkelas dari TestCase
//Kelas ini akan digunakan untuk menulis dan menjalankan tes unit
{
  public function testcountWords(){ //metode yang mendefinisikan tes unit dengan nama testcountWords()
    //Testing ini dibuat untuk menghitung jumlah kata dalam kalimat yang diberikan
    $Wc = new Wordcount();//membuat instance objek dari kelas Wordcount dan menyimpannya dalam variabel $Wc
    //Kelas Wordcount  berisi metode countWords() yang akan diuji

    $TestSentence = "My Name is Joko"; //memberikan definisi variabel $TestSentence dan menginisialisasinya dengan kalimat yang akan diuji
    $Wordcount = $Wc->countWords($TestSentence); //: Ini memanggil metode countWords() pada objek $Wc dengan parameter $TestSentence
    // method ini akan menghitung jumlah kata dalam kalimat dan hasilnya akan disimpan dalam variabel $Wordcount.
    
    $this->assertEquals(4, $Wordcount); 
    //i adalah pernyataan pengujian yang membandingkan hasil yang diharapkan (4) dengan hasil aktual yang dihitung oleh metode countWords()
  }  
}
?>