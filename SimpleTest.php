<?php
use PHPUnit\Framework\TestCase;
require_once 'D:\Xampp\htdocs\PhpTesting\Wordcount.php';

class SimpleTest extends TestCase
{
  public function testcountWords(){
    $Wc = new Wordcount();

    $TestSentence = "My Name is Joko";
    $Wordcount = $Wc->countWords($TestSentence);

    $this->assertEquals(4, $Wordcount); 
  }  
}
?>