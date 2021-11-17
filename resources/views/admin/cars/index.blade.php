<x-admin-master>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">

@section('content')
        <div class="container-fluid">
            <h1 class="text-black-50">You are in CAR LIST!</h1>
        </div>



        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All info</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table id="example1" class="table table-hover text-nowrap">
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
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($cars as $car)

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
            <!-- /.card -->
        </div>


{{--        <script>--}}
{{--            $(function () {--}}
{{--                $("#example1").DataTable({--}}
{{--                    "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]--}}
{{--                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
{{--                --}}
{{--            });--}}
{{--        </script>--}}


    @endsection

</x-admin-master>
