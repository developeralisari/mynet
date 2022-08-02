@extends("main")

@section('title')
Addresses
@stop

@section('content')
<div class="h33"></div>
@include("top")
<h5 class="fw-bold text-center">Address List ({{count($addresses)}})</h5>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Address Name</th>
                        <th scope="col">Person</th>
                        <th scope="col">Post Code</th>
                        <th scope="col">City Name</th>
                        <th scope="col">Country Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $address)

                    <tr>
                        <th scope="row">{{$address->id}}</th>
                        <th scope="row">{{$address->address_name}}</th>
                        <th scope="row">{{$address->connectPerson->name}}</th>
                        <th scope="row">{{$address->post_code}}</th>
                        <th scope="row">{{$address->city_name}}</th>
                        <th scope="row">{{$address->country_name}}</th>

                        <th>
                            <a href="{{url('address/update')}}/{{$address->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Güncelle">
                                <i class="text-light fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{url('address/delete')}}/{{$address->id}}" class="btn bg-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="Sil"><i class="fa-solid fa-trash text-light"></i></a>
                        </th>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


@stop

@section('script')
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>
@stop