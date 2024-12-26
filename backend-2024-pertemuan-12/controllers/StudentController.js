const Student = require("../models/Student");

class StudentController {
  // Mendapatkan seluruh resource
  async index(req, res) {
    const students = await Student.all();

    const data = {
      message: "Menampilkan data student",
      data: students,
    };

    res.json(data);
  }

  store(req, res) {
    const { nama } = req.body;
    const data = {
      message: `Menambahkan data student ${nama}`,
      data: [],
    };

    res.json(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
