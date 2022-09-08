@includeif("front_end.layout.header")
<form action="{{ route('delivery.store') }}" method="post">

  @csrf
<div class="card-body table-responsive p-0">
  <h2>Adding New Delivery Address </h2>
        <div class="col-sm-6">
      
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone"  class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Address</label>
            <select  class="form-control" name="address">
              <option value="0">Select A acountry</option>
              <option >Afghanistan</option>
              <option >Iran</option>
              <option >India</option>
              <option >US</option>
            </select>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city"  class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>pincode</label>
            <input type="text" name="pincode"  class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            
            <input type="submit" value="Save" class="btn btn-primary">
          </div>
        </div>
      </div>
 </form>
@includeIf('front_end.layout.footer')
