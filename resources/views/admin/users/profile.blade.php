<x-admin-master>
    @section('content')
        <h1>User Profile : {{$user->name}}</h1>

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post">
                    @csrf
                    @method('PUT')

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

                </form>
            </div>



        </div>
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All users</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>License number</th>
                                <th>Vin</th>
                                <th>Year</th>
                                <th>Model</th>
                                <th>Manufacturer</th>
                                <th>Created at</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($user->cars as $car)

                                <tr>
                                    <td>{{$car->id}}</td>
                                    <td>{{$car->user->name}}</td>
                                    <td>{{$car->license_number}}</td>
                                    <td>{{$car->vin}}</td>
                                    <td>{{$car->year}}</td>
                                    <td>{{$car->model}}</td>
                                    <td>{{$car->manufacturer}}</td>
                                    <td>{{$car->created_at->diffForHumans()}}</td>

                                    <td>
                                        <form action="{{route('car.destroy',$car->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                    <td><a href="{{route('car.edit', $car->id)}}" class="btn btn-success">Edit</a> </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    @endsection
</x-admin-master>