const form = document.getElementById('form')
const name = document.getElementById('name')
const karyawan_id = document.getElementById('karyawan_id')
const tanggal = document.getElementById('tanggal')
const waktu = document.getElementById('waktu')
const button = document.getElementById('btn_submit')
const liveToast = document.getElementById('liveToast')
const toastBody = document.getElementById('toastBody')
const shift_karyawan = $('#shift_karyawan').val();
const toastBootstrap = bootstrap.Toast.getOrCreateInstance(liveToast)

var alert_karyawan_tidaksesuai = document.getElementById('alert_karyawan_tidaksesuai')
var alert_karyawan_unknown = document.getElementById('alert_karyawan_unknown')
$('#alert_karyawan_tidaksesuai').hide();
$('#alert_karyawan_unknown').hide();
let absensi = []
let jumlahAbsensi
// untuk menyimpan variable array yang pertama di ambil
let allFirstMatches = []
// onload array absensi
function onLoadDataAbsensi(value, jmlAbsensi) {
    absensi = JSON.parse(value)
    jumlahAbsensi = jmlAbsensi
}
function take_snapshot() {
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
        $(".image-tag").val(data_uri);
        // display results in page
        video.innerHTML =
            '<img src="' + data_uri + '"/>';
    });
}

//membuat kondisi jika hasil pengenalan tidak sama dengan unknown
setInterval(() => {
    if (labelHasil !== undefined) {
        if (labelHasil.split(" ")[0] !== "unknown") {
            const arrayLabel = labelHasil.split(" ")
            arrayLabel.pop()
            // nama label yang dikenali
            const labelName = arrayLabel.join(" ")
            submitButton = () => {
                // memasukan data pengenalan ke form
                const karyawan = dataKaryawanJson.find(value => value.name === labelName)
                name.value = labelName
                karyawan_id.value = karyawan.id
                // untuk mensubmit form
                take_snapshot()
                button.click()
            }
            submitButton();
        } else {
            $('#alert_karyawan_unkwon').show();
            console.log('unknwon');
                // console.log('ok');
                setTimeout(function() {
                    // console.log('ok1');
                    $("#alert_karyawan_unkwon").hide();
                }, 2000); // 7 secs
        }
    } else {
        $('#alert_karyawan_tidaksesuai').show();
        console.log('tidak sesuai');
            // console.log('ok');
            setTimeout(function() {
                // console.log('ok1');
                $("#alert_karyawan_tidaksesuai").hide();
            }, 2000); // 7 secs
    }
},3000) // jarak tiap submit 3 detik satuan ms