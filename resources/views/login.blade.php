<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Pelani Dimsum</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

*{
box-sizing:border-box;
}

body{
font-family:'Poppins',sans-serif;
background:linear-gradient(135deg,#FFF2E6,#FFD6BF);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
margin:0;
}

/* CARD LOGIN */

.login-container{
background:white;
padding:40px;
border-radius:30px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
width:360px;
text-align:center;
}

/* LOGO */

.login-container img{
width:70px;
margin-bottom:10px;
}

/* TITLE */

.login-container h2{
margin-bottom:10px;
color:#FF7A3D;
font-weight:600;
}

/* TEXT */

.login-container p{
font-size:14px;
color:#666;
margin-bottom:20px;
}

/* INPUT */

.input-group{
position:relative;
width:100%;
margin-bottom:15px;
}

.input-group i{
position:absolute;
left:12px;
top:50%;
transform:translateY(-50%);
color:#999;
font-size:14px;
}

.input-group input{
width:100%;
height:42px;
padding-left:38px;
border:1px solid #ddd;
border-radius:8px;
font-size:14px;
outline:none;
}

.input-group input:focus{
border-color:#FF7A3D;
}

/* BUTTON LOGIN */

.btn-login{
width:100%;
height:42px;
border:none;
border-radius:8px;
background:#FF7A3D;
color:white;
font-size:14px;
font-weight:500;
cursor:pointer;
margin-top:5px;
}

.btn-login:hover{
background:#ff5f1f;
}

/* GOOGLE BUTTON */

.btn-google{
margin-top:10px;
width:100%;
height:42px;
border-radius:8px;
border:1px solid #ddd;
background:white;
display:flex;
align-items:center;
justify-content:center;
font-size:14px;
text-decoration:none;
color:#333;
}

.btn-google i{
margin-right:8px;
color:#DB4437;
}

.btn-google:hover{
background:#f5f5f5;
}

/* MESSAGE */

.success-message{
color:green;
font-size:14px;
margin-bottom:10px;
}

.error-message{
color:red;
font-size:14px;
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="login-container">

{{-- <img src="{{ asset('assets-admin/img/logo.jpg') }}" alt="Logo"> --}}

<h2>Login Pelani Dimsum</h2>

<p>Masukkan email dan password untuk login</p>

@if (session('message'))
<p class="{{ session('result') === 'success' ? 'success-message' : 'error-message' }}">
{{ session('message') }}
</p>
@endif

<form action="{{ route('login.kirim') }}" method="POST">
@csrf

<div class="input-group">
<i class="fa fa-envelope"></i>
<input type="email" name="email" placeholder="Email" required>
</div>

<div class="input-group">
<i class="fa fa-lock"></i>
<input type="password" name="password" placeholder="Password" required>
</div>

<button type="submit" class="btn-login">
Login
</button>

</form>

<a href="{{ route('redirect.google') }}" class="btn-google">
<i class="fab fa-google"></i>
Login dengan Google
</a>

</div>

</body>
</html>
