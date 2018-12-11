	@extends('admin.layouts.master')
	@section('content')

       <div class="m-grid__item m-grid__item--fluid m-wrapper">
					
					<div class="m-content">
						
						<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											List Product
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
												<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
													<i class="la la-ellipsis-h m--font-brand"></i>
												</a>
												<div class="m-dropdown__wrapper">
													<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
													<div class="m-dropdown__inner">
														<div class="m-dropdown__body">
															<div class="m-dropdown__content">
																<ul class="m-nav">
																	<li class="m-nav__section m-nav__section--first">
																		<span class="m-nav__section-text">
																			Quick Actions
																		</span>
																	</li>
																	<li class="m-nav__item">
																		<a href="" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-share"></i>
																			<span class="m-nav__link-text">
																				Create Post
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__item">
																		<a href="" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-chat-1"></i>
																			<span class="m-nav__link-text">
																				Send Messages
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__item">
																		<a href="" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-multimedia-2"></i>
																			<span class="m-nav__link-text">
																				Upload File
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__section">
																		<span class="m-nav__section-text">
																			Useful Links
																		</span>
																	</li>
																	<li class="m-nav__item">
																		<a href="" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-info"></i>
																			<span class="m-nav__link-text">
																				FAQ
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__item">
																		<a href="" class="m-nav__link">
																			<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																			<span class="m-nav__link-text">
																				Support
																			</span>
																		</a>
																	</li>
																	<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
																	<li class="m-nav__item m--hide">
																		<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
																			Submit
																		</a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">
								@if (isset($message))
											<!--success Message -->
											<div class="alert alert-{{$class}} alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
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
											<a href="{{URL::to('admin/product/create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
												<span>
													<i class="la la-cart-plus"></i>
													<span>
														Add Product
													</span>
												</span>
											</a>
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
									</div>
								</div>
								<!--end: Search Form -->
		<!--begin: Datatable -->
								<table class="m-datatable" id="html_table" width="100%">
									<thead>
										<tr>
											<!-- <th title="Field #1">
												 ID
											</th>
											<th title="Field #2">
												Product Name
											</th>
											<th title="Order Date">
												Image
											</th>
											<th title="Field #4">
												MRP
											</th>
											<th title="Field #5">
												Sale Price
											</th>
											<th title="Field #6">
												Brand
											</th>
											<th title="Field #7">
												Url
											</th>
											<th title="Field #8">
												Action
											</th> -->
											
										</tr>
									</thead>
									<tbody>
										<tr>
										<!-- 	<td>
												1
											</td>
											<td>
												Computers and Accessories 
											</td>
											<td>
												<img src="assets/app/media/img/client-logos/logo5.png" alt="">
											</td>
											
											<td>
												20
											</td>
											<td>
												60
											</td>
											<td>
												<span class="m-switch m-switch--icon">
																		<label>
																			<input type="checkbox" checked="checked" name="">
																			<span></span>
																		</label>
												</span>
											</td>
											<td>ddff</td>
											<td>
												<a href="#" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-archive"></i>
												</a>
												<a href="#" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-history"></i>
												</a>
												<a href="#" class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x">
												<i class="fa fa-microphone"></i>
												</a>
												<a href="#" class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only">
															<i class="fa fa-save"></i>
												</a>
											</td> -->
										</tr>
										
									</tbody>
								</table>
								<!--end: Datatable -->
							</div>
						</div>
					</div>
				</div>







		@endsection

		@section('onPageScript')
   <script src="{{asset('public/assets/demo/default/custom/components/datatables/base/html-table.js')}}" type="text/javascript"></script>
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
   </script>
		@endsection