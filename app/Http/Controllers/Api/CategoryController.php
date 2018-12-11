<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
	public $collection=[];

	public $filters=[];

    public function categoryData($categorySlug)
    {
       $category=\App\Models\Category::where('categories_slug',$categorySlug)->first();

       $result=[];

       if(isset($category->categories_id)):

       	$result['category_name']=$category->categorydescription ? $category->categorydescription->categories_name : '';

       	$result['slug']=$categorySlug;

       	$result['category_tree']=$this->categoryTree($category->categories_id);

       	$result['group_filters']=$this->groupfilters($category->filter_group);

       	$result['products']=$this->categoryProducts($category);

       endif;

       return \Response::json(array('data'=>$result,'status'=>'success'),200);
    }


    public function categoryTree($category,$i=0)
    {
        
        $curCat=\App\Models\Category::find($category);
        
        $res =new \stdClass();
        $res->categories_id=$curCat->categories_id;
        $res->categories_slug=$curCat->categories_slug;
        $res->categories_name=$curCat->categorydescription->categories_name;

        
        array_push($this->collection, $res);

        if($curCat->parent_id > 0):
           $i++;
           
            $this->categoryTree($curCat->parent_id,$i);

        endif;
     
        return array_reverse($this->collection);
    }

    public function groupfilters($id)
    {
      $group=\App\Models\FilterGroup::find($id);

      $data['group_id']=$group->group_id;

      $data['group_name']=$group->group_name;

      $data['group_code']=$group->group_code;

      $data['filters']=array();

      if(count($group->GroupFilter)>0):

      	foreach($group->GroupFilter as $ind =>$filter):

      		if($filter->filter && $filter->filter->display==1):

        $data['filters'][$ind]['filter_name']=$filter->filter->filter_name;
        $data['filters'][$ind]['sort']=$filter->filter->sort;
        $data['filters'][$ind]['filter_code']=$filter->filter->filter_code;
        $data['filters'][$ind]['filter_options']=$filter->filter->filteroption()->orderBy('sort')->get();
    // array_push($this->filters, $curfilter);
    endif;
      	endforeach;

      endif;
     

      return $data;
    }

    public function categoryProducts($category)
    {
    	$data=[];
      foreach($category->productcategory as $in =>$product)
      {

      	 $data[]=$this->productData($product->products_id);
      }

      return $data;
    }

        public function productData($product)
    {
        
        $product=\App\Models\Product::find($product);//('products_slug','=',$products_slug)->first();
      
        $result=array();
        
   
        if(isset($product->products_id)):
            $result['products_id']=$product->products_id;
          
            $result['prouducts_slug']=$product->products_slug;

            $result['products_name']=$product->productdescription ? $product->productdescription->products_name : '';

            $result['products_description']=$product->productdescription ? $product->productdescription->products_description : '';


            //$result['category_tree']=$this->categoryTree($product->productcategory->first()->categories_id);
           

            $result['mrp']=$product->products_price;

            $result['selling_price']=$product->special ? $product->special->specials_new_products_price : '';

            $result['brand_name']=$product->manufacture ? $product->manufacture->manufacturers_name : '';

            $result['brand_image']=$product->manufacture ? env('ASSET_LINK').$product->manufacture->manufacturers_image : '';

            $result['primary_image']=$product->product_image?Storage::disk('s3')->url($product->products_image):'';

            //$result['all_images']=$this->productImages($product);

            $result['video_id']=$product->video_id;

            //$result['highlights']=$product->highlight ? $product->highlight->pluck('highlight_text') : [];
          // print_r($product->productcategory->filrscategories_id);die;
            //$result['product_options']=$this->productOptions($product);

            $result['vendor_name']=$product->vendor ? $product->vendor->vendor_name : '';

            $result['model_no']=$product->products_model;

            $result['warranty']=$product->warranty ? $product->warranty : new \stdClass;

            $result['return_policy']=$product->returnpolicy ? $product->returnpolicy : new \stdClass;

            $result['delivery']=$product->deliveryIn ? $product->deliveryIn->delivery_in : '';

            $result['cod']=$product->cod;

            $result['sale']=$product->sale;

            $result['hot']=$product->hot;

            $result['trending']=$product->trending;

            $result['verified']=$product->verified;

            $result['cancellation']=$product->cancellation;

            $result['meta']='dumy data';

            $result['title']='title';

            $result['keywords']='new keyworkd';



        endif;

        return $result;
    }
}
