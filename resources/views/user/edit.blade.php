@extends('dashboard')
@section('header')
<header class="masthead" style="background-image: url({{asset('pages/assets/img/home-bg.jpg')}})">
     <div class="container position-relative px-4 px-lg-5">
         <div class="row gx-4 gx-lg-5 justify-content-center">
             <div class="col-md-10 col-lg-8 col-xl-7">
                 <div class="site-heading">
                     <h1>Edit Profile</h1>
                     <span class="subheading">Update your profile information, such as your name, location, email, phone number, and role.</span>
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
          <!-- Profile picture card-->
        <form action="{{route('store.avatar')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" name="avatar" accept="image/*" class="form-control mb-2">
                    @if($errors->any())
                        <p class="text-danger">{{$errors->first()}}</p>
                    @endif
                    <button class="btn btn-primary" type="submit">Upload new image</button>
                </div>
            </div>
        </form>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">

                        <form method="POST" action="{{route("update.profile")}}">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="username">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username" value="{{$userData->username}}">
                            </div>
                            
                            <div class="row gx-3 mb-3">
                                
                                <!-- Form Group (location)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="location">Location</label>
                                    <input class="form-control" id="location" name="location" type="text" placeholder="Enter your location" value="{{$userData->location}}">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="email">Email address</label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email address" value="{{$userData->email}}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="phone">Phone number</label>
                                    <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter your phone number" value="{{$userData->phone}}">
                                </div>
                                <!-- Form Group (Role)-->
                                @if($userData->role !== 'admin')
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="role">Role</label>
                                        <select class="form-control" id="role" name="role">
                                            @if($userData->role === 'lector')
                                                <option value="lector" selected>Lector</option>
                                                <option value="author">Author</option>
                                            @elseif($userData->role === 'author')
                                                <option value="author" selected>Author</option>
                                            @endif
                                        </select>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Save changes button-->
                            <button type="submit" class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
  </div>
</div>

@endsection