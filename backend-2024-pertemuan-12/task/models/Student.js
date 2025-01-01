// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */
  // static create(nama, email, nim, jurusan) {
  //   const sql = `INSERT INTO students (nama, email, nim, jurusan) VALUES (?, ?, ?, ?)`;

  //   return new Promise((resolve, reject) => {
  //       db.query(sql, [nama, email, nim, jurusan], (err, results) => {
  //         resolve({ id: results.insertId, nama, email, nim, jurusan,created_at:new Date(),updated_at:new Date() });
  //         });
  //      });
  //   };

  static async create(data,callback) {
    const id = await new Promise((resolve, reject) => {
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, results) => {
        resolve(results.insertId);
      });
    })
    const student = await Student.find(id);
    return(student);
  }


  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "SELECT * FROM students WHERE id = ?";
      db.query(sql,id,(err, results) => {
        // destructuring
        const [student] = results;
        resolve(student);
      })
    })
  }
  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ? WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      })
    })
    const student = await Student.find(id);
    return student
  }
  static async destroy(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM students WHERE id = ?";
      db.query(sql, id, (err, results) => {
        resolve(results);
      })
    })
  }


}

// export class Student
module.exports = Student;
