@includeif("front_end.layout.header")
<form action="{{ route('user.update_account') }}" method="post">
  @method('put')
  @csrf
<div class="card-body table-responsive p-0">
  <h2>Edit Accunt</h2>
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>Address</label>
            <select  class="form-control" name="address">
              <option value="0">Select  acountry</option>
              <option @if($user->address=='Afghanistan'){{ 'selected' }}@endif>Afghanistan</option>
              <option @if($user->address=='Iran'){{ 'selected' }}@endif>Iran</option>
              <option @if($user->address=='India'){{ 'selected' }}@endif>India</option>
              <option @if($user->address=='US'){{ 'selected' }}@endif>US</option>
            </select>
          </div>

        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>City</label>
            <input type="text" name="city" value="{{ $user->city}}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>State</label>
            <input type="text" name="state" value="{{ $user->state}}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            <label>pincode</label>
            <input type="text" name="pincode" value="{{ $user->pincode}}" class="form-control" placeholder="Enter ...">
          </div>
          <div class="form-group">
            
            <input type="submit" value="Save Change" class="btn btn-primary">
          </div>
        </div>
      </div>
 </form>
@includeIf('front_end.layout.footer')
