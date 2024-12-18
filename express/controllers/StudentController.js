class StudentController {
    index(req, res) {
        const data= {
            message: "Berhasil menampilkan data mahasiswa",
            data: [],
        };
        res.json(data);
    }
    show(req, res) {
        res.send("menampilkan student dengan id = " + req.params.id);
    }
    store(req, res) {
        const{ name } = req.body;
        const data = {
            message: `Berhasil menambahkan data student : ${name}`,
            data: []
        }
        res.json(data)
    }
    update(req, res) {
        const { id } = req.params;
        const { name } = req.body;
        data = {
            message : `"mengedit student dengan id = ${id}, dengan name = ${name}`,
            data: []
        }
        res.json(data)
    }
    destroy(req, res) {
        const { id } = req.params;
        const data = {
            message: "Berhasil menghapus data mahasiswa",
            data: [],
        };
        res.json(data)
    }
}

const Object = new StudentController();

module.exports = Object;