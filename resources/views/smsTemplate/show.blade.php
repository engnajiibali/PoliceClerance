@extends('include.master')
@section('content')
<section class="content-header">
<h1>
{{ $pageTitle }}
</h1>
</section>

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

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-md-3">
<a href="{{asset('sms/create')}}" class="btn btn-primary  margin-bottom">Send Bulk SMS</a>
<a href="{{asset('/sendSMS')}}" class="btn btn-primary  margin-bottom">Send SMS</a>
<div class="box box-solid">
<div class="box-header with-border">
<h3 class="box-title">Folders</h3>
<div class="box-tools">
<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
</button>
</div>
</div>
<div class="box-body no-padding">
<ul class="nav nav-pills nav-stacked">
<li class="active"><a href="{{asset('smsreader/')}}"><i class="fa fa-envelope"></i> All messages
<span class="label label-primary pull-right">{{$unreadSMS}}</span></a></li>
<li><a href="{{asset('evc/')}}"><img src="{{asset('core/public/currency/evc.png')}}" width="30">  EVC Plus <span class="label label-primary pull-right">{{$unreadEvc}}</span></a></li>
<li><a href="{{asset('eDahab/')}}"><img src="{{asset('core/public/currency/edahab.png')}}" width="30"> </i> eDahab  <span class="label label-primary pull-right">{{$unreadedahab}}</span></a></li>
<li><a href="{{asset('premierWallet/')}}"><img src="{{asset('core/public/currency/Wallet.png')}}" width="30">  Premier Wallet <span class="label label-primary pull-right">{{$unreadWallet}}</span></a>
</li>
<li><a href="{{asset('Other/')}}"><i class="fa fa-folder-open"></i> Other Messages <span class="label label-primary pull-right">{{$unreadOther}}</span></a></li>
<li><a href="{{asset('contacts/')}}"><i class="fa fa-book"></i> Contacts</a></li>
<li><a href="{{asset('sms/')}}"><i class="fa fa-paper-plane"></i> Bulk SMS</a></li>
<li><a href="{{ route('sms.edit', 1) }}"><i class="fa fa-cog"></i> SMS Configration</a></li>
</ul>
</div>
</div>
</div>
<div class="col-md-9">
<div class="box box-primary">
<div class="box-header with-border">
<h3 class="box-title">{{$template->name}}</h3>
</div>
<div class="direct-chat-text" style="margin: 2%;">
{{$template->body}}
</div>

<br>
</div>

</div>

</div>

</section>

@endsection
