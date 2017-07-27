@extends('layouts.master')

@section('content')
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>last name</th>
                <th>CNO</th>
                <th>Email</th>
                <th>Address</th>
                
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
  
<script>
$(function() {
  $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{Route ('datatables.data')}}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'fname', name: 'fname'},
            {data: 'lname', name: 'lname'},
            {data: 'cno', name: 'cno'},
            {data: 'email', name: 'email'},
            {data: 'address', name: 'address'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            buttons: [
        'copy', 'excel', 'pdf'
    ]
        ]
    });

});
</script>
@endpush