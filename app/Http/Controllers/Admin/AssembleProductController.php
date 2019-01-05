<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssembleProduct;
use Form;

class AssembleProductController extends Controller
{
    public function index()
    {
    	$categories=\App\Models\CategoryDescription::whereIn('categories_id',array(1,2,3))->pluck('categories_name','categories_id')->toArray();
    	$message=session('message');

    	return view('admin.assemble_products',compact('categories','message'));

    }

    public function getAssembleProducts()
    {
          $result=[];
      
          foreach(AssembleProduct::all() as $key =>$value):

          	$statusHtml='<span class="m-switch m-switch--icon ">
			<label>'.Form::checkbox('status',$value->assemble_product_id,$value->status,array('class'=>'changeStatus')).'<span></span></label></span>';

          	$result[]=array('assemble_product_id'=>$value->assemble_product_id,'products_name'=>$value->productdescription->products_name,'supported_products'=>implode(' , ', $this->supportedproducts($value)),'product_price'=>$value->product->products_price,'status'=>$statusHtml,'categories_name'=>$value->categorydescription->categories_name,'action'=>Form::open(array('url'=>'admin/assemble_product/'.$value->assemble_product_id ,'method'=>'delete','style'=>'display:inline;','class'=>'delete_with_warning')).'<button type="submit" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only delete__modal">
                                                            <i class="fa fa-trash"></i>
                                                </button>'.
                                             Form::close());

          endforeach;
          return response()->json($result);
    }
    public function store(Request $request)
    {

       $request->validate(array('category'=>'required','product'=>'required'));
       $data=array('categories_id'=>$request->category,'products_id'=>$request->product,'status'=>1);
       if(count($request->supported_product)>0):
       	$data['has_support']=1;

       endif;
   
       if($AssembleProduct=AssembleProduct::create($data)):
         if(count($request->supported_product)>0):
         	$supported_products=$this->SupportedProductsData($request);
         	$AssembleProduct->supportedproduct()->createMany($supported_products);
         endif;
          $request->session()->flash('message','The Assemble Product added successfully!');
         return response()->json(array('status'=>'success'));
     else:
     	  return response()->json(array('status'=>'error'));
       endif;




    }

    public function products_by_category(\App\Models\Category $category)
    {
    	$products=$category->productcategory->pluck('products_id')->toArray();
    	if(count($products) > 0):
    		$products=\App\Models\ProductDescription::whereIn('products_id',$products)->pluck('products_name','products_id');
    	   return response()->json($products);
    	endif;
    }

    public function SupportedProductsData($request)
    {
    	$data=array_map(function($val)
    		{
    			return array('supported_products_id'=>$val);
    		}, $request->supported_product);
    	return $data;
    	

    }

    public function supportedproducts($assemble_product)
    {
    	$data=[];
       foreach($assemble_product->supportedproduct as $product)
       	{
       		$data[]= $product->productdescription->products_name;
       	}
       	return $data;
    }

    public function ChangeStatus(AssembleProduct $assembleproduct)
    {
    	if($assembleproduct->status):
    		$assembleproduct->status=0;
    	else:
    		$assembleproduct->status=1;
    	endif;
    	$response=$assembleproduct->save()?
    	array('status'=>'success','message'=>'status is updated successfully !'):array('status'=>'error');
    	return response()->json($response);

    }

    public function deleteProduct(AssembleProduct $assembleproduct)
    {
    	if($assembleproduct->delete()):
    	return redirect()->back()->withmessage('The assemble product deleted successfully!');
    else:
    	return redirect()->back();
    endif;
    }
}
