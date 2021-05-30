<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;

use App\Models\Orderdetails;
use App\Models\Orderprdetails;
use App\Models\Cart;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class Maincontroller extends Controller
{   
    
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }

    function dashboard()
    {
        return view('dash.dashboard');
    }
    function dashboarda()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.dashboarda',$data);
    }
    function dashboardu()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.dashboardu',$data);
    }


    

    function save(Request $request)
    {
        

        //validate request
        $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:admins',
                'password'=>'required|min:5|max:12'
        ]);

        //insert data into database
        $admin=new Admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        if($request->pin==123){$admin->p=1;}
        else{$admin->p=0;}
        $save=$admin->save();


        if($save){
            return back()->with('success','New user has been successfully created');

            }
        else{
            return back()->with('fail','something went wrong, try again later');
        }
    }

    function check(Request $request)
    {
        
        //validate requests
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=',$request->email)->first();
        
            if(!$userInfo)
            {
             return back()->with('fail','we do not recognize your email');
            }
            else
            {
                //check password
                if(Hash::check($request->password,$userInfo->password))
                {
                    if($userInfo->p)
                    {
                     $request->session()->put('LoggedUser',$userInfo->id);
                     $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
                     return view('dash.dashboarda',$data);
                    }
                    else
                    {
                     $request->session()->put('LoggedUser',$userInfo->id);
                     $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
                     return view('dash.dashboardu',$data);
                    }
                }
                else
                {
                 return back()->with('fail','Incorrect password');
                }
            }    
        
    }


    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            Cart::whereNotNull('id')->delete();
            session()->pull('LoggedUser');
            return redirect('/');
        }
    

    }
    

    function ballgowns()
    {

        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.ballgowns',compact('product'));
    }

    function ballgownsa()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.ballgownsa',$data,compact('product'));
    }
    
    function ballgownsu()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.ballgownsu',$data,compact('product'));
    }
    
    function sheathgowns()
    {
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.sheathgowns',compact('product'));
    }
    
    function sheathgownsa()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.sheathgownsa',$data,compact('product'));
    }

    function sheathgownsu()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.sheathgownsu',$data,compact('product'));
    }

    function mermaidgowns()
    {
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.mermaidgowns',compact('product'));
    }

    function mermaidgownsa()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.mermaidgownsa',$data,compact('product'));
    }

    function mermaidgownsu()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::query()->orderBy('created_at','desc')->get();
        return view('dash.mermaidgownsu',$data,compact('product'));
    }

   

    function manage(){
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.manage',$data);
    }
    
    /////////////////////////////////////////////////////////////////////////////////                     reviews
     
    function reviews()
    {
        
        return view('auth.login');
    }

    function reviewsa()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $review=Review::all();
        return view('dash.reviewsa',$data,compact('review'));
    }
    
    function reviewsu(){
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.reviewsu',$data);
    }
    
    function addreview(Request $request)
    {
        $request->validate([
            'review'=>'required',
           
    ]);
        $review=new Review;
        $review->name=$request->name;
        $review->review=$request->review;
        
        $save=$review->save();


     if($save){
        return back()->with('success','Review added');

     }
     else{
        return back()->with('fail','something went wrong, try again later');
     }
    }
    

    //////////////////////////////////////////////////////////////////////////////////////////////     add product

    function addproduct(){
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.addproduct',$data);
    }
    

    
    //////////////////////////////////////////////////////////////////////////////////////////////    add product - store

    function store(Request $request)
    {
        $product= new Product;

        $product->type =$request->type;
        $product->prname =$request->prname;
        $product->small =$request->small;
        $product->medium =$request->medium;
        $product->large =$request->large;
        $product->price =$request->price;
        $product->quantity =$request->quantity;

        if ($request->hasFile('image')){
            $filenameWithExt=$request->file('image')->getClientOriginalName();
           
            
            $filename= pathinfo($filenameWithExt, PATHINFO_FILENAME);
            
            $extension=$request->file('image')->getClientOriginalExtension();

            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path=$request->file('image')->storeAs('public/images',$fileNameToStore);
    
        }
        $product->image =$fileNameToStore;
        $save=$product->save();

        if($save){
            return back()->with('success','New gown added');
    
        }
        else{
            return back()->with('fail','something went wrong, try again later');
            }
    }


    

    /////////////////////////////////////////////////////////////////////////////////////               edit product

    function update($id)
    {
        $eproduct = Product::where('id','=',$id)->first();
        
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        return view('dash.fedit',$data,compact('eproduct'));
        
    }



 /////////////////////////////////////////////////////////////////////////////////////             final edit product


    function fupdate(Request $request)
    {
        
        $product= Product::find($request->id);

        
        $product->prname =$request->prname;
        $product->type =$request->type;
        $product->small =$request->small;
        $product->medium =$request->medium;
        $product->large =$request->large;
        $product->quantity =$request->quantity;
        $product->price =$request->price;
        
        

        $save=$product->save();
        if($save){
            $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Product::all();
        return view('dash.ballgownsa',$data,compact('product'));
    
        }
        else{
            return back()->with('fail','something went wrong, try again later');
            }
        

    }
    

   

    //////////////////////////////////////////////////////////////////////////////////////////////////// delete product


    


    function fdelete($id){
        
        $product= Product::find($id);

        
        $product->delete();
        
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        
        return back()->with('success','Product has been succefully deleted');
        

    }
    

    
    //////////////////////////////////////////////////////////////////////////////////////////////                    search
    function search(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      
       
       return view('dash.ballgowns',compact('product'));
    }

    function search1(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      
       
       return view('dash.mermaidgowns',compact('product'));
    }


    function search2(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      
       
       return view('dash.sheathgowns',compact('product'));
    }

    function searcha(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
       $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       return view('dash.ballgownsa',$data,compact('product'));
    }

    function searcha1(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
       return view('dash.mermaidgownsa',$data,compact('product'));
    }


    function searcha2(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
       return view('dash.sheathgownsa',$data,compact('product'));
    }

    function searchu(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
       return view('dash.ballgownsu',$data,compact('product'));
    }

    function searchu1(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
       return view('dash.mermaidgownsu',$data,compact('product'));
    }


    function searchu2(Request $request)
    { 
       $getname=request('prname');
       $product=Product::query()->where('prname','LIKE',"%{$getname}%")->get();
       $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
       return view('dash.sheathgownsu',$data,compact('product'));
    }



    ////////////////////////////////////////////////////////////////////////////////////////////              buynow


    function buynow( Request $request,$id)
    {

      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];

     
        $order=Product::find($id);
        $check = Cart::where('pid','=',$order->pid)->first();

     $uid=session('LoggedUser');
   
     $user=Admin::find($uid);
    
     if(!$check){



    $cart= new Cart;
     
    $cart->type=$order->type;
    $cart->pid=$order->id;
    $cart->prname =$order->prname;
    $cart->small =$order->small;
    $cart->medium =$order->medium;
    $cart->large =$order->large;
    $cart->price =$order->price;
    $cart->image =$order->image;

    $cart->name =$user->name;
    $cart->uid =$user->id;
 

    $save=$cart->save();
     }

    $product=Cart::all();
    
    
      return view('dash.buynow',$data,compact('product'));
    }
    
