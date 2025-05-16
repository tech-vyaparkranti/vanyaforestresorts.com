@extends('layouts.dashboardLayout')
@section('title', 'Wedding Enquiry')
@section('content')
    <x-content-div heading="Wedding Enquiry Management">
        <x-card-element header="Wedding Enquiry List">
            <x-data-table></x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')
    @include('Dashboard.include.dataTablesScript')

    <script type="text/javascript">
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: {
                    url: "{{ route('getWeddingEnquiry') }}", // Updated route for new model
                    type: 'POST',
                    data: function(d) {
                        d._token = '{{ csrf_token() }}';
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        title: "Sr.No."
                    },
                    {
                        data: 'id',
                        name: 'id',
                        title: 'ID',
                        visible: false
                    },
                    {
                        data: 'first_name',
                        name: 'first_name',
                        title: 'Occassion'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                        title: 'Mobile'
                    },
                    {
                        data: 'check_in_date',
                        name: 'check_in_date',
                        title: 'check_in Date',
                        render: function(data, type, row) {
                    // Convert UTC to Asia/Kolkata timezone using JavaScript
                    var date = new Date(data);
                    var options = {  
                        year: 'numeric', 
                        month: 'short', 
                        day: 'numeric', 
                    };

                    return date.toLocaleString('en-IN', options);  // Formatting date in Asia/Kolkata timezone
                }
                    },
                    {
                        data: 'check_out_date',
                        name: 'check_out_date',
                        title: 'check_out Date',
                        render: function(data, type, row) {
                    // Convert UTC to Asia/Kolkata timezone using JavaScript
                    var date = new Date(data);
                    var options = {  
                        year: 'numeric', 
                        month: 'short', 
                        day: 'numeric', 
                    };

                    return date.toLocaleString('en-IN', options);  // Formatting date in Asia/Kolkata timezone
                }
                    },

                    {
                        data: 'capacity',
                        name: 'capacity',
                        title: 'Budget'
                    },
                    {
                        data: 'food',
                        name: 'food',
                        title: 'Food'
                    },
                    {
                        data: 'message',
                        name: 'message',
                        title: 'Total Guest'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        title: 'created_at',
                        render: function(data, type, row) {
                    // Convert UTC to Asia/Kolkata timezone using JavaScript
                    var date = new Date(data);
                    var options = { 
                        weekday: 'short', 
                        year: 'numeric', 
                        month: 'short', 
                        day: 'numeric', 
                        hour: 'numeric', 
                        minute: 'numeric', 
                        second: 'numeric',
                        timeZone: 'Asia/Kolkata' 
                    };

                    return date.toLocaleString('en-IN', options);  // Formatting date in Asia/Kolkata timezone
                }
            }
        ],
                order: [
                    [1, "desc"]
                ]
            });
        });
    </script>
@endsection
