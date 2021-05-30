
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
    <a class="btn btn-two" aria-current="page" href="{{ route('dash.dashboardu') }}" style="color: #DEDFE2" >Home</a>
  </li>
<li class="nav-item">
    <a class="btn btn-one" aria-current="page" href="{{ route('dash.ballgownsu') }}" style="color:#DEDFE2" >BallGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.mermaidgownsu') }}" style="color:#DEDFE2">MermaidGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.sheathgownsu') }}" style="color:#DEDFE2">SheathGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.cart') }}" style="color:#DEDFE2"  >Cart</a>
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


<script>
  function preventBack(){window.history.forward();}
  setTimeout("preventBack()", 0);
  window.onunload=function(){null};
</script>


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
  
<br>
<marquee width="100%" direction="right" height="60px" style="font-size:30px;">
Welcome  {{ $LoggedUserInfo['name'] }}</marquee>

<body style="background-color:#F8F9F9  ;">

    <div class="container">
        <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" data-interval="100">
    <div class="carousel-item active">
      <img src="https://samyakkimg.gumlet.io/magestore/bannerslider/images//0/1/01_7.jpg?w=1536&dpr=1.3" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="100">
      <img src="https://samyakkimg.gumlet.io/magestore/bannerslider/images//0/6/06_2.jpg?w=1536&dpr=1.3" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="100">
      <img src="https://samyakkimg.gumlet.io/magestore/bannerslider/images//0/7/07_1.jpg?w=1536&dpr=1.3" class="d-block w-100"  alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  <br><br>
</div>
<br><br>
<h4><center>Gowns</h4>
        <div class="row">
            <div class="col col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://ik.imagekit.io/ldqsn9vvwgg/images-small/tr:q-100/1624733.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrLzL-5AmS4P9k76MFsgYODNoqImkrM9KWIQ&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                       
                    </div>
                </div>
            </div>
            



            <div class="col col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREfVaBshbSrSkF_YDxNRRQ1nvIxnlkNYRPLw&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTU38DY2HMIvkTLNepHLCL3cnn7RBCDGxDzEw&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>

            <div class="col col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoMYPqIRr9NGDMTi1OqrjIftzf7MyN6qOhNw&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card" style="width: 20rem;">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrxMQeMEMO5VUiyQPO4P_MqhIJUxqlMUP6eA&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            

            
        </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body> 
</html>