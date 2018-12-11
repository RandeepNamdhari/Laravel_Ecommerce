<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;
use Illuminate\Support\Facades\Storage;
use Form;

class ProductController extends Controller
{
    protected $catIds=[];
    public $tab=['general'=>'','images'=>'','feature'=>'','option'=>'','seo'=>''];
    public $collection;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.product_list')->withMessage(session('message'))->withclass(session('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProducts(Request $request)
    {
        $result=[];
        $products=Product::orderBy('products_id','desc')->get();
        foreach ($products as $key => $product) {
            $result[$key]['products_id']=$product->products_id;
            if($product->products_image):
            $result[$key]['image']='<img class="m-widget3__img" alt="" width="50" height="50" src="'.Storage::disk('s3')->url($product->products_image).'">';
        else:
            $result[$key]['image']='';
        endif;
            if($product->productdescription):
            $result[$key]['products_name']=$product->productdescription->products_name;
        else:
            $result[$key]['products_name']='';
        endif;
            $result[$key]['mrp']=$product->products_price;
            if($product->manufacture):
            $result[$key]['brand']=$product->manufacture->manufacturers_name;
        else:
            $result[$key]['brand']='';
        endif;
            $result[$key]['selling_price']=$product->products_price;
            $result[$key]['url']=$product->products_slug;
            $result[$key]['action']='<a href="'.url('admin/product').'/'.$product->products_id.'" class="btn btn-outline-accent m-btn m-btn--icon m-btn--icon-only"><i class="fa fa-edit"></i></a>'.
                     Form::open(array('url'=>'admin/product/'.$product->products_id ,'method'=>'delete','style'=>'display:inline;','class'=>'delete_with_warning')).'<button type="submit" class="btn btn-outline-primary m-btn m-btn--icon m-btn--icon-only delete__modal">
                                                            <i class="fa fa-trash"></i>
                                                </button>'.
                                             Form::close();
            # code...
        }
        return \Response::json(array_values($result));

    }


    public function create()
    {
         $this->tab['general']='active';
        $collection=array(
               'manufactures'=> new \App\Models\Manufacture,
               'vendors'=>new \App\Models\Vendor,
               'hsn_codes'=>new \App\Models\HsnCode,
               'warranties'=>new \App\Models\Warranty,
               'return_policies'=>new \App\Models\ReturnPolicy,
               'deliveries'=>new \App\Models\Delivery,
               'url'=>'admin/product',
               'method'=>'post',
               'tab'=>$this->tab,

               'product_id'=>'',
               'product_images'=>[]
             );
    
        return view('admin.product')->with($collection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product=Product::createProduct($request);

        $this->tab['images']='active';

        if($product):

        $message= 'The product created successfully!';

              return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);
            endif;

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(session('tab')):
            $tab=session('tab');
        else:
            $this->tab['general']='active';
            $tab=$this->tab;
        endif;
       $collection=array(
               'manufactures'=> new \App\Models\Manufacture,
               'vendors'=>new \App\Models\Vendor,
               'hsn_codes'=>new \App\Models\HsnCode,
               'warranties'=>new \App\Models\Warranty,
               'return_policies'=>new \App\Models\ReturnPolicy,
               'deliveries'=>new \App\Models\Delivery,
               'product_options'=> \App\Models\ProductOption::pluck('products_options_name','products_options_id')->toArray(),
               'product_attributes'=> $product->productattribute,
               'url'=>'admin/product/'.$product->products_id,
               'method'=>'PUT',
               'tab'=>$tab,
               'product_id'=>$product->products_id,
               'product_images'=>$product->productimage,
               'product'=>$product,
               'message'=>session('message'),
               'class'=>'success',
               'pr_filters'=>$this->productFilters($product->products_id),
        
             );
       


  
       session(['cur_product_id'=>$product->products_id]);

        return view('admin.product')->with($collection);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
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
    public function update(Request $request,Product $product)
    {
       

      $result=  Product::updateProduct($request,$product);

        $this->tab['images']='active';

        if($result):

        $message= 'The product udated successfully!';

              return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);
            endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         Storage::disk('s3')->delete($product->products_image);

         foreach($product->productimage as $image){
            Storage::disk('s3')->delete($image->image);
         }

        if($product->delete()):
        return redirect('admin/product')->with('message','The product deleted successfully!')->withclass('success');
    else:

        return redirect()->back();
    endif;
    }

    public function uploadProductImage(Request $request)
    {
        header('Content-Type:application/json');
        if($request->hasFile('product_file') and in_array($request->product_file->extension(), array('gif','jpg','jpeg','png'))){
            $image = $request->product_file;

            $fileName = time().'.'.$image->getClientOriginalName();

            $path = Storage::disk('s3')->put('product_images/'.$fileName,$request->product_file,'public');
            
            $uploadImage = $path;
        }else{
            $uploadImage = '';
        }

        echo json_encode(array('file_name_real'=>$path,'status'=>'success'));
    }

