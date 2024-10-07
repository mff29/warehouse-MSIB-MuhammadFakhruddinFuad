@extends('app')
@section('title', 'Edit Data Gudang')
@section('content')
<div class="container">
     <div class="card">
          <div class="card-header">
               <h3 class="text-center">Edit Data Gudang</h3>
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

               <form class="form-horizontal" action="{{ route('gudang.update', $gudang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('gudang.form', ['gudang' => $gudang])
               </form>
          </div>
     </div>
</div>
@endsection
