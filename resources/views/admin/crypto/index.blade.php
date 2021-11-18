@extends('layouts.app')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.css">

    @section('content')
    <section class='content'>
    <div class="container-fluid pt-3">
    <div class="card ">
        <div class="card-header">
            Header
        </div>
        <div class="card-body">
            <table id="example1" class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Target</th>
                        <th>ATH</th>
                        <th>Favorites</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach($data as $element)
                        <tr>
                            <td><a href="{{ route('crypto.show',$element['rank']) }}"
                                    class="btn btn-dark">{{ $element['rank'] }}</a></td>
                            <td><img src="{{ $element['image'] }}" width="40">
                                {{ $element['name'] }}
                                <input class="hiddenCryptoName" type="hidden" name="crypto-name" value="{{ $element['name'] }}">
                            </td>
                            <td>{{ $element['price'] }}</td>
                            <td>{{ $element['target'] }}</td>
                            <td>{{ $element['ath'] }}</td>
                            <td>
                                <a href="#"
                                    class="btn btn-outline-warning crypto-btn">
                                    @if($element['isFav'] > 0)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                    <!-- <i class="far fa-star"></i> -->
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
       
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
    </div>
    </section>
    @endsection
   
@section('scripts')
<script type="text/javascript">
   
    $('.crypto-btn').on('click', function(e) {  
     e.preventDefault();
        var cryptoName = $(this).closest('tr').find('.hiddenCryptoName').val()
        var favIcon = $(this).closest('tr').find('.fa-star');
        if ( favIcon.hasClass('far') ) {
            favIcon.removeClass('far')
            favIcon.addClass('fas')
        } else {
         favIcon.removeClass('fas')
         favIcon.addClass('far')
        }
     //    console.log(favIcon);
        var target = e.target;
     //    console.log($('crypto-name'));
         $.ajax({
             type: "post",
             url: "{{ route('favorites.store') }}",
             data: {"_token" : "{{ csrf_token() }}",
             cryptoName : cryptoName
             },
             dataType: "json",
             success: function (response) {
             },complete: function(complete) {
                 toastr.success('Success messages');
             },
             error: (err)=>{ console.log(err) }
         });
    });       
 
 </script>
 @endsection