    public function deleteProductImage(Request $request)
    {
          
       Storage::disk('s3')->delete($request->id);
            echo json_encode(array('status'=>'success','file_source'=>$request->id));
        
        
    }

    public function categoryTree()
    {
        $selected_cat=[];
        $parents=[];
      
        
        if(session('cur_product_id')):
            $opened_categories=$this->allOpen_cats();
            $selected_cat=$opened_categories['selected'];
            $parents=$opened_categories['parents'];
            session(['cur_product_id'=>'']);
        endif;
            
        
        
        $result=[];
        foreach(\App\Models\Category::all() as $key =>$value):


            if($value->categorydescription && !in_array($value->categories_id, $this->catIds)):
                $result[$key]=new \stdClass();
            $result[$key]->text=$value->categorydescription->categories_name;
            $result[$key]->id=$value->categories_id;
            $this->catIds[]=$value->categories_id;
            $result[$key]->state=new \stdClass;
            if(in_array($value->categories_id, $selected_cat)):
                
                $result[$key]->state->selected=true;
            endif;
            if(in_array($value->categories_id,$parents)):
                $result[$key]->state->opened=true;
            endif;

            if($this->countchildren($value->categories_id) >0):
                  $result[$key]->children=$this->children($value->categories_id,0,$selected_cat,$parents);
            endif;

            endif;
            
           
        endforeach;


echo json_encode(array_values($result));
    }
public function children($id,$i=0,$selected_cat,$parents)
{
    $children=[];
    
    $all_children=\App\Models\Category::where('parent_id',$id)->get();
    
    foreach($all_children as $key =>$value):
        $children[$i]=new \stdClass();
       
        if($value->categorydescription && !in_array($value->categories_id, $this->catIds)):
           
       $children[$i]->text=$value->categorydescription->categories_name;
       $children[$i]->id=$value->categories_id;
        $children[$i]->state=new \stdClass;
            if(in_array($value->categories_id, $selected_cat)):
                
                $children[$i]->state->selected=true;
            endif;
            if(in_array($value->categories_id,$parents)):
                $children[$i]->state->opened=true;
            endif;
       $collection[]=$children[$i];
         
       if($this->countchildren($value->categories_id)):

            
            
           $children[$i]->children=$this->children($value->categories_id,$i,$selected_cat,$parents);
      
        endif;

        $this->catIds[]=$value->categories_id;
        $i++;

        endif;
        
 

    endforeach;
   if(isset($collection))
   return $collection;
}

public function countchildren($id)
{
    return count(\App\Models\Category::where('parent_id',$id)->get()->toArray());
}

public function productImages(Request $request,Product $product)
{
    //print_r($request->product_images_array);die;
    $images=$request->product_images_array;
    //print_r($images);die;
   $message='No data affected!';

   $this->tab['feature']='active';

        if($images):
            $result= $product->productimage()->createMany($product::createManyArray('image',$images));
        $message= 'The product images uploaded successfully!';

  
    endif;
    return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);

}

public function withPath($values=[])
{
    if(is_array($values)):
    return array_map(function($v)
        {
            return 'resources/assets/images/product_images/'.$v;
        }, $values);
endif;
}

public function deleteImage(Request $request,\App\Models\ProductImage $productimage,$product)
{

    
    $this->tab['images']='active';

        Storage::disk('s3')->delete($productimage->image);

        if($productimage->delete()):
        $message= 'The product image deleted successfully!';

        return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);

       
    endif;
}


public function get_product_options(\App\Models\ProductOption $productoption)
{

    echo json_encode($productoption->productOptionValue->pluck('products_options_values_name','products_options_values_id'));

}

public function add_product_option(Request $request,Product $product)
{
     $rules=['options'=>'required',
             'product_option_value'=>'required',
             'sort'=>'required|unique:products_attributes,sort,NULL,products_attributes_id,products_id,'.$product->products_id ];

     $request->validate($rules);
     //print_r($request->all());die;

     

     $data=[
        'options_id'=>$request->options,
        'options_values_id'=>$request->product_option_value,
        'is_default'=>$request->is_default,
        'price_prefix'=>$request->price_prefix,
        'options_values_price'=>$request->price?$request->price:0,
        'sort'=>$request->sort,
        'view'=>$request->view,
    ];

      if($product->productattribute()->create($data)):
         $this->tab['feature']='active';
        $request->session()->flash('tab',$this->tab);
        $request->session()->flash('message','The option added successfully!');
        echo json_encode(array('status'=>'success'));

  endif;
}

