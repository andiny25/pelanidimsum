<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f8f9fa;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial, sans-serif;
}

.login-card{
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.card-header{
background:#f05340;
color:white;
text-align:center;
border-top-left-radius:12px;
border-top-right-radius:12px;
padding:20px;
}

.card-header h3{
margin-bottom:5px;
}

.card-body{
padding:30px;
}

.form-control{
border-radius:8px;
}

.btn-login{
background:#f05340;
border:none;
border-radius:8px;
padding:10px;
color:white;
font-weight:500;
}

.btn-login:hover{
background:#d94734;
}

.card-footer{
background:transparent;
text-align:center;
padding-bottom:20px;
}

.small-text{
color:#6c757d;
}

a{
color:#f05340;
text-decoration:none;
}

a:hover{
color:#d94734;
}

</style>

</head>

<body>

<div class="container">
<div class="row justify-content-center">

<div class="col-md-5">

<div class="card login-card">

<!-- HEADER -->
<div class="card-header">

<h3>Welcome Back</h3>
<p class="mb-0">Please login to your account</p>

@if(session('error'))
<div class="mt-2">
<b>{{ session('error') }}</b>
</div>
@endif

</div>


<!-- BODY -->
<div class="card-body">

@if($errors->any())
<div class="alert alert-danger">
<ul class="mb-0">
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif


<form action="/auth/login" method="POST">
@csrf

<div class="mb-3">

<label for="email" class="form-label">Email</label>

<input
type="email"
class="form-control"
id="email"
name="email"
placeholder="Enter your email"
required>

</div>


<div class="mb-4">

<label for="password" class="form-label">Password</label>

<input
type="password"
class="form-control"
id="password"
name="password"
placeholder="Enter your password"
required>

</div>


<div class="d-grid mb-3">

<button type="submit" class="btn btn-login">
Login
</button>

</div>


<div class="text-center">

<a href="{{ route('auth.forget') }}">
Forget Password?
</a>

</div>

</form>

</div>


<!-- FOOTER -->
<div class="card-footer">

<p class="small-text">
Don't have an account?
<a href="#">Sign up</a>
</p>

</div>

</div>

</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>