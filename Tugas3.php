<?php
class Animal{
    public $kumpulanHewan = [];
    public function __construct($data) {
        $this->kumpulanHewan = $data;
    }
    // menampilkan semua hewan
    public function index(){
        foreach ($this->kumpulanHewan as $hewan) {
            echo "<li>" . $hewan ."</li>";
        }
    }
    // menambahkan hewan
    public function store($data){
        array_push($this->kumpulanHewan, $data);
    }
    // update hewan
    public function update($index, $data){
        $this->kumpulanHewan[$index] = $data;
    }
    // menghapus hewan
    public function delete($index){
        unset($this->kumpulanHewan[$index]);
    }
}
//  inisialisasi objek dan nambah data 
 $hewan = new Animal(["kocheng", "lembu", "kancil", "sapi Jepang", "sapi Belanda"]);
//  menampilkan semua hewan
echo "<h3>Index - Menampilkan semua hewan </h3>";
$hewan->index();

//  menambahkan hewan
echo "<h3>Store - Menambahkan hewan babi</h3>";
$hewan->store("Babi Indonesia");
$hewan->index();

//  edit atau update data di dalam array
echo "<h3>Update - Mengedit data di dalam array, kocheng menjadi marmoet</h3>";
$hewan->update(0, "marmoet");
$hewan->index();

//  menghapus hewan
echo "<h3>Delete - Menghapus data kancil di dalam array </h3>";
$hewan->delete(2);
$hewan->index();