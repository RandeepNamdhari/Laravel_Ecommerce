<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
   // use Searchable;

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

        $product->update($productdata);

        $product->productcategory()->delete();
        
        $product->productcategory()->createMany(self::createManyArray('categories_id',$productdata['category']));

        $product->ProductHighlight()->delete();

        $product->ProductHighlight()->createMany(self::createManyArray('highlight_text',$productdata['highlight']));

$product->special()->delete();

        $product->special()->create($productdata);

        $product->productdescription()->delete();

        $product->productdescription()->create($productdata);

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
}
