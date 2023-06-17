@extends('master')
@section('title')
    Gönderilen Mailler
@endsection

@section('css')
    <link href="{{asset('/')}}assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section('main')

    <!--start page wrapper -->

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Gönderilen Mailler</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Gönderilen Mailler</li>
                </ol>
            </nav>
        </div>
    </div>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @elseif(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Müsteri Adı</th>
                        <th>Müsteri Maili</th>
                        <th>Konu</th>
                        <th>Göndeirilme Tarihi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($gonderileMailler)
                        @foreach ($gonderileMailler as $mail)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$mail->musteri[0]->adsoyad}} </td>
                                <td> {{$mail->musteri[0]->mail}} </td>
                                <td> {{$mail->baslik}} </td>
                                <td> {{$mail->created_at}} </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script src="{{asset('/')}}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
@endsection
