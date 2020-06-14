<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminProductController extends Controller
{

    use StorageImageTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Product $product, ProductImage $productImage,Tag $tag, ProductTag $productTag)
    {
        $this->productImage = $productImage;
        $this->productTag = $productTag;
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);
        // dd($products);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory(null);
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);

        return $htmlOption;
    }

    public function store(Request $request)
    {
        // dd(url(public_path('product')));  
        try {

            DB::beginTransaction();

            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::id(), 
                'category_id' => $request->category_id,
    
            ];
    
            $dataUploadFeatureImage = $this->storageTraitUpLoad($request, 'feature_image_path', 'product');
    
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }

            // dd($dataProductCreate);
            $dataProduct = $this->product->create($dataProductCreate);
            
    
            //====== insert data to product_images ========
            if($request->hasFile('image_path')){
                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUpLoadMutiple($fileItem, 'products');
                    
                    $dataProduct->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
                // print_r($dataProductImageDetail);
                // dd();
            }   
    
            //======== insert product tags *********
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagsIntance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsId[] = $tagsIntance->id; 
                }
                $dataProduct->tags()->attach($tagsId);
            }
            
            DB::commit();
            return redirect()->route('products.index')->withInput()->with('success', 'Thêm sản phẩm thành công');

        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
        
    }

    public function edit($id)
    {

        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {

            DB::beginTransaction();

            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => Auth::id(), 
                'category_id' => $request->category_id,
    
            ];
    
            $dataUploadFeatureImage = $this->storageTraitUpLoad($request, 'feature_image_path', 'product');
    
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
    
            $this->product->find($id)->update($dataProductUpdate);
            $dataProduct = $this->product->find($id);
            // dd($dataProduct);
    
            //====== insert data to product_images ========
            if($request->hasFile('image_path')){

                $this->productImage->where('product_id', $id)->delete();

                foreach($request->image_path as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUpLoadMutiple($fileItem, 'products');
                    // dd($dataProductImageDetail);
                    $dataProduct->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                    ]);
                }
            }   
    
            //======== insert product tags *********
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagsIntance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagsId[] = $tagsIntance->id; 
                }
                $dataProduct->tags()->sync($tagsId);
            }
            
            DB::commit();
            return redirect()->route('products.index')->with('success', 'Sửa sản phẩm thành công');

        } catch (\Exception $exception) {

            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Success',
                'product_id' => $id
            ]);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ]);
        }
        
    }
}
