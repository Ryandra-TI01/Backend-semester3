const dataDiri = [
{    nama: "Edo Riansyah",
    umur: 34,
    alamat: "Depok",
    jurusan: "Teknik Informatika",
    isMarried: true
},
{
    nama: "Andra",
    umur: 34,
    alamat: "Bandung",
    jurusan: "Teknik Informatika",
    isMarried: false
}
]

dataDiri.forEach(element => {
    for (const key in element) {
        console.log(element[key]);
    }
});

// console.log(dataDiri);

