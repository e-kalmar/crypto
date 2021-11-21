@extends('layouts/app')
    @section('content')

        <div class="container-fluid p-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Profile : {{$user->name}}</h3>
                </div>
                <form action="{{route('user.profile.update', $user)}}" method="post">
                    @csrf
                    @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" name="telephone" id="telephone" class="form-control {{$errors->has('telephone') ? 'is-invalid' : ''}}" value="{{$user->telephone}}">
                        @error('telephone')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>



        </div>
        
    @endsection
