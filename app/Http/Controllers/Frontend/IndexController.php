<?php
	
    
namespace App\Http\Controllers\Frontend;

use App\Models\Seo;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\OrderItem;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ShipCountry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class IndexController extends Controller
{
  
  public function index(){
    $blogpost = BlogPost::latest()->get();
    // $books = Book::where('status' , 1)->orderBy('id' ,'DESC')->limit(6)->get();
    $books = Book::where([['status', 1],['discount_price', NULL],])->orderBy('id', 'DESC')->limit(6)->get();
    $categories = Category::orderBy('name' , 'ASC')->get();
    $sliders = Slider::where('status' , 1)->orderBy('id' ,'DESC')->limit(3)->get();
    // $featured = Book::where('featured' , 1)->orderBy('id' ,'DESC')->limit(6)->get();
    $featured = Book::where([['status', 1],['featured', 1],]) ->orderBy('id', 'DESC')->limit(6)
->get();
    $special_offer = Book::where('special_offer' , 1)->orderBy('id' ,'DESC')->limit(3)->get();
    
        return view('frontend.index',compact('categories','sliders', 'books', 'featured','special_offer','blogpost'));
  }

public function home()
{
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
}

  public function UserLogout(){
    Auth::logout();
    return redirect()->route('login');
}

 public function UserProfile(){
  $id = Auth::user()->id;
  $user = User::find($id);
   return view('frontend.profile.user_profile', compact('user'));
 }

 public function UserProfileStore(Request $request)
{
    $user = User::find(Auth::user()->id);

    // Mettre à jour les champs de l'utilisateur
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;

    // Mettre à jour les champs de l'adresse
    $address = $user->address ?? new Address();
    $address->street_name = $request->street;
    $address->street_number = $request->number;
    $address->city = $request->city;
    $address->save();

    // Associer l'adresse à l'utilisateur
    $user->address_id = $address->id;
    $user->save();

    // Gérer la photo de profil (si nécessaire)

    $notification = [
        'message' => 'User Profile Updated Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('dashboard')->with($notification);
}


//  public function UserProfileStore(Request $request){

//   $Data = User::find(Auth::user()->id);
//             $Data->name = $request->name;
//             $Data->email = $request->email;
//             $Data->phone = $request->phone;
            
//             if($request->file('profile_photo_path')) {
//                 $file = $request->file('profile_photo_path');
//                 @unlink(public_path('upload/user_images/'.$Data->profile_photo_path));
//                 $filename = date('YmdHi').$file->getClientOriginalName();
//                 $file->move(public_path('upload/user_images'), $filename);
//                 $Data['profile_photo_path']= $filename;
//             }
//             $Data->save();

//             $notification = array(
//                 'message' => 'User Profile Updated Successfully' ,
//                 'alert-type' => 'success'
//             );

//                 return redirect()->route('dashboard')->with($notification);
// }

  public function UserChangePassword() {
    $id = Auth::user()->id;
    $user = User::find($id);

        return view('frontend.profile.change_password', compact('user'));
               }

               public function UserUpdatePassword(Request $request){

                $validateData = $request->validate([
                    'oldpassword' => 'required' ,
                    'password'    => 'required|confirmed' ,

                ]);

                $hashedPassword = Auth::user()->password;
                if (Hash::check($request-> oldpassword , $hashedPassword )) {
                  $user = User::find(Auth::id());
                  $user -> password = Hash::make($request->password);
                  $user->save();
                 
                  Auth::logout();
                   return redirect()->route('user.logout');
                }else{
                    return redirect()->back();
                }
            }

  public function bookDetail( $id, $slug ) {
    $book = Book::findOrFail($id);
    $multiImgs = MultiImg::where('booK_id' , $id )->get();
    $cat_id = $book->categoryBook_id;
    $relatedBook = Book::where('categoryBook_id' , $cat_id)->where('id', '!=',$id)->orderBy('id' , 'DESC')->get();
    $review = Review::where('book_id',$book->id)->latest()->limit(5)->get();
    
     return view('frontend.book.book_detail', compact('book' , 'multiImgs', 'relatedBook', 'review'));


  }

  // SubCategory Wise Data :
  public function subCatWiseBook( $subCat_id , $slug  ){
    $books= Book::where('status',1)->where('subCategory_id',$subCat_id)-> orderBy('id' , 'DESC')->paginate(3);
    $categories = Category::orderBy('name','ASC')->get();
    $breadSubCat = SubCategory::with(['category'])->where('id', $subCat_id)->get();
      return view('frontend.book.subCategory_view', compact('books', 'categories', 'breadSubCat'));
}

  // Book View Modal AJAX
  public function bookViewModalAJAX($id) {
    $book = Book::with('categoryBook')->findOrFail($id);
      return response()->json(array(
        'book' => $book ,
      ));
  }

  // Method Search Book
public function search(){
   $item = request()->search;

   if (empty($item)) {
    if (session()->get('language') == 'french') {  
    $notification = array(
      'message' => 'Le champ de recherche ne peut pas être vide.' ,
      'alert-type' => 'warning'
  );
  return redirect('/')->with($notification);
   } 
    $notification = array(
      'message' => 'The search field cannot be empty.' ,
      'alert-type' => 'warning'
    );
  return redirect('/')->with($notification);
   }
  
  
   request()->validate(["search" => "required"]);

   $categorySearch = [];
   $bookSearch = [];

  if(request()->isMethod('get')){
     { 
      $categorySearch = Category::orderBy('name', 'ASC')->get();
      $bookSearch = Book::leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
        ->leftJoin('categories', 'books.categoryBook_id', '=', 'categories.id')
        ->where(function($query) use ($item) {
          $query->where('books.title', 'LIKE', "%$item%")
            ->orWhere('books.ISBN', 'LIKE', "%$item%")
            ->orWhere('publishers.name', 'LIKE', "%$item%")
            ->orWhere('categories.name', 'LIKE', "%$item%");
  
        })
        ->get();
       
    } 
      
    
    return view('frontend.book.search_book', compact('categorySearch', 'bookSearch','item'));
  }
      
   // Si la méthode est POST, on valide le champ "search"
   request()->validate(["search" => "required"]);

   if (empty($item)) {
    $notification = array(
      'message' => 'The search field cannot be empty.' ,
      'alert-type' => 'danger'
  );
  return redirect('/')->with($notification);
   }
 
   if (session()->get('language') == 'french') {  
     $categorySearch = Category::orderBy('name', 'ASC')->get();
     $bookSearch = Book::leftJoin('publishers', 'books.publisher_id', '=', 'publishers.id')
       ->leftJoin('categories', 'books.categoryBook_id', '=', 'categories.id')
       ->where(function($query) use ($item) {
         $query->where('books.name_fr', 'LIKE', "%$item%")
           ->orWhere('books.ISBN', 'LIKE', "%$item%")
           ->orWhere('publishers.name_fr', 'LIKE', "%$item%")
           ->orWhere('categories.name_fr', 'LIKE', "%$item%");
 
       })
       ->get();
   
  }
       return view('frontend.book.search_book', compact('categorySearch', 'bookSearch','item')); 
  
}


//Method Advanced Search Book
public function searchBook(Request $request){
  $request->validate(["search" => "required"]);
  $item = $request->search;	

  if (empty($item)) {
      $notification = array(
          'message' => 'The search field cannot be empty.',
          'alert-type' => 'danger'
      );
      if ($request->isMethod('post')) {
          return redirect(url('search_product'))->with($notification);
      } else {
          return view('frontend.book.search_book_advanced');
      }
  }
  
  $books = Book::where('name_en','LIKE',"%$item%")->select('name','image','price','id')->limit(5)->get();
  return view('frontend.book.search_book_advanced',compact('books'));
}

public function donnateBook(){
  
  if (session()->get('language') == 'english'){
  $partners = [
    
    [
        'name' => 'Noé',
        'description' => 'Noé\'s mission is to safeguard biodiversity in France and internationally. To carry out this mission, the association deploys conservation programs for endangered species and restoration of protected natural habitats.',
        'image' => 'https://noe.org/media/logo-noe-115px.png?1606486237',
        'url' => 'https://noe.org/'
    ],
    [
        'name' => 'Environnement Brussels',
        'description' => 'Improving the quality of life in this magnificent, green, creative and multicultural region that is Brussels and facilitating its transition to a more ecological, more ethical and socially fairer society: this is the reason for being of Brussels Environment for more than 30 years!',
        'image' => 'https://environnement.brussels/themes/custom/ocelot_baseline/components/logo/assets/logo.svg',
        'url' => 'https://environnement.brussels/'
    ],
    [
        'name' => 'Natagora',
        'description' => 'Present on all fronts to defend biodiversity, Natagora creates and manages nature reserves and develops many other actions involving all actors of society. Natagora\'s goal is to protect nature near you, in Wallonia and Brussels.',
        'image' => 'https://www.natagora.be/themes/custom/natagora/img/donation_v2/logo1.png',
        'url' => 'https://www.natagora.be/qui-est-natagora'
    ]
];
  }
  $partners = [
    [
      'name' => 'Noé',
      'description' => "La mission de Noé est de sauvegarder la biodiversité en France et à l'étranger. Pour mener à bien cette mission, l'association déploie des programmes de conservation pour les espèces en danger et la restauration des habitats naturels protégés.",
      'image' => 'https://noe.org/media/logo-noe-115px.png?1606486237',
      'url' => 'https://noe.org/'
      ],
      [
      'name' => 'Environnement Brussels',
      'description' => "Améliorer la qualité de vie dans cette magnifique région verte, créative et multiculturelle qu'est Bruxelles et faciliter sa transition vers une société plus écologique, plus éthique et socialement plus juste : telle est la raison d'être de Bruxelles Environnement depuis plus de 30 ans !",
      'image' => 'https://environnement.brussels/themes/custom/ocelot_baseline/components/logo/assets/logo.svg',
      'url' => 'https://environnement.brussels/'
      ],
      [
      'name' => 'Natagora',
      'description' => "Présente sur tous les fronts pour défendre la biodiversité, Natagora crée et gère des réserves naturelles et développe de nombreuses autres actions impliquant tous les acteurs de la société. L'objectif de Natagora est de protéger la nature près de chez vous, en Wallonie et à Bruxelles.",
      'image' => 'https://www.natagora.be/themes/custom/natagora/img/donation_v2/logo1.png',
      'url' => 'https://www.natagora.be/qui-est-natagora'
      ]
];
  return view('frontend.donnate.donnate_book',compact('partners'));
}

public function aboutSlider()
{


  $partners = [
    [
        'name' => 'Noé',
        'description' => 'Noé\'s mission is to safeguard biodiversity in France and internationally. To carry out this mission, the association deploys conservation programs for endangered species and restoration of protected natural habitats.',
        'image' => 'https://noe.org/media/logo-noe-115px.png?1606486237',
        'url' => 'https://noe.org/'
    ],
    [
        'name' => 'Environnement Brussels',
        'description' => 'Improving the quality of life in this magnificent, green, creative and multicultural region that is Brussels and facilitating its transition to a more ecological, more ethical and socially fairer society: this is the reason for being of Brussels Environment for more than 30 years!',
        'image' => 'https://environnement.brussels/themes/custom/ocelot_baseline/components/logo/assets/logo.svg',
        'url' => 'https://environnement.brussels/'
    ],
    [
        'name' => 'Natagora',
        'description' => 'Present on all fronts to defend biodiversity, Natagora creates and manages nature reserves and develops many other actions involving all actors of society. Natagora\'s goal is to protect nature near you, in Wallonia and Brussels. With a great objective: to redeploy biodiversity.',
        'image' => 'https://www.natagora.be/themes/custom/natagora/img/donation_v2/logo1.png',
        'url' => 'https://www.natagora.be/qui-est-natagora'
    ]
];

// Calculer le nombre de partenaires
$num_partners = count($partners);


    $booksSoldByYear = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('books', 'order_items.book_id', '=', 'books.id')
        ->select(DB::raw('SUM(order_items.qty) as total'))
        ->whereYear('orders.created_at', date('Y'))
        ->first()->total;
        // PAR TONNES
        // ->first()->total / 1000;

    $booksSoldByMonth = [        'January' => 0,        'February' => 0,        'March' => 0,        'April' => 0,        'May' => 0,        'June' => 0,        'July' => 0,        'August' => 0,        'September' => 0,        'October' => 0,        'November' => 0,        'December' => 0,    ];

    $booksSold = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('books', 'order_items.book_id', '=', 'books.id')
        ->select(DB::raw('SUM(order_items.qty) as total'))
        ->whereYear('orders.created_at', date('Y'))
        ->whereMonth('orders.created_at', date('m'))
        ->first();

    $monthName = date('F');

    $booksSoldByMonth[$monthName] = $booksSold->total;

    return view('frontend.slider.slider_1', compact('booksSoldByYear', 'booksSoldByMonth','num_partners'));
}

}


