<form action="{{ url('product/product_list_request') }}" id="productSortForm" method="post">
   @csrf
  <div class="row list-view-sorting clearfix">
    <div class="col-md-2 col-sm-2 list-view">
      <a href="javascript:;"><i class="fa fa-th-large"></i></a>
      <a href="javascript:;"><i class="fa fa-th-list"></i></a>
    </div>

    <div class="col-md-10 col-sm-10">
      <div class="pull-right">
        <label class="control-label">Show:</label>
        <select class="form-control input-sm" name="show" id="showProduct">
          <option @if($old_show==10){{ 'selected' }}@endif>10</option>
          @for($i=25;$i<=100;$i+=25)
            <option @if($old_show==$i) {{ 'selected' }}@endif>{{ $i }}</option>
          @endfor  
        </select>
      </div>

      
      <div class="pull-right">
        <input type="hidden" value="{{ $section }}" name="section">
        <input type="hidden" value="{{ $category }}" name="category">
        
        <label class="control-label">Sort&nbsp;By:</label>
        <select class="form-control input-sm" name="sort" id="sortProduct">
          @foreach ($show_sort as $item)
            <option @if($old_sort==$item){{ 'selected' }} @endif >{{ $item }}</option>     
          @endforeach
        </select>
      </div>
    </div>
  </div>
  