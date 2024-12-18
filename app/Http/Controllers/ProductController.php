<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\ProductImage;
use App\Models\Trending;
use App\Models\Setting;
use App\Models\Banner;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10);
        $search = $request->get('search', '');
        $sortPrice = $request->get('sortPrice', 'asc');
        $products = Product::where('name', 'like', "%$search%")
                        ->orderBy('price', $sortPrice)
                        ->with('images')
                        ->paginate($perPage);

        return view('product.index',compact('products'));
    }
    
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name         = $request->input('name');
        $product->description  = $request->input('description');
        $product->material     = $request->input('material');
        $product->price        = $request->input('price');
        $product->category_id  = $request->input('category_id');
        $product->save();

        foreach($request->sizes as $sizeData) {
            $size = Size::firstOrCreate(
                ['name' => $sizeData['size_name']]
            ); 

            ProductSize::create([
                'product_id'     => $product->id,
                'size_id'        => $size->id,
                'stock_quantity' => $sizeData['stock_quantity']
            ]);
        }
        foreach($request->images as $index => $imageData) {
            if (isset($imageData['file'])) { 
                $randomNumber = mt_rand(1000000000000000, 9999999999999999);
                $extension = $imageData['file']->getClientOriginalExtension();
                $fileName = $randomNumber . '.' . $extension;
                $imagePath = $imageData['file']->storeAs('product', $fileName, 'public');

                $isMainImage = ($request->main_image == $index);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url'  => $imagePath,
                    'image_type' => 0,
                    'is_main'    => $isMainImage ? 1 : 0,
                ]);
            }
        }
        return redirect()->route('product.index');
    }

    public function edit(string $id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id)->load('category');
        $productImages = ProductImage::where('product_id', $product->id)->get();
        $productSizes = ProductSize::where('product_id', $product->id)->get();
        return view('product.update', compact('product', 'category', 'productImages', 'productSizes'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name         = $request->input('name');
        $product->description  = $request->input('description');
        $product->material     = $request->input('material');
        $product->price        = $request->input('price');
        $product->category_id  = $request->input('category_id');
        $product->save();
        
        $imageProduct = ProductImage::where('product_id', $product->id)->get();
        $listImageIds = $imageProduct->pluck('id')->toArray();
        $index = $request->main_image;
        if (isset($listImageIds[$index])) {
            $imageIdToUpdate = $listImageIds[$index];
            ProductImage::where('product_id', $product->id)->update(['is_main' => 0]);
            ProductImage::where('id', $imageIdToUpdate)->update(['is_main' => 1]);
        }

        foreach($request->sizes as $sizeData) {
            $size = Size::firstOrCreate(
                ['name' => $sizeData['size_name']]
            ); 

            ProductSize::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'size_id' => $size->id
                ],
                [
                    'stock_quantity' => $sizeData['stock_quantity']
                ]
            );
        }
        if ($request->has('images')) {
            foreach ($request->images as $index => $imageData) {
                if (isset($imageData['file'])) { 
                    $randomNumber = mt_rand(1000000000000000, 9999999999999999);
                    $extension = $imageData['file']->getClientOriginalExtension();
                    $fileName = $randomNumber . '.' . $extension;
                    $imagePath = $imageData['file']->storeAs('product', $fileName, 'public');
                    $isMainImage = ($request->main_image == $index); 
                    $productImage = ProductImage::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'image_url'  => $fileName, 
                        ],
                        [
                            'image_url'  => $imagePath,
                            'image_type' => 0,
                            'is_main'    => $isMainImage ? 1 : 0,
                        ]
                    );
                }
            }
        }
    
        return redirect()->route('product.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }


    public function showAllProduct(Request $request) 
    {
        $setting = Setting::first();
        $perPage = $request->get('perPage', 15);
        $products = Product::paginate($perPage);
        $maleCate = Category::join('tbl_product', 'tbl_category.id', '=', 'tbl_product.category_id')
                            ->select('tbl_category.id', 'tbl_category.name', \DB::raw('COUNT(tbl_product.id) as product_count'))
                            ->where('tbl_product.gender', 1)
                            ->groupBy('tbl_category.id', 'tbl_category.name')
                            ->get();

        $famaleCate = Category::join('tbl_product', 'tbl_category.id', '=', 'tbl_product.category_id')
                            ->select('tbl_category.id', 'tbl_category.name', \DB::raw('COUNT(tbl_product.id) as product_count'))
                            ->where('tbl_product.gender', 0)
                            ->groupBy('tbl_category.id', 'tbl_category.name')
                            ->get();
        return view('page.collections', compact('products', 'maleCate', 'famaleCate', 'setting'));
    }

    public function showCategoryProducts(Request $request, $gender, $categoryName) 
    {
        $setting = Setting::first();
        $perPage = $request->get('perPage', 15);
        $category = Category::where('name', $categoryName)->first();

        if($gender == 'male') {
            $gender = 1;
        } else {
            $gender = 0;
        }

        $products = Product::where('category_id', $category->id)->where('gender', $gender)->paginate($perPage);

        $maleCate = Category::join('tbl_product', 'tbl_category.id', '=', 'tbl_product.category_id')
                            ->select('tbl_category.id', 'tbl_category.name', \DB::raw('COUNT(tbl_product.id) as product_count'))
                            ->where('tbl_product.gender', 1)
                            ->groupBy('tbl_category.id', 'tbl_category.name')
                            ->get();

        $famaleCate = Category::join('tbl_product', 'tbl_category.id', '=', 'tbl_product.category_id')
                            ->select('tbl_category.id', 'tbl_category.name', \DB::raw('COUNT(tbl_product.id) as product_count'))
                            ->where('tbl_product.gender', 0)
                            ->groupBy('tbl_category.id', 'tbl_category.name')
                            ->get();

        return view('page.collections', compact('products', 'maleCate', 'famaleCate', 'setting'));
    }

    public function getHotTrendProducts()
    {
        $hotTrendProducts = Trending::with('product')
                                ->orderBy('rank', 'asc') 
                                ->take(7) 
                                ->get();
        $listLatestProducts = Product::orderBy('created_at', 'desc')
                                ->take(7) 
                                ->get();
        $setting = Setting::first();
        $bannerMain = Banner::where('type', 'main')->get();
        $bannerSub = Banner::where('type', 'sub')->get();
        return view('page.index', compact('hotTrendProducts', 'listLatestProducts', 'setting', 'bannerMain', 'bannerSub'));
    }

    public function getProductDetail($id)
    {
        $product = Product::find($id);
        $setting = Setting::first();
        return view('page.product_detail', compact('product', 'setting'));
    }

    public function deleteProductImage($id)
    {
        try {
            $image = ProductImage::find($id);
            if ($image) {
                if (Storage::exists('public/' . $image->image_url)) {
                    Storage::delete('public/' . $image->image_url);
                }
                $image->delete();
                return response()->json(['success' => true]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    
    public function updateProductImage($id, Request $request)
    {
        try {
            $image = ProductImage::find($id);

            if (!$image) {
                return response()->json(['success' => false, 'message' => 'Image not found']);
            }
            
            if (Storage::exists('public/' . $image->image_url)) {
                Storage::delete('public/' . $image->image_url);
            }

            if ($request->hasFile('image')) {
                $imageFile = $request->file('image');
                $randomNumber = mt_rand(1000000000000000, 9999999999999999);
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = $randomNumber . '.' . $extension;

                $imagePath = $imageFile->storeAs('product', $fileName, 'public');
                if (!$imagePath) {
                    return response()->json(['success' => false, 'message' => 'Failed to store new image']);
                }

                $image->image_url = $imagePath;
                $image->save();
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function showSizes($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        $sizes = [];
        foreach ($product->productSize as $productSize) {
            if ($productSize->size) {
                $sizes[] = [
                    'product_id' => $productSize->product_id,
                    'size_name' => $productSize->size->name,
                    'stock_quantity' => $productSize->stock_quantity,
                ];
            }
        }
        if (empty($sizes)) {
            return response()->json(['message' => 'No sizes found for this product'], 404);
        }
        return response()->json([
            'sizes' => $sizes
        ]);
    }


    public function test() 
    {
        return view('page.product_detail');
    }
}
