@includeif("front_end.layout.header")
<form action="{{ route('delivery.update',['id'=>$delivery->id]) }}" method="post">
 @method('put')
  @csrf
<div class="card-body table-responsive p-0">
  <h2>Edit Delivery Address </h2>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $delivery->phone }}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Address</label>
            <select  class="form-control" name="address">
              <option value="0">Select A acountry</option>
              <option @if($delivery->address=='Afghanistan'){{ 'selected' }}@endif>Afghanistan</option>
              <option @if($delivery->address=='Iran'){{ 'selected' }}@endif>Iran</option>
              <option @if($delivery->address=='India'){{ 'selected' }}@endif>India</option>
              <option @if($delivery->address=='US'){{ 'selected' }}@endif>US</option>
            </select>
          </div>
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" value="{{ $delivery->city}}" class="form-control" placeholder="Enter ...">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" value="{{ $delivery->state}}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>pincode</label>
            <input type="text" name="pincode" value="{{ $delivery->pincode}}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            
            <input type="submit" value="Save Changes" class="btn btn-primary">
          </div>
        </div>
      </div>
 </form>
@includeIf('front_end.layout.footer')
