@extends('layouts.app')

@section('title', 'Creación de productos')

@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('/img/puesto.jpg') }}');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registrar nuevo producto</h2>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('/admin/products') }}">
                {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio</label>
                        <input type="number" step="0.01" min="1" class="form-control" name="price" value="{{ old('price') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                <div class="form-group label-floating">
                        <label class="control-label">Descripción</label>
                        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group label-floating">
                        <label class="control-label">Categoría del producto</label>
                       <select class="form-control" name="category_id">
                           <option value="0">General</option>
                           @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                       </select>
                    </div>
                </div>
            </div>


                <textarea class="form-control" placeholder="Descripción a detalle del producto" rows="5" name="long_description">{{ old('long_description') }}</textarea>

                <button style="margin-left: 34%" class="btn btn-success">Registrar nuevo producto</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-danger">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
