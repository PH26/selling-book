<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Mail;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;
use App\Category;
use App\Product;
use App\ProductImage;
use App\Danhgia;
use App\Hoadon;
use App\Chitiethoadon;
use App\Http\Requests\CartRequest;
use App\Http\Requests\DanhgiaRequest;

class PageController extends Controller {
	public function index(){
		$product_news = DB::table('products')->select('id','name','image','price','pricesale')->orderBy('id','DESC')->skip(1)->take(8)->get();
		//$product_news = Product::select('id','name','image','price','pricesale','alias')->orderBy('id','DESC')->skip(1)->take(8)->get()->toArray();
		$product_sales = DB::table('products')->select('id','name','image','price','pricesale')->where('pricesale','>',0)->orderBy('id','DESC')->skip(1)->take(8)->get();
		return view('frontend.index',compact('product_news','product_sales','product_banchays'));
	}
	public function category(){
		$products = DB::table('products')->select('id','name','image','price','pricesale')->orderBy('id','DESC')->paginate(9);
		$categorys = DB::table('categories')->select('id','name','prarent_id')->where('prarent_id',0)->orderBy('id','DESC')->get();
		return view('frontend.pages.category',compact('products','categorys'));
	}
	public function cateparent($id){
		//$products = DB::table('products')->select('id','name','image','price','pricesale','alias')->where('cate_id',$id)->orderBy('id','DESC')->paginate(9);
		$categorys = DB::table('categories')->select('id','name','prarent_id')->where('prarent_id',0)->orderBy('id','DESC')->get();
		$products = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.cate_id')
            ->select('categories.id','products.*')->where('categories.id',$id)
            ->paginate(9);
		$namecate = DB::table('categories')->select('id','name','prarent_id')->where('id',$id)->first();
		return view('frontend.pages.cateparent',compact('products','categorys','namecate'));
	}
	public function chitietsanpham($id){
		$data = DB::table('products')->where('id',$id)->first();
		return view('frontend.pages.chitietsanpham',compact('data'));
	}



	public function giohang(){
		return view('frontend.pages.cart');
	}
	public function addtocart($id){              // chưa hoàn thành
		// if (Request::isMethod('post')) {
		// 	      // $this->data['title'] = 'Giỏ hàng của bạn';
    //         $product_id = Request::get('product_id');
    //         $add_cart = Product::find($product_id);
    //         $cartInfo = [
    //           'id' => $add_cart->id,
		// 					'name' => $add_cart->name,
		// 				  'qty' => 1,
		// 				  'price' => $add_cart->price,
		// 				  'options' => ['pricesale' => $add_cart->pricesale,
		// 					              'image' => $add_cart->image
		// 											],
    //         ];
    //         Cart::add($cartInfo);


		$add_cart = DB::table('products')->where('id',$id)->first();
		Cart::add(
			[
			'id' => $add_cart->id,
		  'name' => $add_cart->name,
		  'qty' => 1,
		  'price' => $add_cart->price,
		  'options' => [
				          'pricesale' => $add_cart->pricesale,
									'image' => $add_cart->image
								   ]
			]);
			$content = Cart::content();
			print_r($content);
		// echo Cart::count();

		// return redirect()->route('giohang');
	}

	public function huygiohang(){
		Cart::destroy();
		return redirect()->route('giohang');
	}
	public function xoacart($id){
		Cart::remove($id);
		echo Cart::count();
	}
	public function updatecart($id,$qty){
		Cart::update($id,$qty);
		echo Cart::count();
	}

	public function thanhtoan(){
		return view('frontend.pages.sendorders');
	}
	public function postthanhtoan(CartRequest $request){
		$hoadon = new Hoadon;
		$hoadon->name = $request->txtName;
		$hoadon->email = $request->txtEmail;
		$hoadon->phone = $request->txtPhone;
		$hoadon->addreass = $request->txtAddress;
		$hoadon->status = 0;
		$hoadon->total_qty = $request->total_qty;
		$hoadon->total_price = $request->total_price;
		$hoadon->save();
		$product_hoadon = $hoadon->id;
		$content = Cart::content();
		foreach ($content as $row) {
			if($row->options->pricesale > 0){
				$price = $row->options->pricesale;
				$total = $row->options->pricesale * $row->qty;
			}else{
				$price = $row->price;
				$total = $row->price * $row->qty;
			}
			$cthoadon = new Chitiethoadon;
			$cthoadon->id_hoadon = $product_hoadon;
			$cthoadon->id_sanpham = $row->id;
			$cthoadon->soluong = $row->qty;
			$cthoadon->giasp = $price;
			$cthoadon->tong_giasp = $total;
			$cthoadon->save();
		}
		$data = [
			'name' => $_POST['txtName'],
			'dienthoai' => $_POST['txtPhone'],
			'diachi' => $_POST['txtAddress'],
			'tongdonhang' => $_POST['total_price'],
			'soluong' => $_POST['total_qty']
		];
		Mail::send('emails.ordercart',$data,function($msg){
			$msg->from('tuyetminhyeu@gmail.com',"BooksOnline");
			$msg->to($_POST['txtEmail'])->subject('Cảm ơn bạn đã đặt hàng!Chúng tôi sẽ liên hệ với bạn thời gian sớm nhất');
		});
		Cart::destroy();
		echo "<script>alert('Đơn hàng của bạn đã được gửi')
		window.location ='".url('/')."';
		</script>";
	}

	public function danhgia(){                       // chạy bằng ajax đã hoàn thành
		$name = htmlentities(htmlspecialchars($_GET['name']));
		$email = htmlentities(htmlspecialchars($_GET['email']));
		$content = htmlentities(htmlspecialchars($_GET['content']));
		$id = $_GET['id'];
		$so_sao = $_GET['danhgia'];
		$danhgia = new Danhgia;
		$danhgia->name = $name;
		$danhgia->email = $email;
		$danhgia->content = $content;
		$danhgia->numberstar = $so_sao;
		$danhgia->product_id = $id;
		$danhgia->save();
		return "oke";
	}



	public function lienhe(){                    // đã hoàn thành
		return view('frontend.pages.contact');
	}
	public function postlienhe(Request $request){
		$data = [
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'content' => $_POST['content'],
		];
		Mail::send('emails.blanks',$data,function($msg){
			$msg->from('khanhhokhanhho@gmail.com',"BooksOnline");
			$msg->to($_POST['email'])->subject('Cảm ơn bạn đã liên hệ! chúng tôi sẽ hồi âm trong vòng 24h');
		});
		echo "<script>alert('Vui lòng kiểm tra lại Email của bạn.Chúng tôi sẽ liên hệ với bạn trong vong 24h')
		window.location ='".url('/')."'
		</script>";
	}

	public function getDangky(){
		return view('frontend.pages.dangky');
	}
	public function postDangky(){

	}
}
