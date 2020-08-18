@extends('layouts.backend.app')

@section('title', 'Category')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container">
    <div class="row">
        <a class="btn btn-primary waves-effect" href="{{ route('admin.category.create') }}">
            <span>Add New Category</span>
        </a>
    </div>
    @if (session()->has('success'))
          <div class="alert alert-success m-3" role="alert">
              {{ session()->get('success') }}
          </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <h2>Categories  <span class="badge bg-primary">{{ $categories->count()  }}</span></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="border: 2px solid cadetblue; padding: 25px;width:80%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $key=>$category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td class="text-center">
                                 <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info waves-effect">
                                    Edit
                                </a>
                  
                         <button class="btn btn-danger" type="button" onclick="deleteCategory({{ $category->id }})">
                                    Delete
                                </button>
                  
                                <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                        
                                </form> 
                  
                  
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
              </div>
              {{  $categories->links()}}
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
       function deleteCategory(id){
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