//////////////////////////////////////////////////////////////////////////////////////////////////////          payment

    function order(Request $request)
    {            
      $request->validate([
        'name'=>'required',
        'mobile'=>'numeric|required|digits:10',
        'email'=>'required|email',
        'address'=>'required',
        'pincode'=>'numeric|required|digits:6',
        'card'=>'numeric|required|digits:16',
        'cvv'=>'numeric|required|digits:3',
    ]);

     $c=Cart::all();
     foreach($c as $cart)
     {

     $orderprdetail= new Orderprdetails;
     $orderdetail= new Orderdetails;

     $orderdetail->name =$request->name;
     $orderdetail->mobile =$request->mobile;
     $orderdetail->email =$request->email;
     $orderdetail->address =$request->address;
     $orderdetail->pincode =$request->pincode;
     $orderdetail->uid =$cart->uid;
     $orderdetail->oid =$orderprdetail->id;



     $orderprdetail->uid =$cart->uid;
     $orderprdetail->prname=$cart->prname;
     $orderprdetail->type=$cart->type;
     $orderprdetail->price=$cart->price;
     $orderprdetail->image=$cart->image;



     
     
     if($cart->type==1){$orderprdetail->type ="ball gown";}
     elseif($cart->type==2){$orderprdetail->type ="mermaid gown";}
     else{$orderprdetail->type ="sheath gown";}

     
     $save=$orderprdetail->save();
    
     $orderdetail->oid =$orderprdetail->id;

     $save=$orderdetail->save();
     
     }
     
     foreach($c as $cart)
     {

        $prdecre=Product::find($cart->pid);
        $prdecre->quantity=$prdecre->quantity-1;
        $prdecre->update();

        if($prdecre->quantity==0)
        {
            $prdecre->delete();  
        }

     }

     Cart::whereNotNull('id')->delete();
     
    
     $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
       
     return view('dash.success');
    
    } 

