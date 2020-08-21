@extends('layouts.admin')

@section('content')
            
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{$sub_title}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
                
            <div class="form-group">
               
            <div class="col-sm-6 mb-3">
                    <strong>Recorder:</strong> {{@$rowInfo->user->name}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Candidate Name:</strong> {{$rowInfo->candidate_name}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Candidate Email:</strong> {{$rowInfo->candidate_email}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Candidate Mobile:</strong> {{$rowInfo->candidate_mobile}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Candidate Address:</strong> {{$rowInfo->address}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Latitude:</strong> {{$rowInfo->lat}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Longitude:</strong> {{$rowInfo->lng}}
                </div>

                <div class="col-sm-6 mb-3">
                    <audio controls>
                        <source src="{{ config('app.url').'uploads/audio/'.$rowInfo->user->id.'/'.$rowInfo->file_name }}" type="audio/mpeg">
                    </audio>
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Recording Duration:</strong> {{$rowInfo->recording_duration}}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Recording Start Date & Time:</strong> {{ formatedDate($rowInfo->recording_start_datetime) }}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Recording End Date & Time:</strong> {{ formatedDate($rowInfo->recording_stop_datetime) }}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Created:</strong> {{ formatedDate($rowInfo->created_at) }}
                </div>

                <div class="col-sm-6 mb-3">
                    <strong>Updated:</strong> {{ formatedDate($rowInfo->updated_at) }}
                </div>

            </div>

        </div>
    </div>
</div>

@stop