// TODO 3: Import data students dari folder data/students.js
// code here
const data = require("../data/students");
const dataStudents = require("../data/students");
// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    // code here
    const data = {
      message: "Berhasil menampilkan data mahasiswa",
      data: dataStudents,
    }
    res.json(data)
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    // code here
    const { name } = req.body;
    dataStudents.push(name);
    const data = {
      message :`Berhasil menambahkan data student : ${name}`,  
      data : dataStudents
    }
    res.json(data)
  }

  update(req, res) {
    // TODO 6: Update data students
    // code here
    const name = req.body.name;
    const id = req.params.id
    dataStudents[id] = name

    const data = {
      message : `mengedit student dengan id = ${id}, dengan name = ${name}`,
      data : dataStudents
    }
    res.json(data)
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    // code here
    const id = req.params.id
    dataStudents.splice(id, 1,)
    const data = {
      message : `Berhasil menghapus data mahasiswa ${id}`,
      data : dataStudents
    }
    res.json(data)
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
