@extends('admin.layouts.dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />

<style type="text/css">
    .my-swal {
        z-index: X;
    }



    .leaflet-container {
        height: 400px;
        width: 600px;
        max-width: 100%;
        max-height: 100%;
    }
</style>
@endsection
@section('isi')
@include('sweetalert::alert')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row gy-4">
        <!-- Transactions -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">DATA MASTER LOKASI</h5>
                    </div>
                </div>
                <div class="card-body">
                    <hr class="my-5">
                    <a type="button" href="{{url('lokasi-kantor/tambah_lokasi/'.$holding)}}" id="btn_tambah_lokasi" class="btn btn-sm btn-primary waves-effect waves-light"><i class="menu-icon tf-icons mdi mdi-plus"></i>Tambah</a>
                    <div class="modal fade" id="modal_lihat_lokasi" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="backDropModalTitle">Lihat Lokasi (MAPS)</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <table>
                                                        <tr>
                                                            <th>Lokasi</th>
                                                            <td>&nbsp;</td>
                                                            <td>:</td>
                                                            <td id="nama_lokasi"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Titik</th>
                                                            <td>&nbsp;</td>
                                                            <td>:</td>
                                                            <td id="nama_titik_lokasi"> </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Radius</th>
                                                            <td>&nbsp;</td>
                                                            <td>:</td>
                                                            <td id="radius_titik"></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" id="lat_titik" value="">
                                        <input type="hidden" id="long_titik" value="">
                                        <input type="hidden" id="radius" value="">
                                        <input type="hidden" id="lokasi_kantor" value="">
                                        <input type="hidden" id="nama_titik" value="">
                                        <div class="card mb-4">
                                            <div id="lihat_lokasi"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal edit -->
                    <div class="modal fade" id="modal_edit_lokasi" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <form method="post" action="{{ url('/lokasi-kantor/edit/'.$holding) }}" class=" modal-content" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="backDropModalTitle">Edit Lokasi</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="id_lokasi" id="id_lokasi" value="">
                                    <input type="hidden" name="kategori_kantor_update" id="kategori_kantor_update" value="{{$holding}}">
                                    <div class="row g-2">
                                        <div class="col mb-2">
                                            <?php
                                            $holding = request()->segment(count(request()->segments()));
                                            if ($holding == 'sp') {
                                                $lokasi_kantor = array(
                                                    [
                                                        "lokasi" => "CV. SUMBER PANGAN - KEDIRI"
                                                    ],
                                                    [
                                                        "lokasi" => "CV. SUMBER PANGAN - TUBAN"
                                                    ],
                                                );
                                            } else if ($holding == 'sps') {
                                                $lokasi_kantor = array(
                                                    [
                                                        "lokasi" => "PT. SURYA PANGAN SEMESTA - KEDIRI"
                                                    ],
                                                    [
                                                        "lokasi" => "PT. SURYA PANGAN SEMESTA - NGAWI"
                                                    ],
                                                    [
                                                        "lokasi" => "PT. SURYA PANGAN SEMESTA - SUBANG"
                                                    ]
                                                );
                                            } else {
                                                $lokasi_kantor = array(
                                                    [
                                                        "lokasi" => "CV. SURYA INTI PANGAN - MAKASAR"
                                                    ]
                                                );
                                            }
                                            ?>
                                            <div class="form-floating form-floating-outline">
                                                <select name="lokasi_kantor_update" id="lokasi_kantor_update" class="form-control  @error('lokasi_kantor_update') is-invalid @enderror">
                                                    <option value="">Pilih Lokasi</option>
                                                    @foreach ($lokasi_kantor as $g)
                                                    <option value="{{ $g['lokasi'] }}">{{ $g["lokasi"] }}</option>
                                                    @endforeach
                                                </select>
                                                <label for="lokasi_kantor_update">Lokasi Kantor</label>
                                            </div>
                                            @error('lokasi_kantor_update')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <input type="hidden" class="form-control" id="lat_kantor_update" name="lat_kantor_update" value="">
                                    <input type="hidden" class="form-control" id="long_kantor_update" name="long_kantor_update" value="">

                                    <!-- <button type="button" id="btn_lokasi_saya" class="btn btn-icon btn-outline-success waves-effect" title="Lokasi Saya">
                                        <span class="tf-icons mdi mdi-map-marker"></span>
                                    </button>
                                    <button id="btn_refresh_lokasi" type="button" id="btn_lokasi_saya" class="btn btn-icon btn-outline-primary waves-effect" title="Refresh">
                                        <span class="tf-icons mdi mdi-refresh"></span>
                                    </button>
                                    <br>
                                    <br> -->
                                    <div class="row g-2">
                                        <div class="col mb-2">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control @error('nama_titik_update') is-invalid @enderror" id="nama_titik_update" name="nama_titik_update" value="">
                                                <label for="nama_titik_update" class="float-left">Nama Titik</label>
                                            </div>
                                            @error('nama_titik_update')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row g-2">
                                        <div class="col mb-2">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control @error('radius_update') is-invalid @enderror" id="radius_update" name="radius_update" value="">
                                                <label for="radius_update" class="float-left">Radius</label>
                                            </div>
                                            @error('radius_update')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row g-2">
                                        <div id="lihat_edit_lokasi"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table" id="table_lokasi" style="width: 100%;">
                        <thead class="table-primary">
                            <tr>
                                <th>No.</th>
                                <th>Lokasi&nbsp;Kantor</th>
                                <th>Nama&nbsp;Titik</th>
                                <th>Lat&nbsp;Kantor</th>
                                <th>Long&nbsp;Kantor</th>
                                <th>Radius</th>
                                <th>Maps</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
        <!--/ Data Tables -->
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>


<script>
    let holding = window.location.pathname.split("/").pop();
    var table = $('#table_lokasi').DataTable({
        "scrollY": true,
        "scrollX": true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ url('lokasi-datatable') }}" + '/' + holding,
        },
        columns: [{
                data: "id_titik",

                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'lokasi_kantor',
                name: 'lokasi_kantor'
            },
            {
                data: 'nama_titik',
                name: 'nama_titik'
            },
            {
                data: 'lat_titik',
                name: 'lat_titik'
            },
            {
                data: 'long_titik',
                name: 'long_titik'
            },
            {
                data: 'radius_titik',
                name: 'radius_titik'
            },
            {
                data: 'lihat_maps',
                name: 'lihat_maps'
            },
            {
                data: 'option',
                name: 'option'
            },
        ],
        order: [1, 'asc'],
    });
