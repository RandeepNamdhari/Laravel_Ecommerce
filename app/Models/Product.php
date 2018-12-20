<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Storage;

/**
 * @property array           $collection
 
 */
class Product extends Model
{
    
    use Searchable;
   static $collection = [];
   static $categories=[];

   protected $primaryKey='products_id';
   protected $fillable=['products_quantity','products_model','products_image','products_price','warranties','return_policies','VendorName','shipping_price','cod','sale','hot','cancellation','trending','verified','products_weight','products_weight_unit','products_status','products_tax_class_id','products_liked','low_limit','products_slug','video_id','delivery','manufacturers_id','hsntaxSlab'];

    const CREATED_AT = 'products_date_added';
    const UPDATED_AT = 'products_last_modified';

    static function createProduct($request)
    {
    	self::validateProduct($request);

    	$product=self::productData($request);
        
       try {

       	$newProduct=Product::create($product);
        
    	$newProduct->productcategory()->createMany(self::createManyArray('categories_id',$product['category']));

    	$newProduct->ProductHighlight()->createMany(self::createManyArray('highlight_text',$product['highlight']));

        $newProduct->special()->create($product);

        $newProduct->productdescription()->create($product);

    	return $newProduct;

       	
       } catch (Exception $e) {

          return false;
       	
       }
    	

    	


    }

    static function validateProduct($request)
    {
    	$rules=array(
    		'product_name'=>'required|unique:products_description,products_name',
    	    'mrp'=>'required',
    	    'model_no'=>'required',
    	    'hsn_code'=>'required',
    	    'return_policy'=>'required',
    	    'vendor'=>'required',
    	    'quantity'=>'required',
    	    'brand'=>'required',
    	    'description'=>'required',
    	    'category'=>'required',
            'delivery'=>'required',
            'shipping_price'=>'required',
            'selling_price'=>'required',
    	);

    	$request->validate($rules);
    }

    static function productData($request)
    {
    	return 
    	        array(

    		          'products_name'=>$request->product_name,
    		          'products_price'=>$request->mrp,
    		          'products_model'=>$request->model_no,
    		          'VendorName'=>$request->vendor,
    		          'hsntaxSlab'=>$request->hsn_code,
    		          'warranties'=>$request->warranty,
    		          'return_policies'=>$request->return_policy,
    		          'shipping_price'=>$request->shipping_price,
                      'specials_new_products_price'=>$request->selling_price,
    		          'manufacturers_id'=>$request->brand,
    		          'products_description'=>$request->description,
    		          'products_quantity'=>$request->quantity,
    		          'delivery'=>$request->delivery,
    		          'specials_new_products_price'=>$request->selling_price,
    		          'video_id'=>$request->video_id?$request->video_id:'',
    		          'cod'=>$request->has('cod')?$request->cod:0,
    		          'hot'=>$request->has('hot')?$request->hot:0,
    		          'sale'=>$request->has('sale')?$request->sale:0,
    		          'trending'=>$request->has('trending')?$request->trending:0,
    		          'cancellation'=>$request->has('cancellation')?$request->cancellation:0,
    		          'verified'=>$request->has('verified')?$request->verified:0,
    		          'products_image'=>$request->product_image,
    		          'category'=>explode(',', $request->category),
    		          'highlight'=>$request->highlight,
    		          'products_weight'=>'dk',
    		          'products_weight_unit'=>'',
    		          'products_status'=>1,
    		          'products_tax_class_id'=>1,
    		          'products_liked'=>1,
    		          'low_limit'=>10,
    		          'products_slug'=>\App\Models\Setting::slugify($request->product_name),
                      'expires_date'=>0,
                      'date_status_change'=>0,
                      'specials_date_added'=>time(),
                      'specials_last_modified'=>time(),


                    );
    }



    public function productcategory()
    {
    	return $this->hasMany('App\Models\ProductCategory','products_id','products_id');
    }

    public function ProductHighlight()
    {
    	return $this->hasMany('App\Models\ProductHighlight','products_id','products_id');
    }

    public function special()
    {
        return $this->hasOne('App\Models\Special','products_id','products_id');
    }

    public function productdescription()
    {
        return $this->hasOne('App\Models\ProductDescription','products_id','products_id');
    }

    public function manufacture()
    {
        return $this->hasOne('App\Models\Manufacture','manufacturers_id','manufacturers_id');
    }

    public function productimage()
    {
        return $this->hasMany('App\Models\ProductImage','products_id','products_id');
    }

    public function productattribute()
    {
        return $this->hasMany('App\Models\ProductAttribute','products_id','products_id');
    }

    public function vendor()
    {
        return $this->hasOne('App\Models\Vendor','id','VendorName');
    }

    public function warranty()
    {
        return $this->hasOne('App\Models\Warranty','id','warranties');
    }

    public function returnpolicy()
    {
        return $this->hasOne('App\Models\ReturnPolicy','id','return_policies');
    }

    public function deliveryIn()
    {
        return $this->hasOne('App\Models\Delivery','delivery_id','delivery');
    }

    public function productoptions()
    {
        return $this->hasMany('App\Models\Productoptions');
    }



    static function createManyArray($field,array $values)
    {
    	$result=[];
    	foreach($values as $value):
    		if(!empty($value)):
    	  $result[]=array($field=>$value);
    	endif;
    	endforeach;
    	return $result;
    }


