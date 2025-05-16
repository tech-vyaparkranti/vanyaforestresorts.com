@extends('layouts.dashboardLayout')
@section('title', 'Event Enquiry')
@section('content')
    <x-content-div heading="Event Enquiry Management">
        <x-card-element header="Event Enquiry List">
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
                    url: "{{ route('geteventEnquiry') }}", // Updated route for new model
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
                        data: 'mobile',
                        name: 'mobile',
                        title: 'Mobile'
                    },
                    {
                        data: 'checkin',
                        name: 'checkin',
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
                        data: 'checkout',
                        name: 'checkout',
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
                        data: 'guests',
                        name: 'guests',
                        title: 'Total Guest'
                    },
                    {
                        data: 'occasion',
                        name: 'occasion',
                        title: 'Occasion'
                    },
                    {
                        data: 'budget',
                        name: 'budget',
                        title: 'Budget'
                    },
                    {
                        data: 'food_preference',
                        name: 'food_preference',
                        title: 'Food Preference'
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
