@extends('layouts\layout')
@section('title','brand list')
  
    
@section('content_title')
   

@endsection

@section('content_header')
 <a href="{{ route('brand.create')}}" class="btn btn-info " style="float:right;">Add New</a>
@endsection

@section('content_body')

<div class="card">
  <div class="card-header">
   
  </div>
  {{--  <!-- /.card-header -->  --}}
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      @php
          $x=1;
      @endphp
      <thead>
      <tr>
        <th>No.</th>
        <th>name</th>
        <th>status</th>
   
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($brands as $item)
        <tr>
          <td>{{ $x++ }}</td>
          <td>{{ $item->name }}</td>
          <td>
            @if($item->status==1)
             <a href="javascript:void(0)" id="brand-{{ $item->id }}" brand_id="{{ $item->id }}" class="brandStatus" >
                <i class="fas fa-toggle-on" aria-hidden="true" status="active"></i>
              </a> 
             @else
             <a href="javascript:void(0)" id="brand-{{ $item->id }}" brand_id="{{ $item->id }}" class="brandStatus">
               <i class="fas fa-toggle-off" aria-hidden="true" status="inactive"></i> 
             </a> 
             @endif
          </td>
          <td class="edit"><a href="{{ route('brand.edit',['id'=>$item->id]) }}"><span class="fa fa-edit"></span></a></td>
          <td class="delete"><a href="#brandDeleteModal{{ $item->id }}" data-toggle="modal"><span class="fa fa-trash"></span></a></td>
        </tr>          
         {{--  start delete modal  --}}
         <div class="modal" id="brandDeleteModal{{ $item->id }}">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                 Do you want to delete?
               </div>
               <div class="modal-footer">
                 <a class="btn btn-info" href="{{ route('brand.delete',['id'=>$item->id] ) }}" >Yes</a>
                 <button class="btn btn-info " data-dismiss="modal">No</button>
               </div>
             </div>
           </div>
         </div>
         {{--  end delete modal  --}}
         

        @endforeach
     
     
    
     

      </tbody>
      <tfoot>
     
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->


   
   


@endsection
@section('script')
// This script is for datatable
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
</script>
    
@endsection
