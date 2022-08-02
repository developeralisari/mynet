@extends("main")

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
            <form action="{{url('person/save')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Person Name">

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
                    <input type="text" name="birthday" class="form-control date" id="birthday" placeholder="__/__/____">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label d-block">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                        <label class="form-check-label" for="inlineRadio1">Man</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                        <label class="form-check-label" for="inlineRadio2">Woman</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
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