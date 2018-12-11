<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public $collection=[];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($products_slug)
    {
        
        $product=Product::where('products_slug','=',$products_slug)->first();
        $result=array();
        
   
        if(isset($product->products_id)):
            $result['products_id']=$product->products_id;
          
            $result['prouducts_slug']=$product->products_slug;

            $result['products_name']=$product->productdescription ? $product->productdescription->products_name : '';

            $result['products_description']=$product->productdescription ? $product->productdescription->products_description : '';


            $result['category_tree']=$this->categoryTree($product->productcategory->first()->categories_id);
           

            $result['mrp']=$product->products_price;

            $result['selling_price']=$product->special ? $product->special->specials_new_products_price : '';

            $result['brand_name']=$product->manufacture ? $product->manufacture->manufacturers_name : '';

            $result['brand_image']=$product->manufacture ? env('ASSET_LINK').$product->manufacture->manufacturers_image : '';

            $result['primary_image']=Storage::disk('s3')->url($product->products_image);

            $result['all_images']=$this->productImages($product);

            $result['video_id']=$product->video_id;

            $result['highlights']=$product->producthighlight ? $product->producthighlight->pluck('highlight_text') : [];
          // print_r($product->productcategory->filrscategories_id);die;
            $result['product_options']=$this->productOptions($product);

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

        return \Response::json(array('data'=>$result, 'status'=>'success'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function productImages($product)
    {
        $images=[];
        if($product->productimage):

           foreach($product->productimage as $image):
          $images[]=array('image'=>Storage::disk('s3')->url($image->image),'sort'=>$image->order_sort);
           endforeach;

        endif;

        return $images;
      
    }

    public function productOptions($product)
    {
           $options=[];
           $existingOptions=[];

           
        foreach($product->productattribute as $key =>$attribute):
            if(count($attribute->productoption)>0):

            if(in_array($attribute->productoption->products_options_id, $existingOptions)):

         array_push($options[$attribute->productoption->products_options_id]['option_values'],
         array('option_value_id'=>$attribute->productoptionvalue->products_options_values_id,'option_value_name'=>$attribute->productoptionvalue->products_options_values_name,'sort'=>$attribute->sort,'view'=>$attribute->view,'price_prefix'=>$attribute->price_prefix,'options_values_price'=>$attribute->options_values_price)
         ) ;
     

     else:
        $curId=$attribute->productoption->products_options_id;

        $options[$curId]['options_id']=$attribute->productoption->products_options_id;

        $options[$curId]['options_name']=$attribute->productoption->products_options_name;

        $options[$curId]['option_values'][]=array('option_value_id'=>$attribute->productoptionvalue->products_options_values_id,'option_value_name'=>$attribute->productoptionvalue->products_options_values_name,'sort'=>$attribute->sort,'view'=>$attribute->view,'price_prefix'=>$attribute->price_prefix,'options_values_price'=>$attribute->options_values_price);

        $existingOptions[]=$curId;

     endif;
endif;
        endforeach;
    

        return array_values($options);
    }

    public function getcat($category,$i)
    {
        
        $curCat=\App\Models\Category::find($category);
        
        $res =new \stdClass();
        $res->categories_id=$curCat->categories_id;
        $res->categories_slug=$curCat->categories_slug;
        $res->categories_name=$curCat->categorydescription->categories_name;
      
        
        array_push($this->collection, $res);

        if($curCat->parent_id > 0):
           $i++;
           
            $this->getcat($curCat->parent_id,$i);

        endif;
      // print_r($this->collection);
        return $this->collection;
    }

    public function categoryTree($category)
    {
        $data= $this->getcat($category,0);
       
        return array_reverse($data);
    }
}
