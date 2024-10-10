<?php 
class Person{
    public $name;
    public $alamat;
    public $jurusan;

    public function __construct($name, $alamat, $jurusan){
        $this->name = $name;
        $this->alamat = $alamat;
        $this->jurusan = $jurusan;
    }
    public function cetak(){
        echo $this->name;
        echo $this->alamat;
        echo $this->jurusan;
    }
}
