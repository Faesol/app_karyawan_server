@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <center>
            <div class="card card-outline card-primary col-lg-5">
                <div class="p-4">
                    <form method="post" action="{{ url('/my-dokumen/edit-proses/'.$data_dokumen->id) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                            <?php 
                                                $nama_dokumen = array(
                                                [
                                                    "nama_dokumen" => "SIP"
                                                ],
                                                [
                                                    "nama_dokumen" => "PKS/IZIN"
                                                ]);
                                            ?>
                                            <label for="nama_dokumen" class="float-left">Nama Dokumen</label>
                                            <select name="nama_dokumen" id="nama_dokumen" class="form-control selectpicker" data-live-search="true">
                                                <option value="" selected>Pilih Dokumen</option>
                                                @foreach ($nama_dokumen as $a)
                                                    @if(old('nama_dokumen', $data_dokumen->nama_dokumen) == $a["nama_dokumen"])
                                                    <option value="{{ $a["nama_dokumen"] }}" selected>{{ $a["nama_dokumen"] }}</option>
                                                    @else
                                                    <option value="{{ $a["nama_dokumen"] }}">{{ $a["nama_dokumen"] }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('nama_dokumen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_berakhir" class="float-left">Tanggal Berakhir</label>
                                <input type="datetime" class="form-control @error('tanggal_berakhir') is-invalid @enderror" id="tanggal_berakhir" name="tanggal_berakhir" autofocus value="{{ old('tanggal_berakhir', $data_dokumen->tanggal_berakhir) }}">
                                @error('tanggal_berakhir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file" class="form-label" class="float-left">Dokumen</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="file_lama" value="{{ $data_dokumen->file }}">
                            </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                      </form>
                </div>
            </div>
        </center>
    </div>
    <br>
@endsection
