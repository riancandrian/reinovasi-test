@extends('layout.master')

@section('content')
    <div style="margin-top:10px;" align="center">
        <h1>List Data Siswa</h1>
    </div>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-6" id="chart_batang"></div>
        <div class="col-md-6" id="chart_pie"></div>
        <div class="col-md-12"><hr></div>
    </div>

    <div class="row">
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        </div>
        @endif
        <div class="col-md-12" style="padding-bottom: 10px; ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/siswa/create" method="POST">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">NIM</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="nim" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama_lengkap" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-md-8">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="L" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Laki - laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="P">
                                            <label class="form-check-label" for="gridRadios2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="tgl_lahir" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Agama</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="agama" required>
                                            <option value=""> -Silahkan Pilih-</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Jenis Kelas</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="jenis_kelas" required>
                                            <option value=""> -Silahkan Pilih-</option>
                                            <option value="Reguler">Reguler</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Telepon</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="phone" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-md-4 col-form-label">Alamat</label>
                                    <div class="col-md-8">
                                        <textarea name="alamat" id="" cols="10" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-hover table-sm dataTables" style="font-size: 14px;">
                <thead>
                    <tr style="white-space:nowrap;">
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl. Lahir</th>
                        <th>Agama</th>
                        <th>Jenis Kelas</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th width="8%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_siswa as $siswa)
                    <tr>
                        <td>{{$siswa->nim}}</td>
                        <td>{{$siswa->nama_lengkap}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->tgl_lahir}}</td>
                        <td>{{$siswa->agama}}</td>
                        <td>{{$siswa->jenis_kelas}}</td>
                        <td>{{$siswa->phone}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td>
                            <a href="/siswa/edit/{{$siswa->id}}" class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a>
                            <a href="/siswa/delete/{{$siswa->id}}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Apakah anda yakin akan menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer_chart')
<script>
        $(document).ready( function () {
            $('.dataTables').DataTable();
        });

        Highcharts.chart('chart_batang', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Data Siswa'
            },
            subtitle: {
                text: 'Berdasarkan jenis kelas'
            },
            xAxis: {
                categories: {!!json_encode($jenis_kelas)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Siswa</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Jumlah Siswa',
                data: {!!json_encode($data)!!}

            }]
        });

        Highcharts.chart('chart_pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Laporan Data Siswa'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: {!!json_encode($jkelamin)!!}
            }]
        });
            
    </script>
@endsection