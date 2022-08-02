@extends("main")

@section('title')
Person Lists
@stop

@section('content')
<div class="h33"></div>
@include("top")
<h5 class="fw-bold text-center">Person List ({{count($persons)}})</h5>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($persons as $person)

                    <tr>
                        <th scope="row">{{$person->id}}</th>
                        <th>{{$person->name}}</th>
                        <th>{{Carbon\Carbon::parse($person->birthday)->format('d/m/Y')}}</th>
                        <th>
                            @if($person->gender == 0)
                            Man
                            @else
                            Woman
                            @endif

                        </th>
                        <th>
                            <a href="{{url('person/update')}}/{{$person->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Güncelle">
                                <i class="text-light fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{url('person/delete')}}/{{$person->id}}" class="btn bg-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="Sil"><i class="fa-solid fa-trash text-light"></i></a>
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