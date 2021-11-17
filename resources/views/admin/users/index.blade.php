<x-admin-master>
    @section('content')
        <div class="container-fluid">
            <h1 class="text-black-50">You are in clients!</h1>
        </div>



            <div class="col-12">
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
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Date</th>
                                <th>Delete</th>
                                <th>Edit</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)

                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a href="{{route('user.profile.show', $user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telephone}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>

                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </td>
                                <td><a href="{{route('user.profile.show', $user->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>





    @endsection
</x-admin-master>