</script>
<script>
    $(document).on("click", "#btn_edit_lokasi", function() {
        let id = $(this).data('id');
        let lokasi = $(this).data("lokasi");
        let lat = $(this).data("lat");
        let long = $(this).data("long");
        let radius = $(this).data("radius");
        var titik = $(this).data('nama_titik');
        let holding = $(this).data("holding");
        // console.log(long);
        $('#id_lokasi').val(id);
        $('#lat_kantor_update').val(lat);
        $('#long_kantor_update').val(long);
        $('#radius_update').val(radius);
        $('#nama_titik_update').val(titik);
        $('#lokasi_kantor_update option').filter(function() {
            // console.log($(this).val().trim());
            return $(this).val().trim() == lokasi
        }).prop('selected', true)
        $('#modal_edit_lokasi').modal('show');
        maps_edit_lokasi();

    });
</script>
<script>
    $(document).on('click', '#btn_lokasi_saya', function() {
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            $('#lat_kantor').val(position.coords.latitude);
            $('#long_kantor').val(position.coords.longitude);
            $('#lat_kantor_update').val(position.coords.latitude);
            $('#long_kantor_update').val(position.coords.longitude);
        }
    })
    $(document).on('click', '#btn_refresh_lokasi', function() {
        $('#lat_kantor').val('');
        $('#long_kantor').val('');
        $('#lat_kantor_update').val('');
        $('#long_kantor_update').val('');
    })

    $(document).on('click', '#btn_delete_lokasi', function() {
        var cek = $(this).data('id');
        var holding = $(this).data('holding');
        // console.log(holding);
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Kamu tidak dapat mengembalikan data ini",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{url('lokasi-kantor/delete/')}}/" + cek + "/" + holding,
                    type: "GET",
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        Swal.fire({
                            title: 'Terhapus!',
                            text: 'Data anda berhasil di hapus.',
                            icon: 'success',
                            timer: 1500
                        })
                        $('#table_lokasi').DataTable().ajax.reload();
                    }
                });
            } else {
                Swal.fire("Cancelled", "Your data is safe :)", "error");
            }
        });

    });
    $(document).on('click', '#btn_lihat_lokasi', function() {
        var lokasi = $(this).data('lokasi');
        var lat = $(this).data('lat');
        var long = $(this).data('long');
        var titik = $(this).data('nama_titik');
        var radius = $(this).data('radius');
        $('#radius').val(radius);
        $('#lat_titik').val(lat);
        $('#long_titik').val(long);
        $('#lokasi_kantor').val(lokasi);
        $('#nama_lokasi').html(lokasi);
        $('#nama_titik_lokasi').html(titik);
        $('#nama_titik').val(titik);
        $('#radius_titik').html(radius + ' M');
        $('#modal_lihat_lokasi').modal('show');
        maps_lokasi();
    });
