@extends('layouts\layout')
@section('title','slide_show list')
  
    
@section('content_title')
   

@endsection

@section('content_header')
 <a href="{{ route('slide_show.create')}}" class="btn btn-info " style="float:right;">Add New</a>
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
        <th>Title </th>
        <th>Text</th>
        <th>Image</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($slide_shows as $item)
        <tr>
          <td>{{ $x++ }}</td>
          <td>{{ $item->title }}</td>
          <td>{{ $item->text }}</td>
          <td>
            <a href="{{ asset($item->image) }}" target="_blank">
              <img src="{{ $item->image }}" alt="slide_show image" style="width:40px;">
            </a>
          </td>
        
          <td class="edit"><a href="{{ route('slide_show.edit',['id'=>$item->id]) }}"><span class="fa fa-edit"></span></a></td>
          <td class="delete"><a href="#slide_showDeleteModal{{ $item->id }}" data-toggle="modal"><span class="fa fa-trash"></span></a></td>
        </tr>          
         {{--  start delete modal  --}}
         <div class="modal" id="slide_showDeleteModal{{ $item->id }}">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                 Do you want to delete?
               </div>
               <div class="modal-footer">
                 <a class="btn btn-info" href="{{ route('slide_show.delete',['id'=>$item->id] ) }}" >Yes</a>
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
      "responsive": true, "lengthChange": true, "autoWidth": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
</script>
    
@endsection
