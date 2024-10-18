<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["kocheng", "lembu", "kancil", "sapi Jepang", "sapi Belanda"];

    public function index()
    {
        echo "Menampilkan data animal</br>";
        foreach ($this->animals as $animal) {
            echo "<li>" . $animal . "</li>";
        };
    }

    public function store(Request $request)
    {
        echo "Menambahkan hewan baru</br>";
        array_push($this->animals, $request->name);
        $this->index();
    }

    public function update(Request $request, $id)
    {
        echo "Mengupdate data hewan dengan id 1</br>";
        echo "Menampilkan data animal";
        $this->animals[$id] = $request->name;
        $this->index();
        
    }

    public function delete($id)
    {
        echo "Menghapus data hewan dengan id 2</br>";
        echo "Menampilkan data animal";
        unset($this->animals[$id]);
        $this->index();
        
    }
}
