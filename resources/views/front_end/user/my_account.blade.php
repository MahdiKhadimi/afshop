@includeif("front_end.layout.header")
 @include('partial.message.success')
 @include('partial.message.error')
        <div class="card-body table-responsive p-0" style="min-height: 400px;">
          <h2>Your acount information </h2>
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Pin Code</th>
                <th>State</th>
                <th>Phone</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->pincode }}</td>
                <td>{{ $user->state }}</td>
                <td>{{ $user->phone }}</td>
              </tr>
            </tbody>
            <tr>
              <td colspan="8" ><a href="{{ route('user.edit_account') }}">Edit Account</a></td>  
              <td colspan="8" ><a href="{{ route('user.edit_password') }}">Change Password</a></td>  
            </tr>     
          </table>
          
        </div>
       
@includeIf('front_end.layout.footer')
