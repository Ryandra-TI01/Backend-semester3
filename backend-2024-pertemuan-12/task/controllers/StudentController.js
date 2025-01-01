// import Model Student
const Student = require("../models/Student");
const { validationResult } = require('express-validator');

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();
    if (students.length > 0) {
      const data = {
        message: "Menampilkkan semua students",
        data: students,
      }

      res.status(200).json(data);
    }else{
      const data = {
        message: "Student is empty",
      }
      res.status(200).json(data);
    }
  }

  async store(req, res) {
    const validate = validationResult(req);
    if (!validate.isEmpty()) {
      return res.status(400).json({ errors: validate.array() });
    }
    try {
    const {nama,email,nim,jurusan} = req.body;
    const student = await Student.create({nama,email,nim,jurusan});

    const data = {
      message: "Menambahkan data student",
      data: student,
    };
    res.status(200).json(data);
    
    } catch (err) { 
      res.status(400).json({ error: err.message });
    }
  }

  async update(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);
    if (student) {
      const student = await Student.update(id, req.body);
      const data = {
        message: 'Mengedit data student',
        data: student
      }
      res.status(200).json(data);
    }else{
      const data = {
        message: 'Student not found',
        data: []
      }
      res.status(404).json(data);
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);
    if (student) {
      await Student.destroy(id);
      const data = {
        message: 'Menghapus data student'
      }
      res.status(200).json(data);
    }else{
      const data = {
        message: 'Student not found',
      }
      res.status(404).json(data);
    }
  }
  async show(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);
    if (student) {
      const data = {
        message: "Menampilkan data student",
        data: student,
      }
      res.status(200).json(data);
    } else {
      const data = {
        message: "Student not found",
      }
      res.status(404).json(data);
    }
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
