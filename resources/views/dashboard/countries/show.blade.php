@extends('dashboard.layout')
@section('pagetitle', __('Countries'))
@section('content')


    <table class="table">
        <tbody class="text-center">
            <tr>
                <td>{{ __('title_ar') . ':' }}</td>
                <td>{{ $Model['title_ar'] }}</td>
            </tr>
            <tr>
                <td>{{ __('title_en') . ':' }}</td>
                <td>{{ $Model['title_en'] }}</td>
            </tr>
        </tbody>
    </table>




    <div class="row">
        <div class="my-2 col-12 col-md-6 text-center">
            <a href="{{ route('admin.regions.create') }}" class="btn btn-primary mx-auto" disabled>@lang('add_new')</a>
        </div>
        <div class="my-2 col-12 col-md-6 text-center">
            <a class="btn link-primary" data-bs-toggle="modal" data-bs-target="#delivery_cost">
              @lang('delivery_cost_for_all_regions')
            </a>
        </div>
    </div>
    <h2>{{ trans('Regions') }}</h2>
    <table class="table"  id="regions_DataTable">
        <thead>
            <tr>
                <th>#</th>
                <th style="text-align:center;">@lang('title_ar')</th>
                <th style="text-align:center;">@lang('title_en')</th>
                <th style="text-align:center;">@lang('delivery_cost')</th>
                <th style="text-align:center;">@lang('visibility')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div class="modal fade" id="delivery_cost" tabindex="-1" aria-labelledby="delivery_costLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="modal-body" method="GET" action="{{ route('admin.countries.show',$Model->id) }}" id="delivery_cost_form">
            <label for="inputEmail4" class="form-label">@lang('delivery_cost')</label>
            <input name="delivery_cost" class="form-control" id="inputEmail4">
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('close')</button>
            <button type="submit" form="delivery_cost_form" class="btn btn-primary">@lang('save')</button>
          </div>
        </div>
      </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">
        $(function() {
            var table = $('#branches_DataTable').DataTable({
                processing: true
                , serverSide: true
                , oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                }
                , ajax: "{{ route('admin.branches.index',['country_id' => $Model->id]) }}"
                , lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
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
                        extend: 'pdfHtml5',
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
                ],
                columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title_ar',
                    },
                    {
                        data: 'title_en',
                    },
                    {
                        data: 'delivery',
                    },
                    {
                        data: 'pickup',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'action',
                    },
                ]
            });

            var table = $('#regions_DataTable').DataTable({
                processing: true,
                serverSide: true,
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                ajax: "{{ route('admin.regions.index',['country_id' => $Model->id]) }}",
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
                , columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title_ar',
                    },
                    {
                        data: 'title_en',
                    },
                    {
                        data: 'delivery_cost',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'action',
                    },
                ]
            });

        });
    </script>
@endsection
