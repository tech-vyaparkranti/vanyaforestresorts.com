@extends('layouts.dashboardLayout')
@section('title', 'Blog')
@section('content')

    <x-content-div heading="Manage Blog">
        <x-card-element header="Add Blog Image">
            <x-form-element method="POST" enctype="multipart/form-data" id="submitForm" action="javascript:">
                <x-input type="hidden" name="id" id="id" value=""></x-input>
                <x-input type="hidden" name="action" id="action" value="insert"></x-input>

                <x-input-with-label-element id="image" label="Upload Blog Image" name="image" type="file" accept="image/*"
                    required></x-input-with-label-element>

                <x-input-with-label-element id="title" label="Blog title"
                    name="title"></x-input-with-label-element>
                    <x-text-area-with-label id="content" label="Blog Content"
                    name="content"></x-text-area-with-label>
                    <x-text-area-with-label id="short_content" label="Blog Short Content"
                    name="short_content"></x-text-area-with-label>
                <x-input-with-label-element id="facebook_link" label="Facebook Link"
                    name="facebook_link"></x-input-with-label-element>
                <x-input-with-label-element id="twitter_link" label="Twitter Link"
                    name="twitter_link"></x-input-with-label-element>
                <x-input-with-label-element id="instagram_link" label="Instagram Link"
                    name="instagram_link"></x-input-with-label-element>
                <x-input-with-label-element id="youtube_link" label="Youtube Link"
                    name="youtube_link"></x-input-with-label-element>

                <x-input-with-label-element id="meta_keyword" label="Meta Keyword"
                    name="meta_keyword"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_title" label="Meta Title"
                    name="meta_title"></x-input-with-label-element>
                    <x-input-with-label-element id="meta_description" label="Meta Description"
                    name="meta_description"></x-input-with-label-element>

                <x-select-with-label id="slide_status" name="slide_status" label="Select Blog Image Status" required="true">
                    <option value="live">Live</option>
                    <option value="disabled">Disabled</option>
                </x-select-with-label>
                <x-input-with-label-element id="slide_sorting" label="Blog Image Sorting" type="numeric"
                name="slide_sorting"></x-input-with-label-element>

                <x-form-buttons></x-form-buttons>
            </x-form-element>

        </x-card-element>

        <x-card-element header="Blog Data">
            <x-data-table>

            </x-data-table>
        </x-card-element>
    </x-content-div>
@endsection

@section('script')
    <script type="text/javascript">
      $('#content').summernote({
                placeholder: 'ElementText',
                tabsize: 2,
                height: 100
            });
        let site_url = '{{ url('/') }}';
        let table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                "scrollX": true,
                ajax: {
                    url: "{{ route('blogData') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: "DT_RowIndex",
                        orderable: false,
                        searchable: false,
                        title: "Sr.No."
                    },
                    {
                        data: '{{ \App\Models\Blog::ID }}',
                        name: '{{ \App\Models\Blog::ID }}',
                        title: 'Id',
                        visible: false,
                    },
                    {
                        data: '{{ \App\Models\Blog::IMAGE }}',
                        render: function(data, type, row) {
                            let image = '';
                            if (data) {
                                image = '<img alt="Image Link" src="' + site_url + data +
                                    '" class="img-thumbnail">'
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false,
                        title: "Blog Image"
                    },
                    {
                        data: '{{ \App\Models\Blog::TITLE }}',
                        name: '{{ \App\Models\Blog::TITLE }}',
                        title: 'Blog Title'
                    },
                    {
                        data: 'content_row',
                        name: '{{ \App\Models\Blog::CONTENT }}',
                        title: 'Blog Content'
                    },
                    {
                        data: '{{ \App\Models\Blog::SHORT_CONTENT }}',
                        name: '{{ \App\Models\Blog::SHORT_CONTENT }}',
                        title: 'Blog Short Content'
                    },
                    {
                        data: '{{ \App\Models\Blog::FACEBOOK_LINK }}',
                        name: '{{ \App\Models\Blog::FACEBOOK_LINK }}',
                        title: 'Facebook Link'
                    },
                    {
                        data: '{{ \App\Models\Blog::TWITTER_LINK }}',
                        name: '{{ \App\Models\Blog::TWITTER_LINK }}',
                        title: 'Twitter Link'
                    },
                    {
                        data: '{{ \App\Models\Blog::INSTAGRAM_LINK }}',
                        name: '{{ \App\Models\Blog::INSTAGRAM_LINK }}',
                        title: 'Instagram Link'
                    },
                    {
                        data: '{{ \App\Models\Blog::YOUTUBE_LINK }}',
                        name: '{{ \App\Models\Blog::YOUTUBE_LINK }}',
                        title: 'Youtube Link'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_KEYWORD }}',
                        name: '{{ \App\Models\Blog::META_KEYWORD }}',
                        title: 'Blog Meta Keyword'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_TITLE }}',
                        name: '{{ \App\Models\Blog::META_TITLE }}',
                        title: 'Blog Meta Title'
                    },
                    {
                        data: '{{ \App\Models\Blog::META_DESCRIPTION }}',
                        name: '{{ \App\Models\Blog::META_DESCRIPTION }}',
                        title: 'Blog Meta Description'
                    },
                    {
                        data: '{{ \App\Models\Blog::SLIDE_STATUS }}',
                        name: '{{ \App\Models\Blog::SLIDE_STATUS }}',
                        title: 'Blog Image Status'
                    },
                    {
                        data: '{{ \App\Models\Blog::SLIDE_SORTING }}',
                        name: '{{ \App\Models\Blog::SLIDE_SORTING }}',
                        title: 'Blog Image Sorting'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: 'Action'
                    },
                ],
                order: [
                    [1, "desc"]
                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#image").attr("required",false);
                $("#title").val(row['title']);
                $("#short_content").val(row['short_content']);
                $("#content").val(row['content']);
                $('#content').summernote('destroy');
                $('#content').summernote({
                    focus: true
                });
                $("#facebook_link").val(row['facebook_link']);
                $("#twitter_link").val(row['twitter_link']);                              
                $("#instagram_link").val(row['instagram_link']);                              
                $("#youtube_link").val(row['youtube_link']);                              
                $("#meta_keyword").val(row['meta_keyword']);                              
                $("#meta_title").val(row['meta_title']);                              
                $("#meta_description").val(row['meta_description']);                              
                $("#slide_status").val(row['slide_status']);
                $("#slide_sorting").val(row['slide_sorting']);
                $("#action").val("update");
                scrollToDiv();
            } else {
                errorMessage("Something went wrong. Code 101");
            }
        });
 

        function Disable(id) {
            changeAction(id, "disable", "This item will be disabled!", "Yes, disable it!");
        }

        function Enable(id) {
            changeAction(id, "enable", "This item will be enabled!", "Yes, enable it!");
        }

        function changeAction(id, action, text, confirmButtonText) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('saveBlog') }}',
                            data: {
                                id: id,
                                action: action,
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message, true);
                                    table.ajax.reload();
                                } else {
                                    errorMessage(response.message);
                                }
                            },
                            failure: function(response) {
                                errorMessage(response.message);
                            }
                        });
                    }
                });
            } else {
                errorMessage("Something went wrong. Code 102");
            }
        }


        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('saveBlog') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message, "reload");
                        } else {
                            errorMessage(response.message);
                        }

                    },
                    failure: function(response) {
                        errorMessage(response.message);
                    }
                });
            });
        });
    </script>
    @include('Dashboard.include.dataTablesScript')
    {{-- @include('Dashboard.include.summernoteScript') --}}
@endsection
