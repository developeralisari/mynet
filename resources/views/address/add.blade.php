@extends("main")

@section('title')
Add Address
@stop

@section('style')
<link rel="stylesheet" href="{{url('select2/select2.min.css')}}">

<style>
    #select2-services-container,
    .select2-results {
        font-size: 13px;
    }

    .select2-container .select2-selection--single {
        height: 30px;
    }

    .select2-container--default .select2-selection--single {
        border: 1px solid #ced4da
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #333 transparent transparent transparent;
    }

    .select2-selection {
        height: 37px !important;
        padding-top: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
        position: absolute;
        top: 1px;
        right: 1px;
        width: 30px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 25px;
        padding-left: 15px;
    }
</style>
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
            <h3>Add Address</h3>
            <form action="{{url('address/save')}}" method="POST">
                @csrf
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

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="address_name" class="form-control" id="name" placeholder="Address Name">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Person</label>
                    <select name="person_id" class="form-select form-control">
                        @foreach($persons as $person)
                        <option value="{{$person->id}}">{{$person->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="post_code" class="form-label">Post Code</label>
                    <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Post Code">
                </div>

                <div class="mb-3">
                    <label for="city_name" class="form-label">City Name</label>
                    <input type="text" name="city_name" class="form-control" id="city_name" placeholder="City Name">
                </div>

                <div class="mb-3">
                    <label for="country_name" class="form-label">Country Name</label>
                    <input type="text" name="country_name" class="form-control" id="country_name" placeholder="Country Name">
                </div>

                <button type="submit" class="btn btn-success">Save</button>
                <div class="h33"></div>
            </form>
        </div>
    </div>
</div>

@stop

@section('script')
<script src="{{url('select2/select2.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".form-select").select2();
    });
</script>
@stop