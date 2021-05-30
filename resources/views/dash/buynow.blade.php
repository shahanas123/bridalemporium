<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="https://cdn5.vectorstock.com/i/1000x1000/80/84/letter-b-beauty-women-face-logo-design-vector-27938084.jpg"  alt="..." width="40" height="40">BRIDAL EMPORIUM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       
        
      </ul>
    </div>
    <div>
    <ul class="nav justify-content-center">
<li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.dashboardu') }}" style="color: #DEDFE2" >Home</a>
  </li>
<li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.ballgownsu') }}" style="color:#DEDFE2" >BallGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.mermaidgownsu') }}" style="color:#DEDFE2">MermaidGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.sheathgownsu') }}" style="color:#DEDFE2">SheathGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.cart') }}"  style="color:#DEDFE2">Cart</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.reviewsu') }}" style="color:#DEDFE2">Reviews</a>
  </li>
  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('auth.logout') }}">Logout</a>
        </li>
  

</ul>
  </div>
</nav>

  
<br>
<style>
.btn-one {
  color: #FFF;
  transition: all 0.3s;
  position: relative;
}
.btn-one span {
  transition: all 0.3s;
}
.btn-one::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  opacity: 0;
  transition: all 0.3s;
  border-top-width: 1px;
  border-bottom-width: 1px;
  border-top-style: solid;
  border-bottom-style: solid;
  border-top-color: rgba(255,255,255,0.5);
  border-bottom-color: rgba(255,255,255,0.5);
  transform: scale(0.1, 1);
}
.btn-one:hover span {
  letter-spacing: 3px;
}
.btn-one:hover::before {
  opacity: 1; 
  transform: scale(1, 1); 
}
.btn-one::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 1;
  transition: all 0.3s;
  background-color: rgba(255,255,255,0.1);
}
.btn-one:hover::after {
  opacity: 0; 
  transform: scale(0.1, 1);
}
.btn-two {
  
  background-color: rgba(255,255,255,0.1);
  
  color: #FFF;
  
  border-radius: 0px;
  border-top: 2px solid #192b2c   ;
  border-bottom: 2px solid #0D64EE   ;
}
</style>

<body>
   
   

<div class="container">
    
        <br>
        <h4>Transaction Summary</h4>
        
       <br>
        <div class="col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-12">
        
            <form action="{{ route('dash.order') }}" method="post">
            
            
        <h6>Order Details</h6>
        

            @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif



            @foreach($product as $prod)
        <tr>
        
        
        <img src="{{ asset('storage/images/' . $prod->image) }}" width="350px;" height="350px;" alt="image">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            Name : {{ $prod->prname }}
            &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;
Sizes available:
                
<select class="input" name="size" id="size" style="width:50px; height: 40px;">
        
        
       
      
         
                  
                
                
                  
                @if( $prod->small)  
                <option value="1">S</option>
  @endif
                @if( $prod->medium)
                <option value="2">M</option>
  
  
  @endif
                @if( $prod->large)
                <option value="3">L</option>
                @endif
                </select>
                
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Price : {{ $prod->price }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br>
        </tr>
@endforeach
<tr></tr>

</div>


<div class="container">



            @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter the name" value="{{ $LoggedUserInfo['name'] }}" required>
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Mobile number</label>
                    <input type="text" class="form-control" name="mobile" placeholder="Enter the Mobile number" value="" required>
                    <span class="text-danger">@error('mobile'){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter the email Address" value="{{ $LoggedUserInfo['email'] }}" readonly>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Address</label>
                    <input type="textarea" class="form-control" name="address" placeholder="Enter the Address" required>
                    <span class="text-danger">@error('Address'){{ $message }}@enderror</span>
                </div>
                <br>
                 <div class="form-group">
                    <label>Pin code</label>
                    <input type="text" class="form-control" name="pincode" placeholder="Enter the pincode " value="" required>
                    <span class="text-danger">@error('pincode'){{ $message }}@enderror</span>
                </div>
                <br>
                <label>Card details</label>
                
                <div class="input-group" >
                    <input type="text" class="form-control" name="card" placeholder="Card Number" value="" style="width:10px; height:40px" required>
                    &nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="cvv" placeholder="CVV" value="" style="width:10px; height:40px" required>
                    <span class="text-danger">@error('card'){{ $message }}@enderror</span>
                    <span class="text-danger">@error('cvv'){{ $message }}@enderror</span>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   
                </div>
                <br>
                
                <button type="submit" class="btn btn-block btn-success">Confirm Payment</button>
                <br><br>
                </table>
                </div>
            </form>
        </div>
    </div>    
</div>
<div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body> 
</html>