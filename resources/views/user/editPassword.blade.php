@extends('dashboard')
@section('header')
<header class="masthead" style="background-image: url({{asset('pages/assets/img/home-bg.jpg')}})">
     <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
             <div class="col-md-10 col-lg-8 col-xl-7">
                 <div class="site-heading">
                     <h1>Edit Password</h1>
                     <span class="subheading">Update your Password.</span>
                 </div>
             </div>
         </div>
     </div>
 </header>
@endsection

@section('content')
<div class="container-xl px-4 mt-4">
  <hr class="mt-0 mb-4">
  <div class="row">
      <div class="col-xl-4">
            </div>
            <div class="col-12"> 
                <div class="card mb-4" style="width: 100%;"> 
                    <div class="card-header">Password Up</div>
                    <div class="card-body">

                        <form method="POST" action="{{route('update.password')}}">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Enter your password">
                            </div>
                            
                            <div class="mb-3">
                                <label class="small mb-1" for="new_password">New Password</label>
                                <input class="form-control" id="new_password" name="new_password" type="password" placeholder="Enter the new password">
                            </div>

                            <div class="mb-3">
                                <label class="small mb-1" for="new_password_confirmation">Confirm Password</label>
                                <input class="form-control" id="new_password_confirmation" name="new_password_confirmation" type="password" placeholder="Confirm the new password">
                            </div>
                            @if($errors->any())
                                <p class="text-danger">{{$errors->first()}}</p>
                            @endif
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
  </div>
</div>


@endsection