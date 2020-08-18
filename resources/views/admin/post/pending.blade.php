@extends('layouts.backend.app')

@section('title', 'All Posts')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush


@section('content')

<div class="container">
    <div class="row">
        
    </div>
    @if (session()->has('success'))
          <div class="alert alert-success m-3" role="alert">
              {{ session()->get('success') }}
          </div>
    @endif
    <div class="row">
        <div class="col-md-12" style="margin: 0; padding: 0;width:80%">
            <h2>Pending News <span class="badge bg-primary">{{ $posts->count()  }}</span></h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" style="border: 2px solid cadetblue; padding: 25px;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>View Count</i></th>
                            <th>Is Approved</th>
                            <th>Show</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($posts as $key=>$post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ str_limit($post->title, 15) }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->view_count }}</td>
                            <td>
                                @if ($post->is_approved == true)
                                    Approved
                                @else 
                                    Pending
                                @endif
                            </td>
                            <td><a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                Click Here
</a></td>
                           
                            <td>{{ $post->created_at->toFormattedDateString()  }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                                    Edit
                                </a>

<button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
    Delete
</button>

<form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
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
</div>
<!-- #END# Exportable Table -->
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
function deletePost(id){
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