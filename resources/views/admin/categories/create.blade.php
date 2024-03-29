@extends('layouts.app')

@section('title', 'Creación de nueva categoría')

@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registrar nueva categoría</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre de la categoría</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="control-label">Representación de la categoría</label>
                    <input type="file" name="image">
                </div>
            </div>
                <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description') }}</textarea>

                <button style="margin-left: 34%" class="btn btn-success">Registrar nueva categoría</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
