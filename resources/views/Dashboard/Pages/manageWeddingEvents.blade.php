@extends('layouts.dashboardLayout')
@section('title', 'Wedding Events')
@section('content')
    <x-content-div heading="Manage Wedding Events Data">
        <x-card-element header="Wedding Events List">
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
                        data: 'checkin',
                        name: 'checkin',
                        title: 'Check-in Date'
                    },
                    {
                        data: 'checkout',
                        name: 'checkout',
                        title: 'Check-out Date'
                    },
                    {
                        data: 'guests',
                        name: 'guests',
                        title: 'Guests'
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
