@extends("main")

@section('title')
Update
@stop

@section('content')
<div class="h33"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="javascript:;" class="btn btn-warning back"><i class="fas fa-times"></i>Geri</a>
        </div>
    </div>
</div>

<div class="h33"></div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Add Person</h3>
            <form action="{{url('person/store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$id}}" />
                @foreach($persons as $person)
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$person->name}}" placeholder="Person Name">

                    @if ($errors->any())
                    <div class="h33"></div>
                    <div class="alert alert-danger">
                        <ul style="margin-bottom:0px">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="text" name="birthday" class="form-control date" value="{{$person->birthday}}" id="birthday" placeholder="__/__/____">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label d-block">Gender</label>
                    <?php
                    $checked = "";
                    $checkedTwo = "";
                    ?>
                    @if($person->gender == 0)
                    <?php
                    $checked = "checked";
                    ?>
                    @else
                    <?php
                    $checkedTwo = "checked";
                    ?>
                    @endif
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0" {{$checked}}>
                        <label class="form-check-label" for="inlineRadio1">Man</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1" {{$checkedTwo}}>
                        <label class="form-check-label" for="inlineRadio2">Woman</label>
                    </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-success">Güncelle</button>
            </form>
        </div>
    </div>
</div>

@stop

@section('script')
<script src="{{url('jquery.mask.js')}}"></script>
<script>
    $('.date').mask('00/00/0000');
</script>
@stop