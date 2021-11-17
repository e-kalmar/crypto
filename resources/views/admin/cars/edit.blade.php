<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <h1 class="text-black-50">Edit car!</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit car!</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('car.update', $car->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user">User Name</label>
                                    <input type="text" id="user" name="user" class="form-control " value="{{$car->user->name}}" readonly>

                                </div>

                                <div class="form-group">
                                    <label for="license_number">License Number</label>
                                    <input type="text" id="license_number" name="license_number" class="form-control  {{$errors->has('license_number') ? 'is-invalid' : ''}}" value="{{$car->license_number}}">
                                    @error('license_number')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="vin">Vin</label>
                                    <input type="text" id="vin" name="vin" class="form-control  {{$errors->has('vin') ? 'is-invalid' : ''}}" value="{{$car->vin}}">
                                    @error('vin')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="text" id="year" name="year" class="form-control  {{$errors->has('year') ? 'is-invalid' : ''}}" value="{{$car->year}}">
                                    @error('year')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="model">Model</label>
                                    <input type="text" id="model" name="model" class="form-control  {{$errors->has('model') ? 'is-invalid' : ''}}" value="{{$car->model}}">
                                    @error('model')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="manufacturer">Manufacturer</label>
                                    <input type="text" id="manufacturer" name="manufacturer" class="form-control  {{$errors->has('manufacturer') ? 'is-invalid' : ''}}" value="{{$car->manufacturer}}">
                                    @error('manufacturer')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>