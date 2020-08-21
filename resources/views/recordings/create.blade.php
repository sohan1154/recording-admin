@extends('layouts.admin')

@section('content')
            
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add/Edit Form</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <form id="addNew" class="addNew" action="{{ $url }}" enctype="multipart/form-data" method="post" autocomplete="off">
                  
                @csrf
                <input type="hidden" name="id" value="{{$rowInfo->id}}">
                
                <div class="form-group">

                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" name="candidate_name" placeholder="Candidate Name" value="{{old('candidate_name', $rowInfo->candidate_name)}}" required>
                        @if($errors->has('candidate_name'))
                        <small class="error-message">
                            {{$errors->first('candidate_name')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="email" class="form-control" name="candidate_email" placeholder="Candidate Email" value="{{old('candidate_email', $rowInfo->candidate_email)}}" required>
                        @if($errors->has('candidate_email'))
                        <small class="error-message">
                            {{$errors->first('candidate_email')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" name="candidate_mobile" placeholder="Candidate Mobile" value="{{old('candidate_mobile', $rowInfo->candidate_mobile)}}" required>
                        @if($errors->has('candidate_mobile'))
                        <small class="error-message">
                            {{$errors->first('candidate_mobile')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="datetime-local" class="form-control" name="recording_datetime" value="{{old('recording_datetime', $rowInfo->	recording_datetime)}}" required>
                        @if($errors->has('recording_datetime'))
                        <small class="error-message">
                            {{$errors->first('recording_datetime')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{old('address', $rowInfo->address)}}" required>
                        @if($errors->has('address'))
                        <small class="error-message">
                            {{$errors->first('address')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" name="lat" placeholder="Latitude" value="{{old('lat', $rowInfo->lat)}}" >
                        @if($errors->has('lat'))
                        <small class="error-message">
                            {{$errors->first('lat')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <input type="text" class="form-control" name="lng" placeholder="Longitude" value="{{old('lng', $rowInfo->lng)}}" >
                        @if($errors->has('lng'))
                        <small class="error-message">
                            {{$errors->first('lng')}}
                        </small>
                        @endif
                    </div>

                    <div class="col-sm-6 mb-3">
                        <select id="status" name="status" class="form-control"  required>
                            <option value="0" {{ $rowInfo->status==0 ? 'selected' : '' }}>Disable</option>
                            <option value="1" {{ $rowInfo->status==1 || $rowInfo->id==null ? 'selected' : '' }}>Enable</option>
                        </select>
                    </div>

                    <div class="col-sm-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-user btn-block" id="formSubmit">Save</button>
                    </div>
                </div>
              </form>

        </div>
    </div>
</div>

@stop