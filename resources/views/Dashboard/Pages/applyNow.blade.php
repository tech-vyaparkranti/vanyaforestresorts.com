@extends('layouts.dashboardLayout')
@section('title', 'Enquiry')
@section('content')

    <x-dashboard-container container_header="Manage Apply Now">
        <x-card>
            <x-card-header>Apply Now Data</x-card-header>
            <x-card-body>
                <x-data-table></x-data-table>
            </x-card-body>
        </x-card>
    </x-dashboard-container>
@endsection

@section('script')
    <script type="text/javascript">
        let site_url = '{{ url('/') }}';
        var table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('enquiryDataTable') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                "scrollX": true,
                "order": [
                    [1, 'desc']
                ],
                columns: [ 
                    {
                        data: 'id',
                        name: 'id',
                        title: "Id"
                    },
                    {
                        data: 'name',
                        name: 'name',
                        title: "Name"
                    },                     
                    {
                        data: 'email',
                        name: 'email',
                        title: "Email Id"
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                        title: "Phone Number"
                    },
                    {
                        data: 'experience',
                        name: 'experience',
                        title: "Experience"
                    },
                    {
                        data: 'title',
                        name: 'title',
                        title: "Title"
                    },
                    {
                        data: 'company',
                        name: 'company',
                        title: "Company"
                    },
                    {
                        data: 'qualifications',
                        name: 'qualifications',
                        title: "Qualifications"
                    },
                    {
                        data: 'message',
                        name: 'message',
                        title: "Message"
                    },
                    {
                        data: 'created_at_formatted',
                        name: 'created_at',
                        title: "Date and Time"
                    }
                ]
            });

        });
         
         
    </script>
    @include('Dashboard.include.dataTablesScript')
@endsection
