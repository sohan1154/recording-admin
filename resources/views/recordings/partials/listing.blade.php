
<div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <div class="row">
        <table id="listingTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Recorder</th>
                    <th>Candidate Name</th>
                    <th>Candidate Email</th>
                    <th>Candidate Mobile</th>
                    <th class="text-align-center">Datetime</th>
                    <th class="text-align-center">Duration</th>
                    <th class="text-align-center">Latitude</th>
                    <th class="text-align-center">Longitude</th>
                    <th class="text-align-center">Actions</th>
                </tr>
            </thead>
            <tbody>
               
                @forelse($results as $value)
                    <tr id="RecordID_{{$value->id}}">
                        <td>{{ @$value->user->name }}</td>
                        <td>{{ $value->candidate_name }}</td>
                        <td>{{ $value->candidate_email }}</td>
                        <td>{{ $value->candidate_mobile }}</td>
                        <td>{{ formatedDate($value->recording_start_datetime) }}</td>
                        <td>{{ $value->recording_duration }}</td>
                        <td>{{ $value->lat }}</td>
                        <td>{{ $value->lng }}</td>
                        
                        <td class="text-align-center">
                            <a class="btn btn-info btn-circle btn-sm" href="{{ route('recording-view', $value->id) }}" title="View"><i class="fas fa-eye"></i></a>
                            <a class="btn btn-success btn-circle btn-sm" href="{{ route('recording-edit', $value->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger btn-circle btn-sm deleteRecord" href="javascript:;" data-href="{{ route('recording-delete') }}" title="Delete" onclick="deleteRecord('{{$value->id}}');"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="center">Record not found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@include('elements.pagination')
