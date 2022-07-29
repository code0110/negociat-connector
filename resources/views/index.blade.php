@extends('core/base::layouts.master')

@section('content')
    <div class="card-body">
        <h1 class="page-title">Negociat Connector</h1>
            <form action="{{ route('negociat-connector.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Products import Data</button>
            </form>
            <br>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Negociat Update stocks Data</button>
            </form>
  
            <table class="table table-striped table-bordered" id="example" style="width:100%">
                <tr>
                    <th colspan="3">
                        Lista produse
                        <a class="btn btn-warning float-end" href="{{ route('negociat-connector.export') }}">Export product data</a>
                    </th>
                    <th colspan="3">                        
                        <a class="btn btn-warning float-end" href="">Actualizare Preturi</a>
                    </th>
                    <th colspan="3">                        
                        <a class="btn btn-warning float-end" href="">Actualizare stoc</a>
                    </th>
                </tr>
                <tr>
                    <th>ID_N</th>
                    <th>Grupa</th>
                    <th>Nume produs</th>
                    <th>Cod</th>
                    <th>UM</th>
                    <th>Valuta</th>
                    <th>PL</th>
                    <th>PVN</th>
                    <th>PLN</th>
                    <th>Stoc</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id_n }}</td>
                    <td>{{ $product->grupa }}</td>
                    <td>{{ $product->nume_produs }}</td>
                    <td>{{ $product->cod }}</td>
                    <td>{{ $product->um }}</td>
                    <td>{{ $product->valuta }}</td>
                    <td>{{ $product->pret_lista }}</td>
                    <td>{{$product->pret_neg}}</td>
                    <td>{{$product->pret_lista_neg}}</td>
                    <td>{{$product->stoc}}</td>
                </tr>
                @endforeach
            </table>


        </div>
@stop
