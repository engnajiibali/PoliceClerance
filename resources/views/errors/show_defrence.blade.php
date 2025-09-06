@extends('include.master')
@section('content')
<section class="content-header">
<h1>
{{ $pageTitle }}
</h1>
<ol class="breadcrumb">
<li><a href="../products/add"><i class="fa fa-users"></i> {{ $pageTitle }}</a></li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">   
<div class="col-md-10">
<div class="box box-primary box-solid">
<div class="box-header with-border">
<h3 class="box-title">{{ $pageTitle }}</h3>
<div class="box-tools pull-right">
<!-- Buttons for custom date -->
<!-- <button class="btn btn-default" id="hideCustomDate"><i class="icon-copy fa fa-cog"></i></button>
<button class="btn btn-default" id="showCustomDate"><i class="icon-copy fa fa-cog"></i></button> -->
<!-- Download and Print buttons -->
<button class="btn btn-default"><i class="fa fa-download"></i></button>
<button class="btn btn-default"><i class="fa fa-print" onclick="PrintDiv('printData')"></i></button>
</div>
</div>

<!-- Search Form -->
<form id="pForm"  method="post" action="#" enctype="multipart/form-data">
@csrf
@method('post')
<div class="row" id="customDate">
<div class="form-group col-md-1"></div>
<div class="form-group col-md-4">
<label class="col-form-label">Start Date :</label>

<input class="form-control "  type="date" name="startdate" id="startdate" value="{{$startdate}}">

</div>
<div class="form-group col-md-4">
<label>End Date</label>
<input class="form-control" type="date" name="enddate" id="enddate" value="{{ $enddate }}">
</div>
<div class="form-group col-md-2">
<label>Search</label> <i class="fa fa-search"></i>
<input class="form-control bt btn-success" type="submit" id="Searchreport" value="Search">
</div>
<div class="form-group col-md-1"></div>
</div>
</form>

<!-- Box Body for Balance Sheet Data -->
<div class="box-body" id="printData">
<div class="row">
<div class="col-md-12" id="printBlancesheet">
<div class="card">
<div class="card-body">
<!-- Logo and Company Info -->
<div class="logo text-center" style="margin-top: 2%;">
<img src="{{asset('core/public/upload/logo/'.getSiteLogo())}}" alt="" style="width: 150px; height: 100px;"><br>
<div class="files-info">
<h4 align="center">{{getSiteName()}}</h4>
</div>
</div>

<!-- Balance Sheet Title -->
<h4 align="center">{{ $pageTitle }}</h4>
<b id="periodDate" align="center">
From {{ $startdate }} To {{ $enddate}}
</b>
</div>
<!-- Date of Report -->
<b class="pull-right">{{ date('d F, Y') }}</b>
<hr>



<div class="box-body">
<table class="table no-margin">

    <thead>
        <tr>
            <th>Tran ID</th>
                   <th>Transaction Type</th>
            <th>Total Debit</th>
            <th>Total Credit</th>
            <th>Difference</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->tran_id }}</td>
               <td>{{ $row->jornal_type }}</td>
            <td>{{ $row->totalDebit }}</td>
            <td>{{ $row->totalCredit }}</td>
            <td>{{ $row->difference }}</td>
            <td width="2.5">
    <a href="{{ route('expenses.show', $expense->id) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"> </i> View</a>
<a href="{{route('expenses.edit',$expense->id)}}" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
</td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>

</div>
</div>
</div>
</div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<div class="col-md-1"></div>
</div>
</section>
<script type="text/javascript">

$(document).ready(function(){
$("#customDate").hide()
$("#hideCustomDate").hide()
});

$('#showCustomDate').click(function(){
$("#customDate").show()
$("#hideCustomDate").show()
$("#showCustomDate").hide()
});
$('#hideCustomDate').click(function(){
$("#customDate").hide()
$("#showCustomDate").show()
$("#hideCustomDate").hide()
});
// showCustomDate

function PrintDiv(divName){
$('#printableData').show();
$('#nonePrint').hide();
var printContents = document.getElementById(divName).innerHTML;
var originslContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originslContents;
$('#printableData').hide();
$('#nonePrint').show();
}
</script>
@endsection
