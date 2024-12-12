/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
// function showDownload(result) {
//   console.log("Download selesai");
//   console.log("Hasil Download: " + result);
// }

const showDownload = (result)=>{
  console.log("Download selesai");
  console.log(`Hasil Download ${result}`);
}
/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */
// function download(callShowDownload) {
//   setTimeout(function () {
//     const result = "windows-10.exe";
//     callShowDownload(result);
//   }, 3000);
// }
const download = ()=> {
  return new Promise((resolve)=>{
    setTimeout(() => {
      const result = "windows-10.exe"
      resolve(result);
    }, 3000);
  })
}


// download(showDownload);

download()
.then((res)=>{
  showDownload(res)
}).catch((err)=>{
  console.log(err);
})

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */
