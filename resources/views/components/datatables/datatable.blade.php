<table class="table align-middle table-row-dashed fs-6 gy-5 kt_table" id="kt_table">
    <!--begin::Table head-->
    <thead>
    <!--begin::Table row-->
    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
        @foreach($headers as $header)
            @if ($loop->first)
                <th class="w-50px pe-2">{{$header}}</th>
            @elseif ($loop->last)
                <th class="text-end min-w-100px">{{$header}}</th>
            @else
                <th class="">{{$header}}</th>
            @endif
        @endforeach
    </tr>
    <!--end::Table row-->
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody class="text-gray-600 fw-semibold">
        @foreach($body as $item)
            {!! $item !!}
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>
