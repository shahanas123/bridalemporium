<?php
use  App\Http\Controllers\maincontroller;
$total= maincontroller::CartItem();
?>
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
    <form action="{{ route('dash.searchu1') }}" method="get">
    <input type="text" class="se" name="prname" required/>
    <button type="submit" class="btn btn-three">Search</button>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.dashboardu') }}" style="color: #DEDFE2" >Home</a>
  </li>
<li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.ballgownsu') }}" style="color:#DEDFE2" >BallGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-two" href="{{ route('dash.mermaidgownsu') }}" style="color:#DEDFE2">MermaidGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.sheathgownsu') }}" style="color:#DEDFE2">SheathGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.cart') }}"  style="color:#DEDFE2">Cart ({{$total}})</a>
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
.btn-three {
  
  background-color: rgba(255,255,255,0.1);
  
  color: #FFF;
  
  border-radius: 4px;
  border-bottom: 4px solid #192b2c   ;
  
}
.se {
  
  background-color: #F8F9F9;
  
  color: #292b2c;
  height: 38px;
  border-radius: 5px;
  
}
</style>
  <body>
  <style>.card {
        margin: auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
}
      .item {
    position:relative;
    padding-top:20px;
    display:inline-block;
}
.notify-badge{
    position: absolute;
    left:280px;
    top:0px;
    background:red;
    text-align: center;
    border-radius: 30px 30px 30px 30px;
    color:white;
    padding:5px 10px;
    font-size:12px;
}</style>

  
<body style="background-color:#F8F9F9  ;">
<div class="container">
        <div class="row">
            @foreach($product as $prod)
        <tr>
        @if($prod->type==2)

        
        
  	    
  		
			
      

          <div class="col">
            <div class="card" style="width: 20rem;">
      <img class="card-img-top" src="{{ $prod->image }}" width="350px;" height="350px;" alt="Card image cap">
      <div class="card-block">
      
      @if($prod->quantity==1)
      <span class="notify-badge">Exclusive</span>
      @endif
      <h4 class="card-title"> {{ $prod->prname }}</h4>
        <p class="card-text">
        
        <br>
        Sizes available:
            @if( $prod->small)
              S
            
            @endif
            @if( $prod->medium)
              M
            
            @endif
            @if( $prod->large)
              L
            
            @endif
            <br>
            Price: {{ $prod->price }}</p>
             <a href="/dash/{{$prod->id}}/addtocart"  class="add-to-cart btn btn-primary">Add to cart</a>
             <a href="/dash/{{$prod->id}}/buynow"  class=" btn btn-primary">Buy Now</a>

      </div>
    </div>
          </div>
          
          @endif 
        </tr>
@endforeach

           


    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body> 
</html>