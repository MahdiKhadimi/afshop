@extends('layouts\layout')
@section('title','category list')
  
    
@section('content_title')
   

@endsection

@section('content_header')
 <a href="{{ route("category.create") }}" class="btn btn-info"> Add Category</a>

 

  
    
@endsection

@section('content_body')


<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Category List</h3>
      </div>
      {{--  <!-- ./card-header -->  --}}
      <div class="card-body p-0">
        <table id="example1" class="table table-hover table-bordered table-responsive ">
          <caption>{{ $categories->links()}}</caption>
          @php
          $x=1;
      @endphp
      
        <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Section</th>
        <th>Url</th>
        <th>Discount</th>
        <th>Photo</th>
        <th>Status</th>
        <th class="edit">Edit</th>
        <th class="delete">Delete</th>
      </tr>
      </thead>
          <tbody>
          @php
              $x=1;
          @endphp  
          @foreach ($categories as $item)
                
          
           
            <tr data-widget="expandable-table" aria-expanded="false">
              <td>{{ $x++ }}</td>
              <td>{{ $item->name }}</td>
              <td>
                @foreach ($item->sections as $show)
                   <span>{{ $show->name }},</span>
                @endforeach
              </td>            
              <td>{{ $item->url }}</td>
              <td>{{ $item->discount }}</td>
              <td>
               
                  @foreach ($item->image as $showPicture)
                  <a href="{{asset($showPicture->picture)  }}"><img src="{{ asset($showPicture->picture) }}" style="width:60px;border-radius:25px" alt="category Image"></a>
                    
                      
                  @endforeach
            
            
              
              </td>
              <td>{{ $item->status==1?'Active':'Inactive' }}</td>
              <td class="edit"><a href="{{ route('category.edit',['id'=>$item->id]) }}" ><span class="fa fa-edit"></span></a></td>
              <td class="delete"><a href="#categoryDeleteModal{{ $item->id }}" data-toggle="modal"><span class="fa fa-trash"></span></a></td>
           
             
            </tr>
            <tr class="expandable-body">
              <td>
                <div class="p-0">
                  <table class="table table-hover">
                    <tbody>
                   
                        
                    
                      <tr data-widget="expandable-table" aria-expanded="false">
                          <tr>
                           
                            <th>Meta Title</th>
                            <th>Meta Keywords</th>
                            <th>Meta Description</th>
                            <th>Description</th>
                          </tr>
                          <tr>
                            <td >{{ $item->meta_title }}</td>
                            <td>{{ $item->meta_keywords }}</td>
                            <td>{{ $item->meta_description }}</td>
                            <td>{{ $item->description }}</td>
                          </tr>
                      </tr>
                 
                                          
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          
          
          
          
          
          
          
          
          </tbody>
          {{--  start delete modal  --}}
         <div class="modal" id="categoryDeleteModal{{ $item->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                Are you want to delete?
              </div>
              <div class="modal-footer">
                <a class="btn btn-info" href="{{ route('category.delete',['id'=>$item->id] ) }}" >Yes</a>
                <button class="btn btn-info" data-toggle="modal" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
        {{--  end delete modal  --}}
        
        @endforeach
       
     </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>







   
   


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
