@extends('layout.master')

@section('content')
    <div style="margin-top:10px;" align="center">
        <h1>List File</h1>
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
                        <form action="/submission/create" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <button type="button" class="btn btn-sm btn-primary" id="add">Tambah</button>
                                </div>

                                <div id="area">
                                    <div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file_path[]" required>
                                                <label class="custom-file-label">Choose file...</label>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-danger btn-sm hapus">x</button>
                                            </div>
                                        </div>
                                        <hr>
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
            <table class="table table-hover">
                <thead>
                    <th width="10%">ID</th>
                    <th>File</th>
                    <th width="10%">Aksi</th>
                </thead>
                <tbody>
                    @foreach($submission_list as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->file_path}}</td>
                        <td>
                            <a href="{{ URL::to('/') }}/files/{{$list->file_path}}" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('submission_js')
<script>
    $(document).ready(function() {
        var btn_add = $('#add');
        var area = $('#area');

        $(btn_add).click(function(e){ //on add input button click
            e.preventDefault();
            $(area).append('<div><div class="input-group">\
                                <div class="custom-file">\
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="file_path[]" required>\
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>\
                                </div>\
                                <div class="input-group-append">\
                                    <button class="btn btn-danger btn-sm hapus">x</button>\
                                </div>\
                            </div><hr></div>');
        });

        $(area).on("click",".hapus", function(e){ //user click on remove text
            e.preventDefault(); 
            $(this).parent().parent().parent('div').remove();
        })
    })
</script>
@endsection