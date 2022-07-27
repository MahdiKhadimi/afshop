@if(session('error'))
<div class="alert alert-warning">
  {{ session('error') }}
  <button class="close" data-dismiss="alert">&times</button>
</div>

@endif

    