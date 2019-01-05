	@extends('admin.layouts.master')
	@section('content')

       <div class="m-grid__item m-grid__item--fluid m-wrapper">
					
					<div class="m-content">
						
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Assemble Product List
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
											
										</div>
							</div>
							<div class="m-portlet__body">
								@if (isset($message))
											<!--success Message -->
											<div class="alert alert-success alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
								
								{{$message}}
							</div>
							@endif
								<!--begin: Search Form -->
								<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
									<div class="row align-items-center">
										<div class="col-xl-8 order-2 order-xl-1">
											<div class="form-group m-form__group row align-items-center">
												<div class="col-md-4">
													<div class="m-input-icon m-input-icon--left">
														<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
														<span class="m-input-icon__icon m-input-icon__icon--left">
															<span>
																<i class="la la-search"></i>
															</span>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xl-4 order-1 order-xl-2 m--align-right">
											<button data-toggle="modal" data-target="#m_brand" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill" >
												<span>
													<i class="la la-cart-plus"></i>
													<span id="addAssembProd">
														Add Product
													</span>
												</span>
											</buttona>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
		<!--begin: Datatable -->
								<table class="m-datatable" id="html_table" width="100%">
									<thead>
																	</thead>
									<tbody>
										
										
									</tbody>
								</table>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>



    <!--modal start -->

      <div class="modal fade" id="m_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add Assemble Material
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="la la-remove"></span>
										</button>
									</div>
									{!! Form::open(array('url'=>'admin/assemble_product','method'=>'POST','class'=>'m-form m-form--fit m-form--label-align-right','id'=>'addAssembleProduct'))!!}
									
										
                                        <div class="modal-body">
										
											
											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12" style="margin-top:-40px;">
													Select Category
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12" style="margin-top:-40px;">
													{!!Form::select('category',array(null=>'Please choose one..')+$categories,'',array('class'=>'form-control m-bootstrap-select m_selectpicker','id'=>'fetchproducts'))!!}
												  
												</div>
											</div>

											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12" style="margin-top:-40px;">
													Select Product
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12" style="margin-top:-40px;">
													{!!Form::select('product',array(null=>'Please choose one..'),'',array('class'=>'form-control m-bootstrap-select m_selectpicker ','id'=>'catWiseProduct'))!!}
												  
												</div>
											</div>

											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12" style="margin-top:-40px;">
													Supported Category
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12" style="margin-top:-40px;">
													{!!Form::select('supported_category',array(null=>'Please choose one..')+$categories,'',array('class'=>'form-control m-bootstrap-select m_selectpicker ','id'=>'supportedCategory'))!!}
												  
												</div>
											</div>


											<div class="form-group m-form__group row">
										<label class="col-form-label col-lg-3 col-md-3 col-sm-12">
											Select Supported Product
										</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
											{!!Form::select('supported_product[]',array(),'',array('class'=>'form-control m-bootstrap-select m_selectpicker','multiple'=>'multiple','id'=>'supportedProducts'))!!}
										
										</div>
							            </div>
                                        </div>
                                           
										<div class="modal-footer">
										    <button type="button" class="btn btn-brand m-btn" id="add_assemble_product">
												Submit
											</button>
											<button type="button" class="btn btn-secondary m-btn" data-dismiss="modal">
												Close
											</button>
											
										</div>
									{!! Form::close() !!}
								</div>
							</div>
						</div>

    <!--end modal-->



		@endsection

		@section('onPageScript')
   <script src="{{asset('public/assets/demo/default/custom/components/datatables/base/assemble_table.js')}}" type="text/javascript"></script>
   <script type="text/javascript">
   	var currentForm='';
  $(document).on('submit','.delete_with_warning',function(e)
  {
  	currentForm=$(this);
  	$('#myModal').modal('show');
  	e.preventDefault();
  })

  $(document).on('click','.delete__confirmed',function()
  {
  	if(currentForm){
  		currentForm.removeClass('delete_with_warning');
  		currentForm.submit();
  	}
  })

  $(document).on('change','#fetchproducts',function()
  {
  	var curCategory=$(this).val();
  	appender(curCategory,'#catWiseProduct')
  	
  })
  $(document).on('change','#supportedCategory',function()
  {
  	var curCategory=$(this).val();
  	appender(curCategory,'#supportedProducts')
  	
  })

  function appender(id,appendTo)
  {
  	$.get($BASE__URL+"/fetchproducts/"+id, function(data, status){
  		 $(appendTo+' option:not(:first)').remove();
  		$.each(data,function(k,v)
                           {
                              $(appendTo)
                               .append($("<option></option>")
                               .attr("value",k)
                               .text(v)); 
                            });
                           $('.m_selectpicker').selectpicker('refresh');
  	})
  }

  $(document).on('click','#add_assemble_product',function(e)
    {

      saveByAjax('addAssembleProduct');
      e.preventDefault();
    })
  $(document).on('click','#addAssembProd',function()
  {
  	$('#addAssembleProduct')[0].reset();
  	$('.text-danger').remove();
  	$('.m_selectpicker').selectpicker('refresh');
  })

  $(document).on('click','.changeStatus',function()
  {
  	$.get($BASE__URL+"/change_status/"+$(this).val(), function(data, status){
  		if(data.status=='success'){

  			$('.m-portlet__body').prepend('<div class="alert alert-success alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'+data.message+'</div>');
  			setTimeout(function(){ 
  				$('.alert-dismissible').remove();
  			 }, 2000);

  		}
  })
  })

   </script>
		@endsection