</script>
<script>
    var map = null;

    function maps_lokasi() {
        var radius = $('#radius').val();
        var lat = $('#lat_titik').val();
        var long = $('#long_titik').val();
        var lokasi_kantor = $("#lokasi_kantor").val()
        var nama_titik = $("#nama_titik").val()
        if (map) {
            map.off();
            map.remove();


        }
        // console.log(lokasi_kantor);
        map = L.map('lihat_lokasi').fitWorld().setView([lat, long], 17);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 25,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        $('#modal_lihat_lokasi').on('shown.bs.modal', function() {
            map.invalidateSize();
        });


        var popup = L.popup()
            .setLatLng([lat, long])
            .setContent(lokasi_kantor)
            .openOn(map);

        if (lokasi_kantor == 'CV. SUMBER PANGAN - KEDIRI') {
            // console.log('ok');
            var latlngs = [
                [-7.757852, 112.093890],
                [-7.756964, 112.094195],
                [-7.757866, 112.096507],
                [-7.758657, 112.095336]
            ];
        } else {
            var latlngs = [
                [-6.991185, 112.120763],
                [-6.989174, 112.121394],
                [-6.989563, 112.122751],
                [-6.991437, 112.122061]
            ];

        }
        var polygon = L.polygon(latlngs, {
            color: 'red'
        }).addTo(map);

        // console.log(circle);

        // console.log(marker);
        // function onMapClick(e) {
        // }
        // map.on('click', onMapClick);

        var circle = L.circle([lat, long], {
            color: 'purple',
            fillColor: 'purple',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);
        var marker = L.marker([lat, long]).addTo(map)
            .bindPopup(nama_titik).openPopup();
    }

    function maps_edit_lokasi() {
        if (map) {
            map.off();
            map.remove();
        }
        var long_titik = $("#long_kantor_update").val();
        var lat_titik = $("#lat_kantor_update").val()
        var lokasi_kantor = $("#lokasi_kantor_update").val()
        var nama_titik = $("#nama_titik_update").val()

        map = L.map('lihat_edit_lokasi').fitWorld().setView([lat_titik, long_titik], 17);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 25,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);


        var popup = L.popup()
            .setLatLng([lat_titik, long_titik])
            .setContent(lokasi_kantor)
            .openOn(map);

        if (lokasi_kantor == 'CV. SUMBER PANGAN - KEDIRI') {
            var latlngs = [
                [-7.757852, 112.093890],
                [-7.756964, 112.094195],
                [-7.757866, 112.096507],
                [-7.758657, 112.095336]
            ];
        } else {
            var latlngs = [
                [-6.991185, 112.120763],
                [-6.989174, 112.121394],
                [-6.989563, 112.122751],
                [-6.991437, 112.122061]
            ];

        }
        var polygon = L.polygon(latlngs, {
            color: 'red'
        }).addTo(map);
        $('#modal_edit_lokasi').on('shown.bs.modal', function() {
            map.invalidateSize();
        });

        // console.log(circle);

        // function onMapClick(e) {
        // }
        // map.on('click', onMapClick);
        var marker = null;
        var circle = null;
        marker = L.marker([lat_titik, long_titik]).addTo(map)
            .bindPopup(nama_titik).openPopup();
        radius = $("#radius_update").val()
        circle = L.circle([lat_titik, long_titik], {
            color: 'purple',
            fillColor: 'purple',
            fillOpacity: 0.5,
            radius: radius
        }).addTo(map);
        map.on('click', function(e) {
            popup
                .setLatLng(e.latlng)
                .setContent('You clicked the map at ' + e.latlng.toString())
                .openOn(map);
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            // console.log(longitude);
            $("#long_kantor_update").val(longitude);
            $("#lat_kantor_update").val(latitude);
            // map.removeLayer(circle1);
            // map.removeLayer(circle);
            var nama_titik = $("#nama_titik_update").val()
            console.log(nama_titik);
            if (marker !== null) {
                map.removeLayer(marker);
            }
            marker = L.marker([latitude, longitude]).addTo(map)
                .bindPopup(nama_titik).openPopup();
            if (circle !== null) {
                map.removeLayer(circle);
            }
            var radius = $("#radius_update").val()
            circle = L.circle([latitude, longitude], {
                color: 'purple',
                fillColor: 'purple',
                fillOpacity: 0.5,
                radius: radius
            }).addTo(map);
            // map.removeLayer(L.circle([latitude, longitude]));
        });
    }
</script>
@endsection