public function deleteAttribute(Request $request,\App\Models\ProductAttribute $productattribute,Product $product)
{
   
    $this->tab['feature']='active';

        if($productattribute->delete()):
        $message= 'The product option deleted successfully!';

        return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);
else:
    return redirect()->route('product.show',$product)->with('message','please try agian!')->with('tab',$this->tab);
       
    endif;

}

public function update_product_attribute(Request $request,\App\Models\ProductAttribute $productattribute)
{
   $rules=['options'=>'required',
             'product_option_value'=>'required',
             'sort'=>'required' ];

     $request->validate($rules);

     $this->updateAttributeSort($request,$productattribute);

     $data=[
        'options_id'=>$request->options,
        'options_values_id'=>$request->product_option_value,
        'is_default'=>$request->is_default,
        'price_prefix'=>$request->price_prefix,
        'options_values_price'=>$request->price?$request->price:0,
        'sort'=>$request->sort,
        'view'=>$request->view,
    ];

      if($productattribute->update($data)):
         $this->tab['feature']='active';
        $request->session()->flash('tab',$this->tab);
        $request->session()->flash('message','The option updated successfully!');
        echo json_encode(array('status'=>'success'));

  endif;
}

public function updateAttributeSort($request,$productattribute)
{
    if($request->input('sort') > $productattribute->sort):
            

            \App\Models\ProductAttribute::where([
                ['sort','!=',0],
                ['products_id',$productattribute->products_id],
                ['sort','<=',$request->input('sort')],
                ['sort','>=',$productattribute->sort],
            ])->decrement('sort');
         elseif($request->input('sort') < $productattribute->sort):
            
            \App\Models\ProductAttribute::where([
                ['sort','!=',0],
                ['products_id',$productattribute->products_id],
                ['sort','>=',$request->input('sort')],
                ['sort','<=',$productattribute->sort]
            ])->increment('sort');
             
        endif;

        return true;
}

public function productFilters($product)
    {
        $categories=DB::table('products_to_categories')->where('products_id',$product)->pluck('categories_id')->toArray();
        $groups=DB::table('categories')->whereIn('categories_id',$categories)->pluck('filter_group')->toArray();
       $filters_ids=\App\Models\GroupFilter::whereIn('group_id',$groups)->pluck('filter_id')->toArray();
        
        $filters=\App\Models\Filter::whereIn('filter_id',$filters_ids)->get();
       
        $productfilters=\App\Models\ProductWithFilter::where('products_id',$product)->get();
         
          $data=array('filters'=>$filters,'productfilters'=>$productfilters,'productid'=>$product);
        //print_r($productfilters->pluck('filter_option_id')->toArray());die;
       return $data;
    }

    public function addproductFilters(Request $request , $product)
    {
        
        $filters=[];
        $this->validate($request,['filters'=>'required']);
        $existingfilter=\App\Models\ProductWithFilter::where('products_id',$product)->pluck('filter_option_id')->toArray();
 
        foreach($request->filters as $value):
            if(!in_array($value, $existingfilter)):
                $filters=array('filter_option_id'=>$value,'products_id'=>$product);
            $curfil=  \App\Models\ProductWithFilter::create($filters);
           
         
            endif;
        endforeach;

      $this->tab['option']='active';

       
        $message= 'The filter option added successfully!';

        return redirect()->route('product.show',$product)->with('message',$message)->with('tab',$this->tab);
   
    }

    public function deleteProductfilter($ProductWithFilter)
    {
        \App\Models\ProductWithFilter::find($ProductWithFilter)->delete();
        $this->tab['option']='active';

       
        $message= 'The filter option deleted successfully!';

        //return redirect()->route('product.show',$product)
        return redirect()->back()->with('message',$message)->with('tab',$this->tab);;

    }

    public function catParents($category,$i=0)
    {
         $curCat=\App\Models\Category::find($category);
    
        //array_push($this->collection, $res);

        if($curCat->parent_id > 0):
           $i++;
           $res[]=$curCat->parent_id;

            $this->catParents($curCat->parent_id,$i);
      
        endif;
 //print_r($res);die;
     if(isset($res)):
        return $res;
        
    else:
       return [];
    endif;
    }

    public function allOpen_cats()
    {
       $categories=Product::find(session('cur_product_id'))->productcategory;


        foreach($categories->toArray() as $cat):


            $result['selected'][]=$cat['categories_id'];

            $result['parents'][]=$this->catParents($cat['categories_id']);
     
        endforeach;
       if(isset($result)):
        return $result;
    else:
        return ['selected'=>[],'parents'=>[]];
    endif;
    }


}
