@extends("layouts.dashboard")
@section("title","عرض الخدمات الفرعية" )

@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/vendors-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <!-- END: Vendor CSS-->
@stop
@section('content')
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-left mb-0">الخدمات</h2>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body">
                        <!-- users list start -->
                        <section class="app-user-list">

                            <div class="card">
                                <div class="card-datatable table-responsive pt-0">
                                    <table class="services-list-table table">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>صورة</th>
                                            <th>الاسم </th>
                                            <th>وصف</th>
                                            <th>الخدمة الاساسية </th>
                                            <th>تاريخ الانشاء</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                            <!-- list section end -->
                        </section>
{{-- <form action="{{route('user.create')}}" method="get" class="d-none" id="create_new">
                            @csrf
                            <button type="submit"></button>
                        </form> --}}
                    {{-- @foreach ($services as $service)
                        <!-- Modal -->
                            <div class="modal fade" id="delete{{ $service->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> حذف المدينة <span class="text-primary">{{ $service->service_name }}</span></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-body">
                                                <h5>هل انت متاكد من حذف البيانات</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">اغلاق</button>
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach  --}}


                        <div class="modal fade" id="modals-create">
                            <div class="modal-dialog">
                                <form class="create-new-service modal-content pt-0"
                         id="create-new-service" enctype="multipart/form-data">
@csrf
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">اضافة خدمة فرعية جديد</h5>
                                    </div>
                                    <div class="alert alert-danger" style="display:none"></div>

                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label for="question">{{ __('الاسم') }}</label>
                                            <input type="text" class="form-control" value="{{ old('question') }}" name="name" id="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="question">{{ __('الاسم EN') }}</label>
                                            <input type="text" class="form-control" value="{{ old('question') }}" name="name_en" id="name_en" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('وصف') }}</label>
                                            <textarea class="form-control" rows="3" name="description" id="description" >{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __(' En وصف') }}</label>
                                            <textarea class="form-control" rows="3" name="description_en" id="description_en" >{{ old('description') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="question">{{ __('الخدمة الاساسية') }}</label>
                                            <select  class="form-control" name="service_id" id="service_id">
                                                <option disabled selected>......</option>
                                                @foreach ($services as $service )
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        <div class="form-group">
                                            <label for="image">{{ __('الصورة') }}</label>
                                            <input type="file" class="form-control" value="{{ old('image') }}" name="image" id="image" required>
                                        </div>
                                        <input type="hidden" name="id" id="id">
                                    </div>
                                    <div class="modal-footer">
                                        <span id="btn-save" class="btn btn-primary mr-1">حفظ</span>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">الغاء
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





@endsection
@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <!-- END: Page Vendor JS-->
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    
    <!-- END: Page Vendor JS-->

    <script>

        let project_table = $('.services-list-table').DataTable({
            dom:
                '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('app-assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('sub.service.index') }}',
            },
            columns: [
                {data: 'image', name:'image',searchable: false},
                {data: 'name', name:'name',searchable: true},
                {data: 'description', name:'description',searchable: false},
                {data: 'service_id', name:'service_id',searchable: true},
                {data: 'created_at', name:'created_at',searchable: false},
                {data:''}
            ],
            order: [0, 'desc'],
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2 mt-50',
                    text: feather.icons['share'].toSvg({class: 'font-small-4 mr-50'}) + 'تصدير',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({class: 'font-small-4 mr-50'}) + 'Print',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({class: 'font-small-4 mr-50'}) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({class: 'font-small-4 mr-50'}) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({class: 'font-small-4 mr-50'}) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({class: 'font-small-4 mr-50'}) + 'Copy',
                            className: 'dropdown-item',
                            exportOptions: {columns: [0, 1, 2, 3, 4]}
                        }
                    ],
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                        $(node).parent().removeClass('btn-group');
                        setTimeout(function () {
                            $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                        }, 50);
                    }
                },

                {
                    text: 'اضافة خدمة',
                    className: 'add-new btn btn-primary mt-50',
                    onclick: "",
                    attr: {
                        'data-toggle': 'modal',
                        'data-target': '#modals-create',

                        // "type": "button",
                        // "onclick": "location.href = '/control-panel/photo-album/create'",


                        // 'onclick': "document.getElementById('create_new').submit()",


                    },
                    init: function (api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }
            ],
            // Actions
            columnDefs: [
                // Actions
                {
                    targets: -1,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        var id = full['id'];

                        return (
                            '<div class="btn-group">' +
                            '<a class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">' +
                            feather.icons['more-vertical'].toSvg({
                                class: 'font-small-4'
                            }) +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-right">' +
                             '<a href="javascript:void()" onclick="edit('+id+')" id="edit_button" class="dropdown-item" data-id="'+ id +'"  data-toggle="modal"' +
                            ' data-target="#modals-create">' +
                            feather.icons['archive'].toSvg({
                                class: 'font-small-4 mr-50'
                            }) +
                            'تعديل</a>' +
                            '<a href="javascript:void()" onclick="deleteConfirmation('+id+')" class="dropdown-item" ' +
                            ' >' +
                            feather.icons['trash-2'].toSvg({
                                class: 'font-small-4 mr-50'
                            }) +
                            'حذف</a></div>' +
                            '</div>' +
                            '</div>'
                        );
                    }
                }
            ]


        });


    </script>
    <script>

            // CREATE
            $("#btn-save").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var type = "POST";
                var ajaxurl = "{{route("sub.service.store")}}";
                var form_data = new FormData(document.getElementById('create-new-service'));

                $.ajax({
                    type: type,
                    url: ajaxurl,
                    processData: false,
                    contentType: false,
                    serverSide:true,

                    data: form_data,
                    dataType: 'json',
                    success: function (data) {
                        if(data.errors){
                            jQuery.each(data.errors, function(key, value){
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<p>'+value+'</p>');
                            });
                        }else{
                            swal.fire("تم العملية بنجاح!", data.message, "success");
                           jQuery('#id').val('')
                            $("#create-new-service").trigger("reset");
                        }

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

            function edit(id) {


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var type = "GET";
                    var ajaxurl = "{{route("service.edit")}}";

                    $.ajax({
                        type: type,
                        url: ajaxurl,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": id,

                        },
                        dataType: 'json',
                        success: function (res) {
                            $('#id').val(res.id);
                            $('#name').val(res.name);
                            $('#name_en').val(res.name_en);
                            $('#description').val(res.description);
                            $('#description_en').val(res.description_en);

                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });

            }

            function deleteConfirmation(id) {
                swal.fire({
                    title: "حذف خدمة",
                    icon: 'question',
                    text: "هل انت متاكد؟",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    reverseButtons: !0
                }).then(function (e) {

                    if (e.value === true) {
                        let token = $('meta[name="csrf-token"]').attr('content');
                        let _url = `{{route('service.delete')}}`;

                        $.ajax({
                            type: 'POST',
                            url: _url,
                            data: {"_token": "{{ csrf_token() }}","id": id},
                            success: function (resp) {
                                if (resp.success) {
                                    swal.fire("Done!", resp.message, "success");
                                    location.reload();
                                } else {
                                    swal.fire("عذرا!", resp.message, "error");
                                }
                            },
                            error: function (resp) {
                                swal.fire("Error!", 'Sumething went wrong.', "error");
                            }
                        });

                    } else {
                        e.dismiss;
                    }

                }, function (dismiss) {
                    return false;
                })
            }
    </script>
@stop
