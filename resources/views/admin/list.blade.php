@extends('layouts\layout')
@section('title','admin list')
  
    
@section('content_title')
   

@endsection

@section('content_header')
  Admin List

 

  
    
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
        <th>Email</th>
        <th>Type</th>
        <th>Photo</th>
        <th>Active</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($admins as $item)
        <tr>
          <td>{{ $x++ }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>{{ $item->type==1?'Admin':'Subadmin' }}</td>
          <td>
            @if(isset($item->photo))
                     <a href="{{asset($item->photo)  }}"><img src="{{ asset($item->photo) }}" style="width:60px;border-radius:25px" alt="Admin Image"></a>
            @endif
          
          
          </td>
          <td>{{ $item->status==1?'Yes':'No' }}</td>
          <td class="edit"><a href="#adminEditModal{{ $item->id }}" data-toggle="modal"><span class="fa fa-edit"></span></a></td>
          
          <td class="delete">
            <a href="{{ route('admin.delete', ['id'=>$item->id] ) }}" class="adminConformDelete" ><span class="fa fa-trash"></span></a>
          {{--  <a class="btn btn-info" href="{{ route('admin.delete',['id'=>$item->id] ) }}" >Yes</a>  --}}
           
          </td>
        </tr>

            {{--  start edit model  --}}
         <div class="modal" id="adminEditModal{{ $item->id }}">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 edit admin
                 <span class="close" data-dismiss="modal">&times;</span>

               </div>
               <div class="modal-body">
                 <form action="{{ route('admin.updateDetail',['id'=>$item->id])}}" method="post" enctype="multipart/form-data" id="adminEditForm">
                     @csrf
                 <div class="row">
                   <div class="input-group">
                    
                     <div class="input-group-prepend">
                      <Label class="input-group-text">name</Label>

                     </div>
                     <input type="text" name="name" value="{{ $item->name }}" class="form-control">
                   </div>
                   <div class="input-group">
                    
                    <div class="input-group-prepend">
                     <Label class="input-group-text">phone</Label>

                    </div>
                    <input type="text" name="phone" value="{{ $item->phone }}" class="form-control">
                  </div>
                   <div class="input-group">
                    
                      <div class="input-group-prepend">
                         <Label class="input-group-text">email</Label>

                      </div>
                       <input type="text" name="email" value="{{ $item->email }}" class="form-control">
                   </div>

                  <div class="input-group">
                    
                    <div class="input-group-prepend">
                       <Label class="input-group-text">type</Label>

                    </div>
                    <select class="form-control" name="type">
                      <option value="1" @if ($item->type==1){{ 'selected' }} @endif>Admin</option>
                      <option value="2" @if ($item->type==2){{ 'selected' }} @endif>Sub Admin</option>
                    </select>
                  </div>

                  <div class="input-group">
                    <div class="input-group-prepend">
                       <Label class="input-group-text">Status</Label>
                    </div>
                    <select class="form-control" name="status">
                      <option value="1" @if ($item->status==1){{ 'selected' }} @endif>Active</option>
                      <option value="0" @if ($item->status==0){{ 'selected' }} @endif>Inactive</option>
                    </select>
                  </div>

                 

               

                 <div class="input-group">
                  <div class="input-group-prepend">
                     <Label class="input-group-text">photo</Label>
                  </div>
                  <input type="file" name="photo" class="form-control">
                  <img src="{{asset($item->photo)}}" alt="Admin image" style="width:40px;">
                </div>

               </div>

                </form>

               </div>

               <div class="modal-footer">
                <button class="btn btn-info" data-dismiss="modal">Close</button>
                 <input type="submit" form="adminEditForm" value="Save Change" class="btn btn-info">
               </div>

             </div>

           </div>

         </div>

         {{--   end edit model  --}}

         {{--  start delete modal  --}}
         <div class="modal" id="adminDeleteModal{{ $item->id }}">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <button class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                 Are you sure want to delete?
               </div>
               <div class="modal-footer">
                 <a class="btn btn-info" href="{{ route('admin.delete',['id'=>$item->id] ) }}" >Yes</a>
                 <button class="btn btn-info" data-toggle="modal" data-dismiss="modal">No</button>
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
// This script for datatable
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
