@extends('app')
@section('title', 'Gudang Warehouse')
@section('content')
     <div class="container">
          <div class="card">
               <div class="card-header">
                    <h3 class="text-center">Gudang Warehouse MSIB</h3>
               </div>

               <div class="card-body">
                    <a href="gudang/create" class="btn btn-primary">Tambah</a>
                    <hr>
                    @if (session('success'))
                         <div class="alert alert-success">
                              {{ session('success') }}
                              <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                    @endif
                    <div class="table-responsive">
                         <table class="table table-bordered table-striped" id="gudang-table">
                              <thead>
                                   <tr>
                                        <th>ID</th>
                                        <th>Nama Gudang</th>
                                        <th>Lokasi Gudang</th>
                                        <th>Kapasitas</th>
                                        <th>Status</th>
                                        <th>Opening Hour</th>
                                        <th>Closing Hour</th>
                                        <th width="70">#</th>
                                   </tr>
                              </thead>
                         </table>
                    </div>
               </div>
               <div class="card-footer text-center m-0 p-0">
                    <p class="m-0">createdBy @ Muhammad Fakhruddin Fu'ad</p>
                    <a href="https://instagram.com/mfakhruddinfuad" class="btn btn-link" target="_blank" style="color: red;">
                         <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://github.com/mff29" class="btn btn-link" target="_blank" style="color: black;">
                         <i class="bi bi-github"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/muhammad-fakhruddin-fu-ad-b6850b23b/" class="btn btn-link" target="_blank" style="color: blue;">
                         <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://wa.me/6285900228435" class="btn btn-link" target="_blank" style="color: green;">
                         <i class="bi bi-whatsapp"></i>
                    </a>
               </div>
          </div>
     </div>
@endsection

@push('scripts')
<script type="text/javascript">
     $(function () {
          $('#gudang-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: "/gudang",
               columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'location', name: 'location'},
                    {data: 'capacity', name: 'capacity'},
                    {data: 'status', name: 'status'},
                    {data: 'opening_hour', name: 'opening_hour'},
                    {data: 'closing_hour', name: 'closing_hour'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
               ]
          });
     });

     function alert_delete(id) {
          var dataId = id;
          Swal.fire({
               title: 'Konfirmasi',
               text: "Apakah Anda yakin ingin menghapus data ini?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#d33',
               cancelButtonColor: '#3085d6',
               confirmButtonText: 'Hapus',
               cancelButtonText: 'Batal'
          }).then((result) => {
               if (result.isConfirmed) {
                    $.ajax({
                         type: "DELETE",
                         data:{ _token: '{{ csrf_token() }}' },
                         url: "/gudang/" + dataId,
                         success: function(response) {
                         Swal.fire({
                              title: 'Sukses',
                              text: response.message,
                              icon: 'success'
                         }).then((result) => {
                              if(result.isConfirmed){
                                   location.reload();
                              }
                         });
                         },
                         error: function(error) {
                         Swal.fire({
                              title: 'Error',
                              text: "Terjadi kesalahan saat menghapus data.",
                              icon: 'error'
                         });
                         }
                    });
               }
          });
     }
</script>

@endpush