@extends('admin.layouts.app')

@section('content')
<style>
    #table1 th,td{
        padding:0px !important;
        color: black !important;
    }

    .red{
        background-color:#ff040496 !important;
    }
    .green{
        background-color:#00ca2961 !important;
    }
</style>
<!--begin::Content wrapper-->
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Report</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">{{ $route }}</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">


            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                    <!--begin::Card-->
                    <div class="card">
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative" style="margin:0">
                                        <form method="post" action="{{ url($route) }}">
                                            @csrf
                                            <div class="row" style=" float: left;">
                                                <div class="form-group px-2" style="width: 20%">
                                                    <input type="text" id="from_date_1" class="form-control datepicker" name="start" value="{{ @$start_date }}" placeholder="From Date">
                                                </div>
                                                <div class="form-group px-2" style="width: 20%">
                                                    <input type="text" id="to_date_1" class="form-control datepicker" name="end" value="{{ @$end_date }}" placeholder="To Date">
                                                </div>
                                                <div class="form-group px-2" style="width: 20%">
                                                    <button type="submit" class="btn btn-primary">Apply</button>
                                                </div>
                                                <div class="form-group px-2" style="width: 20%">
                                                    <a href="{{ url($route.'?all=true') }}" type="button" class="btn btn-primary" >
                                                        All
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <!--begin::Export-->
                                    <button type="button" class="btn btn-light-primary me-3" onclick="exportTableToExcel('table1', 'data')">
                                        <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export
                                    </button>
                                    <!--end::Export-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>

                        <!--begin::Body-->
                        <div class="card-body pt-0">

                            <table class="table align-middle table-row-dashed  dataTable" id="table1">
                                <thead>
                                    @if(strlen($start_date) && strlen($end_date))
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th colspan="3">1<sup>st</sup> Rebill: <?php echo rebill_rate_from_to($route, $start_date, $end_date, '') ;?></th>
                                            <th colspan="23"><?php echo location_rebill_rate_from_to($route, $start_date, $end_date) ;?></th>
                                        </tr>
                                    @endif
                                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                        <th>Date</th>
                                        <th>Signup</th>
                                        <th>Rtotal</th>
                                        @for ($j=0;$j<$cols;$j++)
                                            <th>R{{ $j }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $ii=0;?>
                                    @foreach ($rc as $dns)
                                        <tr>
                                            <td  class="fw-bolder text-gray-800 text-hover-primary mb-1"><a target="_blank" href="{{ url('rebill_detail/users/'.$route.'/'.$dns['created_at'].'/1') }}" >{{$dns['created_at']}}</a></td>
                                            <td class="{{ (($rc[$ii]['r0'] > 0) ? "green" : "") }}"><a target="_blank" href="{{ url('rebill_detail/users/'.$route.'/'.$dns['created_at'].'/1') }}" >{{ $rc[$ii]['r0'] }}</a></td>
                                            <td class="<?php
                                            if($rc[$ii]['r0'] > $total[$dns['created_at']]) {
                                                echo ' red';
                                            }else if($rc[$ii]['r0'] < $total[$dns['created_at']]){
                                                echo ' green';
                                            } ?>">{{ $total[$dns['created_at']] }}</td>
                                            @for ($j=1;$j<=$cols;$j++)
                                                <td class="{{ (($rc[$ii]['r'.$j] > 0) ? "green" : "") }}"><a target="_blank" href="{{ url('rebill_detail/users/'.$route.'/'.$dns['created_at'].'/'.$j+1) }}" >{{ $rc[$ii]['r'.$j] }}<?php
                                                    if($j > 0){
                                                        echo ' ('. number_format((($rc[$ii]['r'.$j] > 0) ? ((($rc[$ii]['r'.$j])/$rc[$ii]['r0'])*100) : 0),0).'%)';
                                                    }
                                                    ?></a></td>
                                            @endfor
                                        </tr>
                                        <?php $ii++; ?>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->

                </div>
            </div>


        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</div>
<!--end::Content wrapper-->

@endsection


@section('scripts')

<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"></script>
<script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd"
    });
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename?filename+'.xls':'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob( blob, filename);
        }else{
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
</script>

@endsection
