// Mendefinisikan variabel covid19data untuk menyimpan data COVID-19
let covid19data;

// Fungsi yang berjalan saat halaman dimuat
(function onLoad() 
{
    // Memanggil fungsi setButtonFunction() dan getLatestCovid19Data()
    setButtonFunction();
    getLatestcovid19Data();
})();

// Fungsi untuk menetapkan perubahan saat negara dipilih dari dropdown menu
function setButtonFunction() 
{
    // Menetapkan event onchange pada dropdown menu dengan id "negara"
    document.getElementById("negara").onchange = function() {
         // Mendapatkan nilai negara yang dipilih dari dropdown menu
        const Hasil = document.getElementById("negara").value;
        // Filter data COVID-19 berdasarkan negara yang dipilih
        const DataNegara = covid19data.filter(c => c.country == Hasil)[0];
        // Mendapatkan elemen HTML untuk menampilkan data terkait
        const TerjangkitBaru = document.getElementById("TerjangkitBaru");
        const TotalTerjangkit = document.getElementById("TotalTerjangkit");
        const KematianBaru = document.getElementById("KematianBaru");
        const TotalKematian = document.getElementById("TotalKematian");
        const diperbarui = document.getElementById("diperbarui");

        // Memperbarui nilai innerHTML untuk menampilkan data COVID-19
        (DataNegara.cases.new) ? TerjangkitBaru.innerHTML =': ' + DataNegara.cases.new : TerjangkitBaru.innerHTML =': 0';
        (DataNegara.cases.total) ? TotalTerjangkit.innerHTML =': ' + DataNegara.cases.total : TotalTerjangkit.innerHTML =': 0';
        (DataNegara.cases.new) ? KematianBaru.innerHTML =': ' + DataNegara.cases.new : KematianBaru.innerHTML =': 0';
        (DataNegara.cases.total) ? TotalKematian.innerHTML =': ' + DataNegara.cases.total : TotalKematian.innerHTML =': 0';
        diperbarui.innerHTML = ': ' + DataNegara.day;
    };
}

// Fungsi untuk mengambil data terbaru COVID-19 dari API RapidAPI
async function getLatestcovid19Data()
{
    // Mengirimkan permintaan GET ke API untuk mendapatkan data COVID-19
    await fetch('https://covid-193.p.rapidapi.com/statistics',{
        'method': 'GET',
        'headers': {
        'X-RapidAPI-Key': 'c513a142c7mshbd6f087907a965ap14f8a5jsndd4a44ac40da',
		'X-RapidAPI-Host': 'covid-193.p.rapidapi.com'
        }
    })
    .then (response => response.json()) // Mengubah respon menjadi format JSON
    .then (response => {
        // Log respon untuk debugging
        console.log(response);
        console.log('\n');

        // Looping untuk menambahkan opsi negara ke dropdown menu
        response.response.forEach(c => {
            const option = document.createElement('option');
            option.innerHTML = c.country;
            document.getElementById('negara').appendChild(option);
            })
            // Menyimpan data COVID-19 ke dalam variabel covid19data
            covid19data = response.response;
        })
    .catch(err => {
        // Menampilkan error jika terjadi masalah saat mengambil data
        console.log(err);
    })
}