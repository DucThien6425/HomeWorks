<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TypeProduct;
use App\Models\Comment;
use App\Models\BillDetail;


class PagesController extends Controller
{
    // Trang chủ
    public function getIndex() 
    {
        $slide = Slide::all();
        $new_product=Product::where('new',1)->paginate(4);
        $promotion_product=Product::where('promotion_price','<>',0)->paginate(8);
        return view('home', compact('slide', 'new_product', 'promotion_product'));
    }

    public function getType($type){
        $type_product = TypeProduct::all(); // Danh sách tất cả loại sản phẩm
        $sp_theoloai = Product::where('id_type', $type)->get(); // Sản phẩm theo loại
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(8); // Sản phẩm khác
    
        return view('typeProduct', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
    
    

    public function getDetail(Request $request){
        $sanpham=Product::where('id',$request->id)->first();
         // Lấy sản phẩm liên quan cùng id_type (trừ sản phẩm hiện tại)
        $splienquan = Product::where('id_type', $sanpham->id_type)
                            ->where('id', '!=', $sanpham->id)
                            ->paginate(3);
        $comments=Comment::where('id_product',$request->id)->get();
        // $bestseller = Product::where('best_seller', 1)->get();
        return view('details',compact('sanpham','splienquan','comments'));
    }

    //Admin
    public function getIndexAdmin(){
        $product= Product::all();
        return view('pageadmin.admin')->with(['products'=>$product, 'sumSold'=>count(BillDetail::all())]);
    }
    public function postAdminDelete($id){
        $product = Product::find($id);
        if (!$product){
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $product->delete();
        return $this->getIndexAdmin();
    }
    public function getAdminEdit($id){
        $product = Product::find($id);
        return view('pageadmin.formEdit')->with('product', $product);
    }
    public function postAdminEdit(Request $request)
        {
            $request->validate([
                'editId' => 'required|exists:products,id',
                'editName' => 'required|string|max:255',
                'editDescription' => 'nullable|string',
                'editPrice' => 'required|numeric',
                'editPromotionPrice' => 'nullable|numeric',
                'editUnit' => 'nullable|string',
                'editNew' => 'boolean',
                'editType' => 'required|integer',
                'editImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $product = Product::findOrFail($request->editId);

            if ($request->hasFile('editImage')) {
                $file = $request->file('editImage');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('products', $fileName, 'public');
                $product->image = $filePath;
            }

            $product->name = $request->editName;
            $product->description = $request->editDescription;
            $product->unit_price = $request->editPrice;
            $product->promotion_price = $request->editPromotionPrice;
            $product->unit = $request->editUnit;
            $product->new = $request->editNew;
            $product->id_type = $request->editType;

            $product->save();

            return $this->getIndexAdmin();
        }
    public function getAdminAdd(){
        return view('pageadmin.formAdd');
    }
    public function postAdminAdd(Request $request)
        {
            $product = new Product();

            if ($request->hasFile('inputImage')) {
                $file = $request->file('inputImage');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('public/products', $fileName); // Lưu ảnh vào storage/app/public/products
            }

            $file_name = null;
            if ($request->file('inputImage') != null) {
                $file_name = $request->file('inputImage')->getClientOriginalName();
            }

            $product->name = $request->inputName;
            $product->image = $file_name;
            $product->description = $request->inputDescription;
            $product->unit_price = $request->inputPrice;
            $product->promotion_price = $request->inputPromotionPrice;
            $product->unit = $request->inputUnit;
            $product->new = $request->inputNew;
            $product->id_type = $request->inputType;
            $product->save();

            return $this->getIndexAdmin();
        }
        public function getAbout(){
            return view('about');
        }
        public function getContact(){
            return view('lienhe');
        }	

}
