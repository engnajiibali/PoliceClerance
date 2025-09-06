@extends('include.master');

@section('content')
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="box box-primary box-solid">
<div class="box-header with-border">
<h3 class="box-title">Add New Item</h3>
<!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body">    
<small>Please fill in the information below. The field labels marked with <strong style="color: red;"> * </strong> are required input fields.</small>
<hr>
<!-- <div id="alertMsg"></div> -->
<div>


	@if ($errors->any())
<ul>
@foreach (errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</ul>
@endif
</div>
<form id="pForm"  method="post" action="{{route('products.saveData')}}">
	@csrf
	@method('post')
<input type="hidden" name="company_id" id="company_id" value=" 1 ">
<input type="hidden" name="product_id" id="product_id" value="0">
<input type="hidden" name="type" id="type" value="new">
<div class="row">
<div class="col-xl-6 col-lg-6 col-12 form-group">
<label>Product Type</label>
<select class="form-control" id="Product_type" name="Product_type" readonly="">
<option selected="selected" value="Standard">Standard</option>
<option value="Service">Service</option>
</select>
</div>
<div class="col-xl-12 col-lg-6 col-12 form-group">
<label>Product Code<strong style="color: red;"> * </strong></label>
<!-- <input type="text" id="Product_code" name="Product_code"  placeholder="Product code" class="form-control" value=""> -->
<div class="input-group">
                    <input type="text" class="form-control" id="Product_code" name="Product_code" placeholder="Product code">

                    <div class="input-group-addon btn" id="generatebarcode">
                      <i class="fa fa-random"></i>
                    </div>
                  </div>
<span class="error_message" id="Product_codeErr" style="display: none;">Product Code field is required!</span>
</div>
<div class="col-xl-6 col-lg-6 col-12 form-group">
<label>Product Name<strong style="color: red;"> * </strong></label>
<input type="text" id="Product_name" name="Product_name" placeholder="Product Name" class="form-control" value="">
<span class="error_message" id="Product_nameErr" style="display: none;">Product Name field is required!</span>
</div>
      
<div class="col-xl-6 col-lg-6 col-12 form-group">
<label>Product Description<strong style="color: red;"> * </strong></label>
<input type="text" id="description" name="description" placeholder="Product Description" class="form-control" value="">
</div>

     
<div class="col-xl-12 col-lg-6 col-12 form-group">
<label>Brand<strong style="color: red;"> * </strong></label>
<div class="input-group">
<select class="form-control" id="Product_brand" name="Product_brand">
<option value="8"> Brand name 1</option></select>
<span class="error_message" id="Product_brandErr" style="display: none;">Please select Brand!</span>
<div class="input-group-addon" data-toggle="modal" data-target="#brand_modal">
<i class="fa fa-plus"></i>
</div>
</div>
<!-- /.input group -->
</div>



<div class="col-xl-12 col-lg-6 col-12 form-group">
<label>Category<strong style="color: red;"> * </strong></label>
<div class="input-group">
<select class="form-control select2" id="Product_category" name="Product_category">
<option value="8"> Category name 1</option></select>
<span class="error_message" id="Product_categoryErr" style="display: none;">Please select Category!</span>
<div class="input-group-addon" data-toggle="modal" data-target="#category_modal">
<i class="fa fa-plus"></i>
</div>
</div>
<!-- /.input group -->
</div>
<div class="col-xl-12 col-lg-6 col-12 form-group">
<label>Product Unit <strong style="color: red;"> * </strong></label>
<div class="input-group">
<select class="form-control" id="Product_unit" name="Product_unit">
<option value="11"> PCS Unit</option></select>
<span class="error_message" id="Product_unitErr" style="display: none;">Please select Unit!</span>
<div class="input-group-addon" data-toggle="modal" data-target="#unit_modal">
<i class="fa fa-plus"></i>
</div>
</div>
<!-- /.input group -->
</div>
<div class="col-xl-12 col-lg-6 col-12 form-group">
<label>Retail Price  </label>
<input type="number" id="Product_price" name="Product_price" class="form-control" value="0" step="0.01">
<span class="error_message" id="Product_priceErr" style="display: none;">Retail  Price field is required!</span>
</div>









</div>
<hr>


</div>

<div class="modal-footer">
<button type="Reset" class="btn btn-secondary">Reset</button>
<a href="index.php?page=14" type="button" class="btn btn-danger">Cancel</a>
<button name="submit" id="savebtn" class="btn btn-primary">Save changes</button>
</div>

</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
@endsection