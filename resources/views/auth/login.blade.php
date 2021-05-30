<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style type="text/css">
    body
         {
            background-image: url('http://cdn.shopify.com/s/files/1/0070/8666/9890/products/15828544401603.png?v=1569185486');
            background-repeat: no-repeat;
            background-size: 100%;
           

        } 
    .container{
        background:white;
        width: 30%;
        border: 3px solid black;
        padding: 10px;
        margin: 60px auto;
    }
   

</style>
<body >

<div class="container">
    <div class="row"  >
        <div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
        <br><br><br>
        <div class="col col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
        <br><br><br><br><br>
            <h4>LOGIN</h4>
            <br>
            <form action="{{ route('auth.check') }}" method="post">
            @if(Session::get('fail'))
                <div class="alert alert-danger">
                {{ Session::get('fail') }}
                </div>

            @endif
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter the email " value="">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter the password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <br>
                
                <br>
                <button type="submit" class="btn btn-block btn-primary">Sign in</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('dash.dashboard') }}"  class="add-to-cart btn btn-primary">Home</a>
                <br><br>
                <a href="{{ route('auth.register') }}">New User</a>
                <br><br><br>
            </form>
        </div>
    </div>    
</div>
<div class="col col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>   
</body>
</html>