<div class="row list-view-sorting clearfix">
    <div class="col-md-2 col-sm-2 list-view">
      <a href="javascript:;"><i class="fa fa-th-large"></i></a>
      <a href="javascript:;"><i class="fa fa-th-list"></i></a>
    </div>

    <div class="col-md-10 col-sm-10">
      <div class="pull-right">
        <label class="control-label">Show:</label>
        <select class="form-control input-sm">
          <option >10</option>
          @for($i=25;$i<=100;$i+=25)
            <option>{{ $i }}</option>
          @endfor  
        </select>
      </div>

      
      <div class="pull-right">
        <input type="hidden" value="{{ $section }}" id="section">
        <input type="hidden" value="{{ $category }}" id="category">
        
        <label class="control-label">Sort&nbsp;By:</label>
        <select class="form-control input-sm" id="sortProduct">
          @foreach ($show_sort as $item)
            <option >{{ $item }}</option>     
          @endforeach
        </select>
      </div>
    </div>
  </div>
  