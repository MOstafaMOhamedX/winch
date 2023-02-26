<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ setting('title_'.lang()) ?? env('APP_NAME', 'EMCAN') }}</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}"/>
    <link rel="icon" href="{{ asset(setting('logo')) }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}" />
    <link href='https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap' rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('css')
    @if (lang('ar'))
        <link href="{{ asset('css/ar.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/en.css') }}" rel="stylesheet">
    @endif
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

</head>

<body >
    @include('dashboard.components.sidebar')
    <div class="overlay"></div>

    <main class="main-wrapper active">
        <header class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-6" style="z-index: 100">
                        <div class="header-left">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                    <i class="lni lni-menu"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-6">
                        <div class="header-right">
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">
                                            <h6>{{ Auth::user()?->name }}</h6>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                    <li>
                                        <a href="{{ route('admin.profile.show',auth()->id()) }}"> <i class="lni lni-user"></i> {{ __('myProfile') }}</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('logout') }}</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>@yield('pagetitle')</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-styles">
                    @yield('content')
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-md-start">
                            <p class="text-sm">
                                @lang('copyrights')
                                <a href="https://emcan-group.com/" rel="nofollow" target="_blank">
                                    {{ __('emcan') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>


    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
        function DeleteSelected(table,id = 0) {
            event.preventDefault();
            var ids = [];
            if(id > 0)
                ids.push(id);
            else{
                $('input:checkbox[class="DTcheckbox"]:checked').each(function() {
                    ids.push($(this).attr('value'));
                });
            }
            swal({title: "@lang('delete')", text: "@lang('deletewarning')", icon: "warning", buttons: true, dangerMode: true}).then((willchagestatus) => {
                if (willchagestatus) {
                    $.ajax({
                        type: "POST"
                        , url: "{{ route('RemoveIds') }}"
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , ids: ids
                            , table: table
                        , }
                        , dataType: 'text'
                        , cache: false
                        , success: function(result) {
                            if (result){
                                swal({title: "😀❤️ " + "{{ __('DeletedSuccessfully') }}", icon: "success", buttons: true, dangerMode: true});
                                location.reload();
                            }
                            else
                                swal({title: "Coudn't delete!", icon: "error", buttons: true, dangerMode: true});
                        }
                        , error: function(xhr, status, errorThrown) {
                            swal({title: "{{ __('sorry_there_was_an_error') }}", icon: "warning", buttons: true, dangerMode: true});
                        }
                    });
                }
            });
        }
        function toggleswitch(id,table , column_name = 'status',checkbox = 'checkbox') {
            event.preventDefault();
            swal({text: "@lang('changeStatus')", title: "@lang('display')", icon: "warning", buttons: true, dangerMode: true}).then((willchagestatus) => {
                if (willchagestatus) {
                    $.ajax({
                        type: "POST"
                        , url: "{{ route('switch') }}"
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , id: id
                            , column_name: column_name
                            , table: table
                        , }
                        , dataType: 'text'
                        , cache: false
                        , success: function(checked) {
                            swal({title: "😀❤️ {{ __('updatedSuccessfully') }}", icon: "success", buttons: true, dangerMode: true});
                            checked = JSON.parse(checked);
                            $('#' + checkbox + id).prop('checked', checked == 1);
                        }
                        , error: function(xhr, status, errorThrown) {
                            swal({title: "{{ __('sorry_there_was_an_error') }}", icon: "warning", buttons: true, dangerMode: true});
                        }
                    });
                }
            });
        }
        $(function() {
            var table = $('.DataTable').DataTable({
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
                , dom: 'Blfrtip'
                , buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            stripHtml : false,
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            });

        });
    </script>
    @yield('js')
</body>
</html>
