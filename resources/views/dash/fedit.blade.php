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
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.dashboarda') }}" style="color: #DEDFE2" >Home</a>
  </li>
<li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.ballgownsa') }}" style="color:#DEDFE2" >BallGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.mermaidgownsa') }}" style="color:#DEDFE2">MermaidGowns</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.sheathgownsa') }}" style="color:#DEDFE2">SheathGowns</a>
  </li>
  
 <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.reviewsa') }}" style="color:#DEDFE2">Reviews</a>
  </li>

  <li class="nav-item">
    <a class="btn btn-one active" aria-current="page" href="{{ route('dash.orders') }}" style="color:#DEDFE2"  >Orders</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.addproduct') }}" style="color:#DEDFE2">Add</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-one" href="{{ route('dash.orderreport') }}" style="color:#DEDFE2">Reports</a>
  </li>

  <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('auth.logout') }}">Logout</a>
        </li>
  

</ul>
  </div>
</nav>


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
    <div class="row"  >
        <div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        <br><br><br>
        <div class="col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6"></div>
            <h4><center>Edit Product</h4>
            <br>
            
            <form action="{{ route('dash.fupdate') }}" method="post" enctype='multipart/form-data'>
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
            
            
            
            
            
                
                @csrf 
                <div class="form-group">
                    <label>Product Id</label>
                    <input type="text" class="form-control" name="id" placeholder="" value="{{ $eproduct->id }}" readonly>
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="prname" placeholder="" value="{{ $eproduct->prname }}">
                    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                </div>
                <br>
                Product Type
                <br>
                <select class="input" name="type" id="type" style="width: 300px; height: 40px;">
        <option value="1">Ball Gown</option>
        <option value="2">Mermaid Gown</option>
        <option value="3">Sheath Gown</option>
      </select>
      <br><br>

                Sizes available<br>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="small" name="small"  data-value="0" value="1">
                <label class="form-check-label" for="small">Small</label>
                </div>

                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="medium" name="medium" data-value="0" value="1">
                <label class="form-check-label" for="medium">Medium</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="large" name="large" data-value="0" value="1">
                <label class="form-check-label" for="large">Large</label>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="quantity" placeholder="Enter quantity" value="{{ $eproduct->quantity }}" required>
                    <span class="text-danger">@error('quantity '){{ $message }} @enderror</span>
                </div> 
                <br>

                
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" placeholder="" value="{{ $eproduct->price }}">
                    <span class="text-danger">@error('price '){{ $message }} @enderror</span>
                </div>        
                <br>
                <div class="form-group">
                  <div class="custom-file">
                  <label>Image</label>
                  <br>
                  <img src="{{ asset('storage/images/' . $eproduct->image) }}" width="350px;" height="350px;" alt="image">
                </div>
                </div>
                  
                <br>
                
               
                &nbsp;
                
                <br><br>
                <button type="submit" class="btn btn-block btn-info">Update</button>
                <br><br>
            </form>
        </div>
    </div>    
</div>
<div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body> 
</html>