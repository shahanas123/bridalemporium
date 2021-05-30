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
    <a class="btn btn-two active" aria-current="page" href="{{ route('dash.cart') }}"  style="color:#DEDFE2">Cart</a>
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

<body style="background-color:#F8F9F9  ;">

<div class="container">
    <div class="row"  >
        <div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        <br><br>
        <div class="col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-12">
      <br>
@csrf 
@foreach($product as $prod)
        <tr>
        
       

        
        <img src="{{ $prod->image }}" width="350px;" height="350px;" alt="image">
        &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
            Name : {{ $prod->prname }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Price : {{ $prod->price }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/dash/{{$prod->id}}/remove"  class=" btn btn-warning">Remove</a>
            &nbsp;&nbsp;&nbsp;
            


            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   
    
    
        
        </tr>
      
@endforeach
<center>

<a  class="btn btn-success" href="{{ route('dash.carttobuy') }}" >order Now</a>



</center>


    </table>
    </div>
    </div>    
</div>
<div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body> 
</html>