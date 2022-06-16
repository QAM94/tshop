<div class="table-responsive">
    <table id="datatable-{{$module}}" width="100%" class="table">
        <thead>
        <tr>
            @foreach(json_decode($data_table_columns) as $column)
                <th>{{ setText($column->name) }}</th>
            @endforeach
        </tr>
        </thead>
    </table>
</div>


@php
    if(is_array($route_name_for_listing)) {
    $route = route($route_name_for_listing['route'] , [$route_name_for_listing['key'] => $route_name_for_listing['value']]);
    } else {
    $route = route($route_name_for_listing);
    }
@endphp


@push('custom-scripts')

<script>
    let search_ph = 'Enter Text';
    /*if('{{ $module }}' == 'reservations') {
        search_ph = 'Reservation ID or Name';
    }*/
    $(function () {
        $('#datatable-{{ $module }}').DataTable({
            processing: true,
            serverSide: true,
            saveState: true,
            ordering:false,
            ajax: '{!! $route !!}',
            columns: {!! $data_table_columns !!},
            "fnInitComplete": function (oSettings, json) {
                if (typeof afterDatatable == 'function') {
                    afterDatatable();
                }
            },
            language: {
                searchPlaceholder: search_ph
            }

        });
    });
</script>
@endpush