    static function updateProduct($request,$product)
    {
        self::validateProductUpdate($request,$product->products_id);

        $productdata=self::productData($request);
        
       try {
        if(!empty($productdata['products_image'])):
            
            Storage::disk('s3')->delete($product->products_image);
        endif;

        

        $product->productcategory()->delete();
        
        $product->productcategory()->createMany(self::createManyArray('categories_id',$productdata['category']));

        $product->ProductHighlight()->delete();

        $product->ProductHighlight()->createMany(self::createManyArray('highlight_text',$productdata['highlight']));

$product->special()->delete();

        $product->special()->create($productdata);

        $product->productdescription()->delete();

        $product->productdescription()->create($productdata);

        $product->update($productdata);

        return true;

        
       } catch (Exception $e) {

          return false;
        
       }

    }

    static function validateProductUpdate($request,$id)
    {
        $rules=array(
            'product_name'=>'required|unique:products_description,products_name,'.$id.',products_id',
            'mrp'=>'required',
            'model_no'=>'required',
            'hsn_code'=>'required',
            'return_policy'=>'required',
            'vendor'=>'required',
            'quantity'=>'required',
            'brand'=>'required',
            'description'=>'required',
            'category'=>'required',
            'delivery'=>'required',
            'shipping_price'=>'required',
            'selling_price'=>'required',
        );

        $request->validate($rules);
    }

    // Algolia indexing
    public function toSearchableArray()
    {
        //$record = $this->toArray();
       // print_r($record);die;
        $newrecord=self::show($this);


        //$record['products_id']=$this->products_id;
        //$record['products_name']='dlfsf';

        return $newrecord;
    }

     static function show($product)
    {
        
        //$product=Product::where('products_slug','=',$products_slug)->first();
        $result=array();
        
   
        if(isset($product->products_id)):
            $result['products_id']=$product->products_id;
          
            $result['prouducts_slug']=$product->products_slug;

            $result['products_name']=$product->productdescription ? $product->productdescription->products_name : '';

            $result['products_description']=$product->productdescription ? $product->productdescription->products_description : '';
            

            $result['hierarchicalCategories']=self::categoryTree($product->productcategory->first()->categories_id);
            $result['categories']=static::$categories;
           

            $result['mrp']=$product->products_price;

            $result['selling_price']=$product->special ? $product->special->specials_new_products_price : '';

            $result['brand_name']=$product->manufacture ? $product->manufacture->manufacturers_name : '';

            $result['brand_image']=$product->manufacture ? env('ASSET_LINK').$product->manufacture->manufacturers_image : '';

            $result['primary_image']=Storage::disk('s3')->url($product->products_image);

            $result['all_images']=self::productImages($product);

            $result['video_id']=$product->video_id;

            $result['highlights']=$product->producthighlight ? $product->producthighlight->pluck('highlight_text') : [];
          
            $options=self::productOptions_al($product);
            

    foreach($options as $opt=>$val):
        $result[$val['options_name']]=array_map(function($k){
                                    return $k['option_value_name'];
                                   }, $val['option_values']);
    endforeach;


            $result['vendor_name']=$product->vendor ? $product->vendor->vendor_name : '';

            $result['model_no']=$product->products_model;

            $warranty=$product->warranty ? $product->warranty : '';
            $result['warranty_type']=$warranty->warranty_type ? $warranty->warranty_type:'';
            $result['warranty_description']=$warranty->description ? $warranty->description:'';

            $return_policy=$product->returnpolicy ? $product->returnpolicy : '';
            if($return_policy):
                $result['return_policy']=$product->returnpolicy->return_policy;
                $result['policy_description']=$product->returnpolicy->description;
            endif;

            $result['delivery']=$product->deliveryIn ? $product->deliveryIn->delivery_in : '';

            $result['cod']=$product->cod?true:false;

            $result['sale']=$product->sale?true:false;

            $result['hot']=$product->hot?true:false;

            $result['trending']=$product->trending?true:false;

            $result['verified']=$product->verified?true:false;

            $result['cancellation']=$product->cancellation?true:false;

            $result['meta']='dumy data';

            $result['title']='title';

            $result['keywords']='new keyworkd';



        endif;

        return $result;
    }

     static function productImages($product)
    {
        $images=[];
        if($product->productimage):

           foreach($product->productimage as $image):
          $images[]=array('image'=>Storage::disk('s3')->url($image->image),'sort'=>$image->order_sort);
           endforeach;

        endif;

        return $images;
      
    }

    static function productOptions_al($product)
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
    
        return $options;
    }

    static function getcat($category,$i)
    {
        
        $curCat=\App\Models\Category::find($category);
        
        $res =new \stdClass();
        $res->categories_id=$curCat->categories_id;
        $res->categories_slug=$curCat->categories_slug;
        $res->categories_name=$curCat->categorydescription->categories_name;
      
        
        array_push(static::$collection, $res);

        if($curCat->parent_id > 0):
           $i++;
           
            self::getcat($curCat->parent_id,$i);

        endif;
     
        return static::$collection;
    }

    static function categoryTree($category)
    {
        $newdata=[];
        $data= array_reverse(self::getcat($category,0));
        //print_r($data);die;
        $c_count=count($data);
       if($c_count > 1 ):

        foreach($data as $key =>$val):
            
         if($key > 0):
        $newdata['lvl'.$key]=$newdata['lvl'.($key-1)].' > '.$val->categories_name;
        array_push(static::$categories,$val->categories_name);

         else:
         $newdata['lvl'.$key]=$val->categories_name;
         array_push(static::$categories,$val->categories_name);
        endif;

        endforeach;


       else:
        $newdata['lvl0']=$data[0]->categories_name;
        array_push(static::$categories,$data[0]->categories_name);
       endif;
        return $newdata;
    }

    static function ProductCategories($product)
    {
        $categories= $product->productcategory->pluck('categories_id');

        return \App\Models\CategoryDescription::whereIn('categories_id',$categories)->pluck('categories_name');
    }
}
