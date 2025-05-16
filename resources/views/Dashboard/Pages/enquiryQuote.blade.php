@extends('layouts.dashboardLayout')
@section('title', 'Enquiry Quote')
@section('content')
    <x-content-div heading="Enquiry Quote Management">
        <x-card-element header="Enquiry Quote List">
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
                    url: "{{ route('getEnquiryQuotes') }}", // Updated route for new model
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
                        data: 'checkin_date',
                        name: 'checkin_date',
                        title: 'Check-in Date'
                    },
                    {
                        data: 'checkout_date',
                        name: 'checkout_date',
                        title: 'Check-out Date'
                    },
                    {
                        data: 'no_of_guests',
                        name: 'no_of_guests',
                        title: 'No. of Guests'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile',
                        title: 'Mobile'
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
