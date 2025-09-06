@extends('include.master')
@section('content')
<section class="content-header">
<h1>
{{ $pageTitle }}
</h1>
</section>
<!-- Main content -->
<section class="content">
<!-- <div id="alertMsg"></div> -->
<div>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> {{Session::get('success')}}</h4>
</div>
@endif
@if (Session::has('fail'))
<div class="alert alert-success alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-check"></i> {{Session::get('fail')}}</h4>
</div>
@endif
</div>
<div class="row">
<div class="col-md-8">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Notice</h3>
<div class="direct-chat-msg">
<div class="direct-chat-info clearfix">
<span class="direct-chat-name pull-left">{{$Sms->campign_name}}</span>
<span class="direct-chat-timestamp pull-right">{{ diffForHumans($Sms->created_at) }}</span>
</div>
<div class="direct-chat-text" style="margin: 5px 0 0 5px;">
{{$Sms->messages}}
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">Notice</h3>
<div class="box-tools pull-right">
<!-- You can add search or action buttons here if needed -->
</div>
</div>

<div class="box-body no-padding">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Campaign Name</th>
<th>Phone Number</th>
<th>Status</th>

</tr>
</thead>
<tbody>
@forelse ($messages as $sms)
<tr>
<td>{{ $sms->campign_name }}</td>
<td>{{ $sms->telephone }}</td>
<td>
<span class="label {{ $sms->status == 'Sent' ? 'label-success' : 'label-danger' }}">
{{ $sms->deliveryStatus }}
</span>
</td>

</tr>
@empty
<tr>
<td colspan="3" class="text-center">No messages available.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
<div class="box-footer no-padding">
<div class="mailbox-controls">
<!-- Add any footer controls if needed -->
{{ $messages->links() }} <!-- Pagination links if the notices collection is paginated -->
</div>
</div>
</div>
</div>

</div>

</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Your JavaScript/jQuery code -->

<script>

@endsection
