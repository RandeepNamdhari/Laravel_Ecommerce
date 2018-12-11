	@extends('admin.layouts.master')
	@section('content')

			<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">

							<div class="mr-auto">

								<h3 class="m-subheader__title ">
									Add Product
								</h3>
							</div>
							<div>
								<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
									<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
										<i class="la la-plus m--hide"></i>
										<i class="la la-ellipsis-h"></i>
									</a>
									<div class="m-dropdown__wrapper">
										<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
										<div class="m-dropdown__inner">
											<div class="m-dropdown__body">
												<div class="m-dropdown__content">
													<ul class="m-nav">
														<li class="m-nav__section m-nav__section--first m--hide">
															<span class="m-nav__section-text">
																Quick Actions
															</span>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-share"></i>
																<span class="m-nav__link-text">
																	Activity
																</span>
															</a>
														</li>
														<li class="m-nav__item">
															<a href="" class="m-nav__link">
																<i class="m-nav__link-icon flaticon-chat-1"></i>
																<span class="m-nav__link-text">
																	Messages
																</span>
															</a>
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
														<li class="m-nav__separator m-nav__separator--fit"></li>
														<li class="m-nav__item">
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
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							
							<div class="col-xl-12 col-lg-8">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link {{$tab['general']}}" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														General
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link {{$tab['images']}}" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
														Images
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link {{$tab['feature']}}" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
														Feature
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link {{$tab['option']}}" data-toggle="tab" href="#m_user_profile_tab_5" role="tab">
														Option
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link {{$tab['seo']}}" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
														SEO
													</a>
												</li>
											</ul>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="m-portlet__nav">
												<li class="m-portlet__nav-item m-portlet__nav-item--last">
													<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
														<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
															<i class="la la-gear"></i>
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
					<div class="tab-content">
							@if (isset($message))
											<!--success Message -->
											<div class="alert alert-{{$class}} alert-dismissible fade show   m-alert m-alert--square m-alert--air" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
								
								{{$message}}
							</div>
							@endif

                           
					<div class="tab-pane {{$tab['general']}}" id="m_user_profile_tab_1">
					
					{!! Form::open(array('url'=>$url,'method'=>$method,'class'=>'m-form m-form--fit m-form--label-align-right','enctype'=>'multipart/form-data','id'=>'m_form_1')) !!}
				
												
													
												
						<div class="row">
							<div class="col-lg-8">
								<!--begin::Portlet-->
								<div class="m-portlet">
									
									<!--begin::Form-->
									<div class="m-form">
										<div class="m-portlet__body">


								   

							<!--end message -->
											<div class="m-form__section m-form__section--first">
												<div class="form-group m-form__group">
													<label for="example_input_full_name">
														Product Name:
													</label>

													{!! Form::text('product_name',(isset($product))?$product->productdescription->products_name:'',array('class'=>'form-control m-input','placeholder'=>'Product Name')) !!}
														<span class="form-control-feedback text-danger">{{ $errors->first('product_name') }}</span>
													
													
												</div>
												
												<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														MRP:
													</label>
													{!! Form::text('mrp',(isset($product))?$product->products_price:'',array('class'=>'form-control m-input','placeholder'=>'MRP')) !!}
											
													<span class="form-control-feedback text-danger">{{ $errors->first('mrp') }}</span>

												</div>
												<div class="col-lg-4">
													<label class="">
														Selling price:
													</label>
													{!! Form::text('selling_price',(isset($product->special))?$product->special->specials_new_products_price:'',array('class'=>'form-control m-input','placeholder'=>'Selling Prince')) !!}
											 <span class="form-control-feedback text-danger">{{ $errors->first('selling_price') }}</span>

													
												</div>
												<div class="col-lg-4">
													<label class="">
														Shipping price:
													</label>
											{!! Form::text('shipping_price',(isset($product))?$product->shipping_price:'',array('class'=>'form-control m-input','placeholder'=>'Shipping Price')) !!}
											<span class="form-control-feedback text-danger">{{ $errors->first('shipping_price') }}</span>
													
												</div>
												</div>
												<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Model No:
													</label>
													{!! Form::text('model_no',(isset($product))?$product->products_model:'',array('class'=>'form-control m-input','placeholder'=>'Model No.')) !!}
												<span class="form-control-feedback text-danger">{{ $errors->first('model_no') }}</span>
													
												</div>
												<div class="col-lg-4">
													<label class="">
														Quantity:
													</label>
													{!! Form::text('quantity',(isset($product))?$product->products_quantity:'',array('class'=>'form-control m-input','placeholder'=>'Quantity')) !!}
											
													<span class="form-control-feedback text-danger">{{ $errors->first('quantity') }}</span>
												</div>
												<div class="col-lg-4">
													<label class="">
														Video ID:
													</label>
													{!! Form::text('video_id',(isset($product))?$product->video_id:'',array('class'=>'form-control m-input','placeholder'=>'Youtube Video Id')) !!}
											
													
												</div>
												
												</div>
												<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Brand:
													</label>
													{!! Form::select('brand',[null=>'please select..']+$manufactures->pluck('manufacturers_name','manufacturers_id')->toArray(),(isset($product))?$product->manufacturers_id:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
								
													<span class="form-control-feedback text-danger">{{ $errors->first('brand') }}</span>
												</div>
												<div class="col-lg-4">
												   <label class="">
														Vendor:
													</label>
												{!! Form::select('vendor',[null=>'please select..']+$vendors->pluck('vendor_name','id')->toArray(),(isset($product))?$product->VendorName:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
													
													<span class="form-control-feedback text-danger">{{ $errors->first('vendor') }}</span>
													
												</div>
												<div class="col-lg-4">
													<label class="">
														GST HSN Code:
													</label>
													{!! Form::select('hsn_code',[null=>'please select..']+$hsn_codes->where('status',1)->pluck('tax_slab','id')->toArray(),(isset($product))?$product->hsntaxSlab:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
													
													<span class="form-control-feedback text-danger">{{ $errors->first('hsn_code') }}</span>
												</div>
												</div>
												<div class="form-group m-form__group row">
												<div class="col-lg-4">
													<label>
														Warranty:
													</label>
											{!! Form::select('warranty',[null=>'please select..']+$warranties->pluck('warranty_type','id')->toArray(),(isset($product))?$product->warranties:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}

											<span class="form-control-feedback text-danger">{{ $errors->first('warranty') }}</span>
													
												</div>
												<div class="col-lg-4">
												   <label class="">
														Return Policy:
													</label>
												{!! Form::select('return_policy',[null=>'Please Select'] +$return_policies->pluck('return_policy','id')->toArray(),(isset($product))?$product->return_policies:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
													
													<span class="form-control-feedback text-danger">{{ $errors->first('return_policy') }}</span>
													
												</div>
												<div class="col-lg-4">
													<label>
														Delivery in:
													</label>
							{!! Form::select('delivery',[null=>'Please Select'] +$deliveries->pluck('delivery_in','delivery_id')->toArray(),(isset($product))?$product->delivery:'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}

							<span class="form-control-feedback text-danger">{{ $errors->first('delivery') }}</span>

													
												</div>
												</div>
												
												<div class="form-group m-form__group row">
												<div class="col-lg-2">
													<label>
														COD:
													</label>
													{!! Form::checkbox('cod',1,(isset($product))?$product->cod:'', array('data-switch'=>'true','id'=>'m_switch_1')) !!}
												
													
												</div>
												<div class="col-lg-2">
													<label>
														Sale:
													</label>
													{!! Form::checkbox('sale',1,(isset($product))?$product->sale:'', array('data-switch'=>'true','id'=>'m_switch_1','data-on-color'=>'info')) !!}
												
													
												</div>
												<div class="col-lg-2">
													<label>
														Hot:
													</label>
													{!! Form::checkbox('hot',1,(isset($product))?$product->hot:'', array('data-switch'=>'true','id'=>'m_switch_1','data-on-color'=>'success','data-off-color'=>'warning')) !!}
											
													
												</div>
												<div class="col-lg-2">
													<label>
														Trending:
													</label>
													{!! Form::checkbox('trending',1,(isset($product))?$product->trending:'', array('data-switch'=>'true','id'=>'m_switch_1','data-on-color'=>'danger')) !!}
												
													
												</div>
												<div class="col-lg-2">
													<label>
														Verified:
													</label>													{!! Form::checkbox('verified',1,(isset($product))?$product->verified:'', array('data-switch'=>'true','id'=>'m_switch_1','data-on-color'=>'danger')) !!}
												
													
												</div>
												<div class="col-lg-2">
													<label>
														Cancellation:
													</label>											{!! Form::checkbox('cancellation',1,(isset($product))?$product->cancellation:'', array('data-switch'=>'true','id'=>'m_switch_1','data-on-color'=>'danger')) !!}
													
												</div>			
												</div>
													
												
												
												
											</div>
										</div>
										
									</div>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
		<!--begin::Portlet-->
								
								<!--end::Portlet-->
							</div>
							<div class="col-lg-4">
								<!--begin::Portlet-->
								<div class="m-portlet">
									
									<!--begin::Form-->
									<div class="m-form m-form--fit">
										<div class="m-portlet__body">
											
											<div class="m-form__section m-form__section--first">
												
											
												<div class="m-form__heading">
													<h3 class="m-form__heading-title">
														 Upload Images:
													</h3>
												</div>
												<div class="form-group m-form__group"> 
												<div class="m-dropzone dropzone" action="{{URL::to('admin/upload_product_image')}}" id="m-dropzone-one">
												<div class="m-dropzone__msg dz-message needsclick">
													<h3 class="m-dropzone__msg-title">
														Drop files here or click to upload.
													</h3>
													<span class="m-dropzone__msg-desc">
														This is just a demo dropzone. Selected files are
														<strong>
															not
														</strong>
														actually uploaded.
													</span>
												
												</div>
												</div>
												{!! Form::hidden('product_image',(isset($product))?$product->products_image:'',array('id'=>'product_image_single')) !!}

												{!! Form::hidden('image_value_product',(isset($product) && $product->products_image !='')? Storage::disk('s3')->url($product->products_image):'',array('id'=>'image_drop_value')) !!}

												</div>
												<div class="form-group m-form__group"> 
												<div class="m-form__heading">
													<h3 class="m-form__heading-title">
														 Select Subcategory:
													</h3>
												</div>
												   
													
													<div id="m_tree_3" class="tree-demo"></div>
													<hr>
													<span class="form-control-feedback text-danger">{{ $errors->first('category') }}</span>
													{!! Form::hidden('category',(isset($product->productcategory))?implode(',',$product->productcategory->pluck('categories_id')->toArray()):'',array('id'=>'selected_categories')) !!}
													
												</div>
												
												
												
											</div>
											
											
										</div>
										
									</div>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							</div>
						</div>
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Description:
													</label>
													<div class="col-lg-10">
														{!!Form::textarea('description',(isset($product->productdescription))?$product->productdescription->products_description:'',array('class'=>'summernote')) !!}

														<span class="form-control-feedback text-danger">{{ $errors->first('description') }}</span>
													<!--    <div class="summernote"></div> -->
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														HighLight:
													</label>
													<div class="col-lg-4">
														{!! Form::text('highlight[]',(isset($product->producthighlight[0]))?$product->producthighlight[0]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													 
													</div>
													<div class="col-lg-3">
													 {!! Form::text('highlight[]',(isset($product->producthighlight[1]))?$product->producthighlight[1]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													</div>
													<div class="col-lg-3">
													 {!! Form::text('highlight[]',(isset($product->producthighlight[2]))?$product->producthighlight[2]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														HighLight:
													</label>
													<div class="col-lg-4">
													 {!! Form::text('highlight[]',(isset($product->producthighlight[3]))?$product->producthighlight[3]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													</div>
													<div class="col-lg-3">
													 {!! Form::text('highlight[]',(isset($product->producthighlight[4]))?$product->producthighlight[4]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													</div>
													<div class="col-lg-3">
													 {!! Form::text('highlight[]',(isset($product->producthighlight[5]))?$product->producthighlight[5]->highlight_text:'',array('class'=>'form-control m-input','placeholder'=>'Highlight')) !!}
													</div>
												</div>
												
											</div>
										
											
										</div>
								
								<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Cancel
																</button>
															</div>
														</div>
													</div>                   
													
				{!! Form::close() !!}           
												
											
				
					</div>
							 @if(!empty($product_id))			
					<div class="tab-pane {{$tab['images']}}" id="m_user_profile_tab_2">

						{!! Form::open(array('url'=>'admin/product/images/'.$product_id,'method'=>'post','class'=>'m-form m-form--fit m-form--label-align-right')) !!}
					   
					   <div id="uncommonDIv">
					   </div>
					
												
													
												
						<div class="row">
							<div class="col-lg-6">
								<!--begin::Portlet-->
								<div class="m-portlet">
									
									<!--begin::Form-->
									<div class="m-form">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												<div class="form-group m-form__group">
													<label for="example_input_full_name">
														Product Name:
													</label>
													<div class="m-dropzone dropzone m-dropzone--primary" action="{{URL::to('admin/upload_product_image')}}" id="m-dropzone-two">
												<div class="m-dropzone__msg dz-message needsclick">
													<h3 class="m-dropzone__msg-title">
														Drop files here or click to upload.
													</h3>
													<span class="m-dropzone__msg-desc">
														Upload up to 10 files
													</span>
												</div>
													 </div>
													
												</div>
												
												
												
												
												
												
												
												
											</div>
										
										</div>
										
									</div>


									<!--end::Form-->
								</div>
								<!--end::Portlet-->
		<!--begin::Portlet-->
								
								<!--end::Portlet-->
											  <!--submit button-->
						<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Save changes
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	Cancel
																</button>
															</div>
														</div>
													</div>

													<!--end submit -->

													{!! Form::close() !!}
							</div>

							<div class="col-lg-6">
								<!--begin::Portlet-->
								<div class="m-portlet">
									
									<!--begin::Form-->
									<div class="m-form m-form--fit">
										<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												<div class="m-form__heading">
													<h3 class="m-form__heading-title">
														 Uploaded Images:
													</h3>
												</div>
												<div class="form-group m-form__group">
													
												<table class="table m-table m-table--head-bg-success">
											<thead>
												<tr>
													<th>
														Id
													</th>
													<th>
														Image
													</th>
													<th>
														Image description
													</th>
													<th>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												@foreach($product_images as $image)
												<tr>
													<th scope="row">
														{{$image->id}}
													</th>
													<td>
													<img class="m-widget3__img" alt="" width="50" height="50" src="{{Storage::disk('s3')->url($image->image)}}">
													
													</td>
													<td>
														Stone
													</td>
													<td>
														{!! Form:: open(array('url'=>'admin/delete/product_image/'.$image->id.'/'.$product_id,'method'=>'delete','class'=>'delete_with_warning')) !!}
														<button type="submit"  class="btn btn-danger delete_image_ones">Delete</button>
							   

														{!! Form::close() !!}
													</td>
												</tr>
												@endforeach
												
											</tbody>
										</table>
													
												</div>
												
												
												
											</div>
											
											
										</div>
										
									</div>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							</div>
						</div>

					  

						
									   
					
					
					</div>
					<div class="tab-pane {{$tab['seo']}}" id="m_user_profile_tab_3">
					<div class="m-portlet__body">
											<div class="m-form__section m-form__section--first">
												
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Title:
													</label>
													<div class="col-lg-5">
														 <input type="text" class="form-control m-input" placeholder="Product Name">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Meta Description:
													</label>
													<div class="col-lg-5">
													 <textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
													</div>
													
												</div>
												<div class="form-group m-form__group row">
													<label class="col-lg-2 col-form-label">
														Meta keyword:
													</label>
													<div class="col-lg-5">
													 <textarea class="form-control m-input" id="exampleTextarea" rows="3"></textarea>
													</div>
													
												</div>
												
												
												
												
											</div>
										
											
										</div>
					</div>
					<div class="tab-pane {{$tab['feature']}}" id="m_user_profile_tab_4">
					
					<div class="m-form m-form--fit m-form--label-align-right">
												
													
												
						<div class="row">
							<div class="col-lg-12">
								<!--begin::Portlet-->
							<div class="m-portlet">
							
							<div class="m-portlet__body">
								<!--begin::Section-->
								<div class="m-section">
									<div class="m-section__content">
									   <div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Listing Default Options
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand  m-tabs-line--right m-tabs-line-danger" role="tablist">
												<li class="nav-item m-tabs__item">
													<button type="button" class="btn btn-primary m-btn m-btn--custom" data-toggle="modal" data-target="#m_default_option" id="optionAddDefault">
												  Add Default Option
													</button>
												</li>
												
											</ul>
										</div>
									</div>
										<table class="table table-striped m-table">
											<thead>
												<tr>
													<th>
														ID
													</th>
													<th>
														Option Name
													</th>
													<th>
														Option Value
													</th>
													<th>
														View
													</th>
													<th>
														Sort
													</th>
													
													<th>
														Status
													</th>
													<th>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												@foreach($product_attributes as $attribute)
											
												@if($attribute->is_default==1)
												@if($attribute->productoption)
												
												<tr>
													<th scope="row">
														{{$attribute->products_attributes_id}}
													</th>
													<th>

														{{$attribute->productoption->products_options_name}}
													</th>
													<th>
														{{$attribute->productoptionvalue->products_options_values_name}}
														
													</th>
													
													<th>
														{{$attribute->view}}
													</th>
													<th>
														{{$attribute->sort}}
													</th>
													
													<td>
									<span class="m-switch m-switch--icon">
												<label>
								<input type="checkbox" checked="checked" name="">
																			<span></span>
																		</label>
																	</span>
													</td>
													<td>
												<a href="#" data-toggle="modal" data-target="#m_default_option_edit" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only" id="option__edit" data-obj="{{json_encode($attribute)}}">
															<i class="fa fa-edit"></i>
												</a>
												  {!! Form::open(array('url'=>'admin/delete_attribute/'.$attribute->products_attributes_id.'/'.$product_id,'method'=>'delete','style'=>'display:inline;')) !!}
                                                <button type="submit" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="fa fa-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
												
													</td>
												</tr>
												@endif
												@endif
												@endforeach
											</tbody>
										</table>
										
									</div>
									
								</div>
								<div class="m-section">
									<div class="m-section__content">
										<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Listing Additional Products Options
												</h3>
											</div>
										</div>
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand  m-tabs-line--right m-tabs-line-danger" role="tablist">
												
												<li class="nav-item m-tabs__item">
													<button type="button" class="btn btn-primary m-btn m-btn--custom" data-toggle="modal" data-target="#m_default_option" id="optionAdditional">
												  Add Additional Option
													</button>
												</li>
												
											</ul>
										</div>
									</div>
										<table class="table table-striped m-table">
											<thead>
												<tr>
													<th>
														ID
													</th>
													<th>
														Option Name
													</th>
													<th>
														Option Value
													</th>
													<th>
														Sort
													</th>
													<th>
														View
													</th>
													<th>
														Price Prefix
													</th>
													<th>
														Status
													</th>
													<th>
														Action
													</th>
												</tr>
											</thead>
											<tbody>
												@foreach($product_attributes as $attribute)

                                                @if($attribute->is_default==0)
                                                @if($attribute->productoption)
                                                <tr>
                                                    <th scope="row">
                                                        {{$attribute->products_attributes_id}}
                                                    </th>
                                                    <th>
                                                        {{$attribute->productoption->products_options_name}}
                                                    </th>
                                                    <th>
                                                        {{$attribute->productoptionvalue->products_options_values_name}}
                                                        
                                                    </th>
                                                    
                                                    
                                                    <th>
                                                        {{$attribute->sort}}
                                                    </th>
                                                    <th>
                                                        {{$attribute->view}}
                                                    </th>
                                                    <th>
                                                        {{$attribute->price_prefix.$attribute->options_values_price}}
                                                    </th>
                                                    
                                                    <td>
                <span class="m-switch m-switch--icon">
                <label>
                 <input type="checkbox" checked="checked" name="">
                                                 <span></span>
                                                             </label>
                                                                    </span>
                                                    </td>
                                                    <td>
                                                <a href="#" data-toggle="modal" data-target="#m_default_option_edit" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only" id="additinal__edit" data-obj="{{json_encode($attribute)}}">
                                                            <i class="fa fa-edit"></i>
                                                </a>

                                                {!! Form::open(array('url'=>'admin/delete_attribute/'.$attribute->products_attributes_id.'/'.$product_id,'method'=>'delete','style'=>'display:inline;')) !!}
                                                <button type="submit" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="fa fa-trash"></i>
                                                </button>
                                                {!! Form::close() !!}
                                                
                                                    </td>
                                                </tr>
                                                @endif
                                                @endif
                                                @endforeach
												
												
											</tbody>
										</table>
										
									</div>
									
								</div>
								<!--end::Section-->
							</div>
							<!--end::Form-->
						</div>
								<!--end::Portlet-->
		<!--begin::Portlet-->
								
								<!--end::Portlet-->
							</div>
							
						</div>
									   
					</div>
					
					</div>
					<div class="tab-pane {{$tab['option']}}" id="m_user_profile_tab_5">
					
					<div class="m-form m-form--fit m-form--label-align-right">
												
													
												
						<div class="row">
						<div class="col-xl-12 col-lg-8">
                                <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                                    <div class="m-portlet">
                            
                            <div class="m-portlet__body">
                                <!--begin::Section-->
                                <div class="m-section">
                                    <div class="m-section__content">
                                       <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <span class="m-portlet__head-icon m--hide">
                                                    <i class="la la-gear"></i>
                                                </span>
                                                <h3 class="m-portlet__head-text">
                                                    Faceted Filter
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand  m-tabs-line--right m-tabs-line-danger" role="tablist">
                                                <li class="nav-item m-tabs__item">
                                                    
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                        <table class="table table-striped m-table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        ID
                                                    </th>
                                                    <th>
                                                        Filter Name
                                                    </th>
                                                    <th>
                                                        Selected Value
                                                    </th>
                                                    <th>
                                                        Filter Value
                                                    </th>
                                                    
                                                    
                                                    <!-- <th>
                                                        Action
                                                    </th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach($pr_filters['filters'] as $index =>$filter)
               @php $existingfilters[$index]=[];  @endphp
                                                <tr>
                                                    <th scope="row">
                                                     {{$filter->filter_id}}
                                                    </th>
                                                    <td>
                                                        {{$filter->filter_name}}
                                                    </td>

                                                    <td>
                                                        <ul class="list-group">
                      @foreach($pr_filters['productfilters'] as $idex=> $productfil)
                       @php 
                     $cur=$productfil->filterOption->where('filter_id',$filter->filter_id)->where('filter_option_id',$productfil->filter_option_id)->pluck('option_name');
                        
                      
                    
                     @endphp
                     @if(count($cur)>0)
                     @php 
                     $product_filter_id=$productfil->product_filter_id;
                     $existingfilters[$index][]=$productfil->filter_option_id;
                     @endphp
                      <li style="display: flex;"><span>{{$cur[0]}}</span>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {!! Form::open(array('route' => array('productFilter.destroy', $product_filter_id), 'name'=>'filterform', 'id'=>'filterform', 'method'=>'DELETE', 'class' => 'inline')) !!} 
                            <button type="submit" data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}"  class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-trash" aria-hidden="true"></i></button>
                              {!! Form::close() !!}</li>
                              @endif
                      @endforeach

                    </ul>        
                                                    </td>
                                                   
                                                    <td>
                                                        {!! Form::open(array('url' =>'admin/addproductfilter/'.$pr_filters['productid'], 'name'=>'filterform', 'id'=>'filterform', 'method'=>'post', 'class' => '')) !!}
                                                    
                                                {!! Form::select('filters[]',$filter->filteroption->whereNotIn('filter_option_id',$existingfilters[$index])->pluck('option_name','filter_option_id')->toArray(),'', array('class'=>'form-control m-select2 m_select2_3','multiple'=>'multiple','id'=>'','style'=>'width:50%;')) !!}

                  <span class="text-danger">{{ $errors->first('filters') }}</span>

                <button type="submit" class="btn btn-secondary m-btn m-btn--icon m-btn--pill">
                                                            <span>
                                                                <i class="fa fa-archive"></i>
                                                                <span>
                                                                    Save
                                                                </span>
                                                            </span>
                                                        </button>
                                                    {!! Form::close() !!}
                                                    </td>
                                                    
                                                   <!--  <td>
                                                
                                                <a href="#" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="fa fa-trash"></i>
                                                </a>
                                                
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    
                                </div>
                                
                                <!--end::Section-->
                            </div>
                            <!--end::Form-->
                        </div>
                                    
                                </div>
                            </div>
						</div>
									   
					</div>
					
					</div>
                    @endif
													
					</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<!--Modal-->
								<div class="modal fade" id="m_datepicker_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Bootstrap Date Picker Examples
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="la la-remove"></span>
										</button>
									</div>
									<form class="m-form m-form--fit m-form--label-align-right">
										<div class="modal-body">
											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12">
													Minimum Setup
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<input type="text" class="form-control" id="m_datepicker_1_modal" readonly placeholder="Select date"/>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12">
													Input Group Setup
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<div class="input-group date" >
														<input type="text" class="form-control m-input" readonly  placeholder="Select date" id="m_datepicker_2_modal"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar-check-o"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row m--margin-bottom-20">
												<label class="col-form-label col-lg-3 col-sm-12">
													Enable Helper Buttons
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<div class="input-group date" >
														<input type="text" class="form-control m-input" value="05/20/2017" id="m_datepicker_3_modal"/>
														<div class="input-group-append">
															<span class="input-group-text">
																<i class="la la-calendar"></i>
															</span>
														</div>
													</div>
													<span class="m-form__help">
														Enable clear and today helper buttons
													</span>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-brand m-btn" data-dismiss="modal">
												Close
											</button>
											<button type="button" class="btn btn-secondary m-btn">
												Submit
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!--end modal 1 -->
                        @if($product_id)
						<!--modal 2-->
						 <div class="modal fade" id="m_default_option" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">
											Add Option
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true" class="la la-remove"></span>
										</button>
									</div>

									{!! Form::open(array('url'=>'admin/product_option/'.$product_id,'method'=>'post','class'=>'m-form m-form--fit m-form--label-align-right','id'=>'SaveDefaultOption')) !!}
									
										<div class="modal-body">
											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12">
													Option Name
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													{!! Form::select('options',[null=>'please choose..']+$product_options,'',array('class'=>'form-control m-bootstrap-select m_selectpicker','id'=>'product-options-change')) !!}

													<span class="form-control-feedback text-danger">{{ $errors->first('options') }}</span>
												   
												</div>
											</div>
											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-3 col-sm-12">
													Option Value
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
												   {!! Form::select('product_option_value',[null=>'please choose..'],'',array('class'=>'form-control m-bootstrap-select m_selectpicker','id'=>'product-options-values')) !!}

													<span class="form-control-feedback text-danger">{{ $errors->first('product_option_value') }}</span>
												</div>
											</div>

											 <div class="form-group m-form__group row m--margin-top-20 ___priceprefixdiv" style="display: none;" id="">
												<label class="col-form-label col-lg-2 col-sm-12">
													Price Prefix
												</label>
												<div class="col-lg-3 col-md-3 col-sm-12">

													{!! Form::select('price_prefix',['+'=>'+','-'=>'-'],'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
													
												</div>
												<label class="col-form-label col-lg-2 col-sm-12">
													Price
													</label>
												<div class="col-lg-4 col-md-4 col-sm-12">
													{!! Form::text('price','',array('class'=>'form-control m-input','placeholder'=>'Price change')) !!}
											  
												</div>
											</div>
											<div class="form-group m-form__group row m--margin-top-20">
												<label class="col-form-label col-lg-2 col-sm-12">
													Sort
												</label>
												<div class="col-lg-3 col-md-3 col-sm-12">
													  {!! Form::selectRange('sort',1,10,'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}

													  <span class="form-control-feedback text-danger">{{ $errors->first('sort') }}</span>
												</div>
												<label class="col-form-label col-lg-2 col-sm-12">
													View
												</label>
												<div class="col-lg-4 col-md-4 col-sm-12">

													{!! Form::text('view','',array('class'=>'form-control m-input','placeholder'=>'view')) !!}
												   
												</div>
											</div>
											{!! Form::hidden('is_default',1) !!}
											
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-brand m-btn" data-dismiss="modal">
												Close
											</button>
											<button type="button" class="btn btn-secondary m-btn" id="adddefaultOption">
												Submit
											</button>
										</div>
									{!! Form::close() !!}
								</div>
							</div>
						</div>

						<!--end -->

						<!--three Modal-->
		<!--modal 2-->
                         <div class="modal fade" id="m_default_option_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Edit Option
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="la la-remove"></span>
                                        </button>
                                    </div>

                                    {!! Form::open(array('url'=>'','method'=>'PUT','class'=>'m-form m-form--fit m-form--label-align-right','id'=>'EditDefaultOption')) !!}
                                    
                                        <div class="modal-body">
                                            <div class="form-group m-form__group row m--margin-top-20">
                                                <label class="col-form-label col-lg-3 col-sm-12">
                                                    Option Name
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                    {!! Form::select('options',[null=>'please choose..']+$product_options,'',array('class'=>'form-control m-bootstrap-select m_selectpicker','id'=>'product-options-change')) !!}

                                                    <span class="form-control-feedback text-danger">{{ $errors->first('options') }}</span>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row m--margin-top-20">
                                                <label class="col-form-label col-lg-3 col-sm-12">
                                                    Option Value
                                                </label>
                                                <div class="col-lg-9 col-md-9 col-sm-12">
                                                   {!! Form::select('product_option_value',[null=>'please choose..'],'',array('class'=>'form-control m-bootstrap-select m_selectpicker','id'=>'edit_product-options-values')) !!}

                                                    <span class="form-control-feedback text-danger">{{ $errors->first('product_option_value') }}</span>
                                                </div>
                                            </div>

                                             <div class="form-group m-form__group row m--margin-top-20 ___priceprefixdiv" style="display: none;" id="">
                                                <label class="col-form-label col-lg-2 col-sm-12">
                                                    Price Prefix
                                                </label>
                                                <div class="col-lg-3 col-md-3 col-sm-12">

                                                    {!! Form::select('price_prefix',['+'=>'+','-'=>'-'],'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}
                                                    
                                                </div>
                                                <label class="col-form-label col-lg-2 col-sm-12">
                                                    Price
                                                    </label>
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    {!! Form::text('price','',array('class'=>'form-control m-input','placeholder'=>'Price change')) !!}
                                              
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row m--margin-top-20">
                                                <label class="col-form-label col-lg-2 col-sm-12">
                                                    Sort
                                                </label>
                                                <div class="col-lg-3 col-md-3 col-sm-12">
                                                      {!! Form::selectRange('sort',1,10,'',array('class'=>'form-control m-bootstrap-select m_selectpicker')) !!}

                                                      <span class="form-control-feedback text-danger">{{ $errors->first('sort') }}</span>
                                                </div>
                                                <label class="col-form-label col-lg-2 col-sm-12">
                                                    View
                                                </label>
                                                <div class="col-lg-4 col-md-4 col-sm-12">

                                                    {!! Form::text('view','',array('class'=>'form-control m-input','placeholder'=>'view')) !!}
                                                   
                                                </div>
                                            </div>
                                            {!! Form::hidden('is_default',1) !!}
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-secondary m-btn" id="editaddOption">
                                                Submit
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
@endif
                        <!--end -->
						<!--end-->
				

				@endsection

				@section('onPageScript')
				<script type="text/javascript">

						var selectedForm='';
  $('.delete_with_warning').on('submit',function(e)
  {
  	selectedForm=$(this);
  	$('#myModal').modal('show');
  	e.preventDefault();
  })

  $('.delete__confirmed').on('click',function()
  {
  	if(selectedForm){
  		selectedForm.removeClass('delete_with_warning');
  		selectedForm[0].submit();
  		
  	}
  })

					$(document).on('change','#product-options-change',function()
					{
						changedata($(this).val(),'#product-options-values');
						 })

                    //change data
                    function changedata(value,selector)
                    {

                        $.get( "{{URL::to('admin/get_product_options')}}"+'/'+value, function( data ) {
                            data=JSON.parse(data);

                            //console.log(data);
                           $(selector+' option:not(:first)').remove();
                           
                           $.each(data,function(k,v)
                           {
                              $(selector)
                               .append($("<option></option>")
                               .attr("value",k)
                               .text(v)); 
                            });
                           $('.m_selectpicker').selectpicker('refresh');
                    })
                    }


						//Ajax save
			 $(document).on('click','#adddefaultOption',function(e)
	{

	  saveAjax('SaveDefaultOption');
	  e.preventDefault();
	})

                 $(document).on('click','#editaddOption',function(e)
    {

      saveAjax('EditDefaultOption');
      e.preventDefault();
    })
             


	function saveAjax(formid)
	{
		var dataString = new FormData($("#" + formid)[0]);
		var url=$('#'+formid).attr('action');

	  
	  $.ajax(
	{
		type: "POST",
		url:url,
		data: dataString, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
		contentType: false, // The content type used when sending data to the server.
		cache: false, // To unable request pages to be cached
		processData: false,
		enctype: 'multipart/form-data',
		success: function(data)
		{
		  data=$.parseJSON(data);
		  if(data.status=='success')
			location.reload();
		},
		  error: function (data) {
		var errors = $.parseJSON(data.responseText);

				$.each(errors.errors, function (key, value) {

		  $('#'+formid).find('[name="'+key+'"]').parent('div').next('.text-danger').text(value[0]);
			// $('#' + key).parent().addClass('error');
		});
	}
	  });
	}

$(document).on('click','#optionAddDefault',function()
{
	$('.___priceprefixdiv').css('display','none');
	$('[name="is_default"]').val(1);
    $('.text-danger').text('');
})

$(document).on('click','#optionAdditional',function()
{
	$('.___priceprefixdiv').css('display','flex');
	$('[name="is_default"]').val(0);
    $('.text-danger').text('');
})

$(document).on('click','#option__edit',function()
{
    var obj=JSON.parse($(this).attr('data-obj'));

   
    
    
    $('.___priceprefixdiv').css('display','none');
    
    
     updateform(obj);

    $('[name="is_default"]').val(1);
    
  
})

$(document).on('click','#additinal__edit',function()
{
   var obj=JSON.parse($(this).attr('data-obj'));
    $('#EditDefaultOption').attr('action',"{{URL::to('admin/product_option_edit')}}"+'/'+obj.products_attributes_id);
    
    updateform(obj);

    
    $('.___priceprefixdiv').css('display','flex');
    $('[name="is_default"]').val(0);
    
   
})

function updateform(obj)
{
    $('.text-danger').text('');
    $('#EditDefaultOption').attr('action',"{{URL::to('admin/product_option_edit')}}/"+obj.products_attributes_id);
    $('#EditDefaultOption').find('[name="options"]').val(obj.options_id);
    $('#EditDefaultOption').find('[name="price_prefix"]').val(obj.price_prefix);
    $('#EditDefaultOption').find('[name="sort"]').val(obj.sort);
    $('#EditDefaultOption').find('[name="view"]').val(obj.view);
    $('#EditDefaultOption').find('[name="price"]').val(obj.options_values_price);
    changedata(obj.options_id,'#edit_product-options-values');
setTimeout(function()
    {
        $('#EditDefaultOption').find('[name="product_option_value"] option:selected').removeAttr('selected');
        
        $('#EditDefaultOption').find('[name="product_option_value"]').find('option[value="'+obj.options_values_id+'"]').attr("selected", "selected");
        $('.m_selectpicker').selectpicker('refresh');
    }, 2000)
}



				   
					
				</script>

				@endsection