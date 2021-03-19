@extends('layout.master')

@section('content')
    <div style="margin-top:10px;margin-bottom:20px;" align="center">
        <h1>Edit Data Siswa</h1>
    </div>

    <div class="row">
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        </div>
        @endif

        <div class="col-md-12">
            <form action="/siswa/update/{{$siswa->id}}" method="POST">
                {{csrf_field()}}
                
                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">NIM</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="nim" value="{{$siswa->nim}}"required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="nama_lengkap" value="{{$siswa->nama_lengkap}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L" @if($siswa->jenis_kelamin == 'L') checked @endif>
                            <label class="form-check-label" for="gridRadios1">
                                Laki - laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P" @if($siswa->jenis_kelamin == 'P') checked @endif>
                            <label class="form-check-label" for="gridRadios2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="tgl_lahir" value="{{$siswa->tgl_lahir}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Agama</label>
                    <div class="col-md-4">
                        <select class="form-control" name="agama" required>
                            <option value=""> -Silahkan Pilih-</option>
                            <option value="Islam" @if($siswa->agama == 'Islam') selected @endif >Islam</option>
                            <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif >Kristen</option>
                            <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif >Hindu</option>
                            <option value="Budha" @if($siswa->agama == 'Budha') selected @endif >Budha</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Jenis Kelas</label>
                    <div class="col-md-4">
                        <select class="form-control" name="jenis_kelas" required>
                            <option value=""> -Silahkan Pilih-</option>
                            <option value="Reguler" @if($siswa->jenis_kelas == 'Reguler') selected @endif >Reguler</option>
                            <option value="International" @if($siswa->jenis_kelas == 'International') selected @endif >International</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Telepon</label>
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="phone" value="{{$siswa->phone}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 offset-md-3 col-form-label">Alamat</label>
                    <div class="col-md-4">
                        <textarea name="alamat" id="" cols="10" rows="2" class="form-control">{{$siswa->alamat}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4 offset-md-5">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection