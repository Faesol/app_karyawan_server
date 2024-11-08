@extends('admin.layouts.dashboard')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css" />
<style type="text/css">
    .my-swal {
        z-index: X;
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
                        <h5 class="card-title m-0 me-2">REKAP DATA ABSENSI KARYAWAN</h5>
                    </div>
                </div>
                <div class="card-body">
                    <hr class="">
                    <div class="row mt-3 g-3">
                        <div class="col-lg-3">
                            <input type="month" name="filter_month" id="filter_month" class="form-control" value="{{date('Y-m')}}">
                        </div>
                    </div>
                    <div class="modal fade" id="modal_import_absensi" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <form method="post" action="{{ url('/rekapdata/ImportAbsensi/'.$holding) }}" class="modal-content" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="backDropModalTitle">Import Data Absensi</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-2 mt-2">
                                        <div class="col mb-2">
                                            <div class="form-floating form-floating-outline">
                                                <input type="file" id="file_excel" name="file_excel" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" class="form-control" placeholder="Masukkan File" />
                                                <label for="file_excel">File Excel</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-2 mt-2">
                                        <a href="" type="button" download="" class="btn btn-sm btn-primary"> Download Format Excel</a>
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
                    <div class="modal fade" id="modal_export_absensi" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <form method="get" action="{{url('rekap-data/ExportAbsensi/'.$holding)}}" class="modal-content" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="backDropModalTitle">Export Excel Absensi</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-2 mt-2">
                                        <div class="col mb-2">
                                            <div class="form-floating form-floating-outline">
                                                <h6>Download File Excel Data Absensi</h6>
                                                <button type="submit" class="btn btn-sm btn-success"> Download Excel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="modal_detail" data-bs-backdrop="static" tabindex="-1">
                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                            <form method="post" action="{{ url('/rekapdata/ImportAbsensi/'.$holding) }}" class="modal-content" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h4 class="modal-title" id="backDropModalTitle">Detail Absensi</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Transactions -->
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h5 id="title_detail" class="card-title m-0 me-2">DATA ABSENSI KARYAWAN </h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table class="table" id="table_rekapdata2" style="width: 100%;">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th rowspan="2" class="text-center">Detail</th>
                                                            <th rowspan="2" class="text-center">No.</th>
                                                            <th rowspan="2" class="text-center">ID&nbsp;Karyawan</th>
                                                            <th rowspan="2" class="text-center">Nama&nbsp;Karyawan</th>
                                                            <th colspan="2" class="text-center">Hadir&nbsp;Kerja</th>
                                                            <th colspan="3" class="text-center">Keterangan</th>
                                                            <th colspan="1" class="text-center">Tidak&nbsp;Hadir&nbsp;Kerja</th>
                                                            <th rowspan="2" class="text-center">Total&nbsp;Keseluruhan</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Tepat&nbsp;Waktu</th>
                                                            <th>Telat&nbsp;Hadir</th>
                                                            <th>Izin</th>
                                                            <th>Cuti</th>
                                                            <th>Dinas</th>
                                                            <th>Alfa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <hr class="my-5">
                    <div class="nav-align-top">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-8">
                                <ul class="nav nav-pills nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a type=" button" style="width: auto;" class="nav-link active" role="tab" data-bs-toggle="tab" href="#navs-pills-justified-home">
                                            <i class="tf-icons mdi mdi-account-tie me-1"></i><span class="d-none d-sm-block">Karyawan Bulanan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a type="button" style="width: auto;" class="nav-link" role="tab" data-bs-toggle="tab" href="#navs-pills-justified-profile">
                                            <i class="tf-icons mdi mdi-account me-1"></i><span class="d-none d-sm-block">Karyawan Harian</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                                <table class="table" id="table_report" style="width: 100%;">
                                    <thead class="table-primary">
                                        <tr >
                                            <th rowspan="2" class="text-center">No.</th>
                                            <th rowspan="2" class="text-center">ID&nbsp;Karyawan</th>
                                            <th rowspan="2" class="text-center">Nama&nbsp;Karyawan</th>
                                            <th rowspan="2" class="text-center">Jumlah&nbsp;Hadir&nbsp;Kerja</th>
                                            <th rowspan="2" class="text-center">Jumlah&nbsp;Tidak&nbsp;Hadir&nbsp;Kerja</th>
                                            <th rowspan="2" class="text-center">Jumlah&nbsp;Libur</th>
                                            <th rowspan="2" class="text-center">&nbsp;Total&nbsp;</th>
                                            <th id="th_date" class="text-center">&nbsp;Tanggal&nbsp;</th>
                                        </tr>
                                        <tr class="date_absensi">
                                                @foreach($period as $period ) 
                                                <th>{{$period->format('d/m/Y')}}</th>
                                                @endforeach
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                                <table class="table" id="table_rekapdata1" style="width: 100%;">
                                    <thead class="table-primary">
                                        <tr>
                                            <th rowspan="2" class="text-center">No.</th>
                                            <th rowspan="2" class="text-center">ID&nbsp;Karyawan</th>
                                            <th rowspan="2" class="text-center">Nama&nbsp;Karyawan</th>
                                            <th colspan="3" class="text-center">Jumlah&nbsp;Hadir&nbsp;Kerja</th>
                                            <th colspan="1" class="text-center">Jumlah&nbsp;Tidak&nbsp;Hadir&nbsp;Kerja</th>
                                            <th colspan="3" class="text-center">Jumlah&nbsp;Libur</th>
                                            <th rowspan="2" class="text-center">&nbsp;Total&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th>Tepat&nbsp;Waktu</th>
                                            <th>Telat&nbsp;Hadir(-15 Menit)</th>
                                            <th>Telat&nbsp;Hadir(+15 Menit)</th>
                                            <th>Izin</th>
                                            <th>Cuti</th>
                                            <th>Dinas</th>
                                            <th>Alfa</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/assets_users/js/daterangepicker.js') }}"></script>
    <script>
        let holding = window.location.pathname.split("/").pop();
        $(document).ready(function() {
            var colspan = {!!$count_period!!};
            // console.log(colspan);
            
            function newexportaction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function(e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function(e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function(e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            }
            $(document).on("change", "#filter_month", function() {
                let filter_month = $(this).val();
                $.ajax({
                    url: "@if(Auth::user()->is_admin=='hrd'){{ url('/hrd/report/get_columns') }}@else{{ url('report/get_columns') }}@endif",
                    type: "GET",
                    data: {
                        filter_month: filter_month,
                    },
                    error: function() {
                        alert('Something is wrong');
                    },
                    success: function(data) {
                        // console.log(data.data_columns_header);
                        var date_absensi = $('.date_absensi th');
                        var date_absensi1 = $('.date_absensi');
                        date_absensi1.empty();
                        date_absensi.empty();
                        $.each(data.data_columns_header, function(item) {
                           date_absensi.html(data.data_columns_header[item].header);
                            // console.log(oke);
                        });
                        // Swal.fire({
                        //     title: 'Terhapus!',
                        //     text: 'Data anda berhasil di hapus.',
                        //     icon: 'success',
                        //     timer: 1500
                        // })
                        datacolumn = [{
                            data: 'no',
                            render: function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                data: 'nomor_identitas_karyawan',
                                name: 'nomor_identitas_karyawan'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'total_hadir_kerja',
                                name: 'total_hadir_kerja'
                            },
                            {
                                data: 'total_tidak_hadir_kerja',
                                name: 'total_tidak_hadir_kerja'
                            },
                            {
                                data: 'total_libur',
                                name: 'total_libur'
                            },
                            {
                                data: 'total_semua',
                                name: 'total_semua'
                            },
                        ];
                        datacolumn1 = datacolumn.concat(data.datacolumn);
                        // $('#th_date').removeAttr('colspan');
                        data_th1 = data.data_columns_header.toString();
                        data_th = data_th1.replace(',' , '');
                        // console.log(data.data_columns_header.length);
                        // console.log(data_th);
                        load_data(data.filter_month, datacolumn1,data.data_columns_header.length);
                        // $('#table_report').DataTable().ajax.reload();
                    }
                });
                // console.log(filter_month);
            });
            // console.log(datacolumn);
            datacolumn = [{
                    data: 'no',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'nomor_identitas_karyawan',
                    name: 'nomor_identitas_karyawan'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'total_hadir_kerja',
                    name: 'total_hadir_kerja'
                },
                {
                    data: 'total_tidak_hadir_kerja',
                    name: 'total_tidak_hadir_kerja'
                },
                {
                    data: 'total_libur',
                    name: 'total_libur'
                },
                {
                    data: 'total_semua',
                    name: 'total_semua'
                },
                {!!$datacolumn!!},
            ];
            var filter_month = $('#filter_month').val();
            load_data(filter_month , datacolumn, colspan);
            function load_data(filter_month = '', datacolumn ='',colspan1='') {
                console.log(colspan1);
                $('#th_date').attr('colspan',colspan1);
                url = "{{ url('report-datatable') }}" + '/' + holding;
                // console.log(filter_month);
                // console.log(datacolumn);
                $('#table_report').DataTable().destroy();
                var table_report = $('#table_report').DataTable({
                    scrollY: '600px',
                    scrollCollapse: true,
                    scrollX: true,
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    dom: 'Blfrtip',
                    buttons: [{

                            extend: 'excelHtml5',
                            className: 'btn btn-sm btn-success',
                            text: '<i class="menu-icon tf-icons mdi mdi-file-excel"></i>Excel',
                            titleAttr: 'Excel',
                            title: 'DATA ABSENSI KARYAWAN ',
                            action: newexportaction,
                            exportOptions: {
                                columns: ':not(:first-child)',
                            },
                            filename: function() {
                                var d = new Date();
                                var l = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
                                var n = d.getHours() + ':' + d.getMinutes() + ':' + d.getSeconds();
                                return 'REKAP_DATA_ABSENSI_KARYAWAN_{{$holding}}_' + l + ' ' + n;
                            },
                        },
                        {

                            extend: 'pdf',
                            className: 'btn btn-sm btn-danger',
                            text: '<i class="menu-icon tf-icons mdi mdi-file-pdf-box"></i>PDF',
                            titleAttr: 'PDF',
                            title: 'DATA ABSENSI KARYAWAN',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            exportOptions: {
                                columns: ':not(:first-child)',
                            },
                            filename: function() {
                                var d = new Date();
                                var l = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
                                var n = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
                                return 'REKAP_DATA_ABSENSI_KARYAWAN_{{$holding}}_' + l + ' ' + n;
                            },
                        }, {
                            extend: 'print',
                            className: 'btn btn-sm btn-info',
                            title: 'DATA ABSENSI KARYAWAN',
                            text: '<i class="menu-icon tf-icons mdi mdi-printer-pos-check-outline"></i>PRINT',
                            titleAttr: 'PRINT',
                        }, {
                            extend: 'copy',
                            title: 'DATA ABSENSI KARYAWAN',
                            className: 'btn btn-sm btn-secondary',
                            text: '<i class="menu-icon tf-icons mdi mdi-content-copy"></i>COPY',
                            titleAttr: 'COPY',
                        }
                    ],
                    pageLength: 50,
                    ajax: {
                        url: url,
                        data: {
                            filter_month: filter_month,
                        },
                    },
                    columns: datacolumn,

                    // order: [3, 'ASC'],
                });
            }

        });
    </script>

    @endsection