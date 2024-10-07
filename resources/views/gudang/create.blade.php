@extends('app')
@section('title', 'Tambah Data Gudang')
@section('content')
<div class="container">
     <div class="card">
          <div class="card-header">
               <h3 class="text-center">Tambah Data Gudang</h3>
          </div>

          <div class="card-body">
               @if ($errors->any())
               <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                         @endforeach
                    </ul>
               </div>
               @endif

               <form class="form-horizontal" action="{{ route('gudang.store') }}" method="POST">
                    @csrf
                    @include('gudang.form')
               </form>
          </div>
     </div>
</div>
@endsection