@extends('layouts.backend.app')

@section('title', 'Category')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container">
    <div class="row">
        <a class="btn btn-primary btn-lg" href="{{ route('admin.dashboard') }}">
           Back
        </a>
    </div>
    @if (session()->has('success'))
          <div class="alert alert-success m-3" role="alert">
              {{ session()->get('success') }}
          </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <h2>All Author list  <span class="badge bg-primary">{{ $authors->count()  }}</span></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="border: 2px solid cadetblue; padding: 25px;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Member Entry</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($authors as $key=>$author)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->created_at->toFormattedDateString() }}</td>
                            <td class="text-center">
                                 
                                <button class="btn btn-danger waves-effect" type="button" onclick="deleteAuthor({{ $author->id }})">
                                    <i class="material-icons">delete</i>
                                </button>
                  
                                <form id="delete-form-{{ $author->id }}" action="{{ route('admin.author.destroy',$author->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                    
                                </form>
                  
                  
                  
                  
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
              </div>
        </div>
    </div>
</div>

@endsection

@push('js')
       <!-- Jquery DataTable Plugin Js -->
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>
   
       <!-- Custom Js -->
       <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>

       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
       <script type="text/javascript">
       function deleteAuthor(id){
           const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
            
                } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
                ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
                }
            })
       }	
   
       </script>
@endpush