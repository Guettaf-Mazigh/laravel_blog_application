@extends('admin.dashboard')
@section('content')
  <table class="table">
    <thead>
      <tr>
        <th scope="col">UserName</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $request)
        <tr>
          <td>{{$request->user->username}}</td>
          <td>{{$request->user->email}}</td>
          <td>{{$request->created_at}}</td>
          <td>
            <div class="d-flex gap-2">
              <form action="#" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Show Activities</button>
              </form>
             
            </div>
          </td>
        </tr>
        @endforeach
      
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="http://catdad.github.io/tiny.cdn/lib/toast/1.0.0/toast.min.js"></script>
  @session('successDelete')
      <script>
          toast.success("{{session('successDelete')}}");
      </script>
  @endsession
  @session('successAccept')
      <script>
          toast.success("{{session('successAccept')}}");
      </script>
  @endsession
  @session('error')
      <script>
          toast.error("{{session('error')}}");
      </script>
  @endsession
@endsection