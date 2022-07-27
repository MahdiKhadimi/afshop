<div class="row list-view-sorting clearfix">
    <div class="col-md-2 col-sm-2 list-view">
      <a href="javascript:;"><i class="fa fa-th-large"></i></a>
      <a href="javascript:;"><i class="fa fa-th-list"></i></a>
    </div>

    <div class="col-md-10 col-sm-10">
      <div class="pull-right">
        <label class="control-label">Show:</label>
        <select class="form-control input-sm">
          <option value="#?limit=24" selected="selected">24</option>
          <option value="#?limit=25">25</option>
          <option value="#?limit=50">50</option>
          <option value="#?limit=75">75</option>
          <option value="#?limit=100">100</option>
        </select>
      </div>

      <div class="pull-right">
        <label class="control-label">Sort&nbsp;By:</label>
        <select class="form-control input-sm">
          <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
          <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
          <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
          <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
          <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
          <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
          <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
          <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
          <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
        </select>
      </div>
    </div>
  </div>
  