///////////////////////////////////////////////////////////////////////////////////////////////////////     cart

    function addtocart(Request $request,$id)
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];

     
        $order=Product::find($id);
        $check = Cart::where('pid','=',$order->id)->first();

        $uid=session('LoggedUser');
   
        $user=Admin::find($uid);
    
        if(!$check)
        {



          $cart= new Cart;
     
          $cart->type=$order->type;
          $cart->pid=$order->id;
          $cart->prname =$order->prname;
          $cart->small =$order->small;
          $cart->medium =$order->medium;
          $cart->large =$order->large;
          $cart->price =$order->price;
          $cart->image =$order->image;

          $cart->name =$user->name;
          $cart->uid =$user->id;
 

          $save=$cart->save();
        }

        $product=Cart::all();
        return view('dash.addtocart',$data,compact('product'));
    }

    function cart()
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Cart::query()->orderBy('created_at','desc')->get();
        return view('dash.addtocart',$data,compact('product'));
    }

    function carttobuy()
    {
      $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
      $product=Cart::all();
      return view('dash.buynow',$data,compact('product'));
    }


///////////////////////////////////////////////////////////////////////////////////////////////////////////      report


    function orders()
    {       



        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $order= Orderprdetails::all();
        
        return view('dash.orders',$data,compact('order'));
    }


    function orderreport1(Request $request)
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $keyword=request('name');
        
        $report= Orderprdetails::join('Orderdetails','Orderprdetails.id','=','Orderdetails.oid')->where('name','LIKE',"%{$keyword}%")->get();
        return view('dash.report',$data,compact('report'));
         
    }


    function orderreport2(Request $request)
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $keyword=request('date');
       
        $report= Orderprdetails::join('Orderdetails','Orderprdetails.id','=','Orderdetails.oid')->where('Orderprdetails.created_at','LIKE',"%{$keyword}%")->get();
        return view('dash.report',$data,compact('report'));
       
    }

    function orderreport3(Request $request)
    {
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $keyword=request('type');
      
        $report= Orderprdetails::join('Orderdetails','Orderprdetails.id','=','Orderdetails.oid')->where('type','LIKE',"%{$keyword}%")->get();
        return view('dash.report',$data,compact('report'));
        
    }


    function orderreport(Request $request)
    {

        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $report=Orderdetails::all();
        $users=Admin::all();
        return view('dash.orderreport',$data,compact(['report','users']));
       


       
       
    }
    

//////////////////////////////////////////////////////////////////////////////////////////////////////   cart item delete


    function remove($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        $data=['LoggedUserInfo'=>admin::where('id','=',session('LoggedUser'))->first()];
        $product=Cart::query()->orderBy('created_at','desc')->get();
        return view('dash.addtocart',$data,compact('product'));
        

    }
   
    
}




