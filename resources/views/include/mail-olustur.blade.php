@extends('master')
@section('title')
    Toplu Mail Tanımlama
@endsection

@section('css')
@endsection

@section('main')

<!--start page wrapper -->

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Yeni Mail Oluştur</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Yeni Mail Oluştur</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                {{-- <div class="alert alert-danger">{{$error}}</div> --}}
            @endforeach
        @elseif(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('mail_olustur_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Yeni Mail Oluştur</h6>
                        <hr/>
                    <select class="form-control form-control-lg mb-3" name="musteri_id" aria-label=".form-control-lg example">
                        @foreach($musteriler as $musteri)
                            <option value="{{$musteri->id}}">{{$musteri->adsoyad}}</option>
                        @endforeach
                    </select>
                    <input class="form-control form-control-lg mb-3" type="text" name="baslik" aria-label=".form-control-lg example">
                    <textarea id="mytextarea" name="metin"></textarea>
                    <input class="btn btn-success mb-3" type="submit" value="Yeni Mail Oluştur" aria-label=".form-control-lg example">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('js')
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>
@endsection
