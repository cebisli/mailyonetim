@extends('master')
@section('title')
    Müşteri Düzenleme
@endsection

@section('css')
@endsection

@section('main')

<!--start page wrapper -->

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Müşteri Düzenle</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Müşteri Düzenle</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="row">
    <div class="col">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @elseif(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <form action="{{route('musteri_duzenle_post', $musteri->id)}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 text-uppercase">Müşteri Düzenle</h6>
                        <hr/>
                    <input class="form-control form-control-lg mb-3" type="text" value="{{$musteri->adsoyad}}" placeholder="Müşteri Adı / Firma Adı" name="adsoyad" aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-3" type="email" value="{{$musteri->mail}}" placeholder="email" name="mail" aria-label=".form-control-lg example">
                    <input class="form-control form-control-lg mb-3" type="text" value="{{$musteri->telefon}}" placeholder="telefon" name="telefon" aria-label=".form-control-lg example">
                    <input class="btn btn-success mb-3" type="submit" value="Müşteri Düzenle" aria-label=".form-control-lg example">
                </div>
            </div>
        </form>
    </div>
</div>


@endsection

@section('js')
@endsection
