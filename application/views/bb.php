<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Coi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://localhost/CI3/assets/css/bootstrap.min.css">
  <script src="http://localhost/CI3/assets/js/jquery-3.1.1.min.js"></script>
  <script src="http://localhost/CI3/assets/js/bootstrap.min.js"></script>

  <style>
  table {
      border-collapse:collapse;
      width:100%;
    }
    th,td {
      text-align:left;
      padding:8px;
      border-bottom:1px solid #ddd;
    }
    tr:nth-child(even){background-color:#f2f2f2}

    th {
      background-color:#4CAF50;
      color:white;
    }
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:700px;color: #fff; background-color: #FFC0CB;}
  #section2 {padding-top:50px;height:800px;color: #fff; background-color: #028482;}
  #section3 {padding-top:50px;height:700px;color: #fff; background-color: #32cd32;}
  #section4 {padding-top:50px;height:800px;color: #fff; background-color: #151b8d;}
	.warna-1{ color:black;
		  background-color: #FFC0CB;
	}
	.navbar-brand{
	padding:0px;
	}
	.warna-2{
	background-color:black;
	color:white;
	}
	.navbar-brand img{
	height:50px;
	weight:50px;
	}
	.affix {
      	top: 0;
      	width: 100%;
  	}
  	.affix + .container-fluid {
      	padding-top: 70px;
	  }
	.gambar{
	text-center;
	}
	.layout{
		height:100px;
		weight:150px;
	}
div.img {
    border: 1px solid #ccc;
}

div.img:hover {
    border: 1px solid #777;
}

div.img img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
  </style>
</head>
<body>

<div class="container-fluid text-center" style="background-color:#FFFFFFF;height:160px;">
  <br>
  <br>
  <img src="http://localhost/CI3/upload/Gambar/lol 2.png">
</div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                       
      </button>
      <a class="navbar-brand" href="#"><img class="img-responsive" alt="Brand" src="
    http://localhost/CI3/upload/Gambar/GOGO.jpg"></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index">Home</a></li>
          <li><a href="index#section2">About</a></li>
          <li><a href="blog">Blog</a></li>
      </div>
    </div>
  </div>
</nav>    
<div id="section2" class="container-fluid">
	<div class="container">
 <div class="jumbotron warna-1">
			<?php 
  foreach ($detail as $key): ?>
    <table border="1" width="600">
      <b>
      <tr>
        <td>
        Judul Artikel : <?=$key->title;?>
        </td>
      </tr>
      <tr>  
        <td>
        Tanggal Posting : <?=$key->tgl_posting;?>
        </td>
      </tr>
      <tr>  
        <td>
        Artikel : <?=$key->artikel;?>
        </td>
      </tr>
      <tr>  
        <td>
        <img src="http://localhost/CI3/upload/Gambar/<?php echo $key->image; ?>" height="50" weight="60%">
        </td>
      </tr>
    </b>
    </table>
  <?php endforeach ?>
 </div>
<div class="clearfix"></div>
	</div>
</div>

<div class="clearfix"></div>
</div>
</div>

<div class="container-fluid warna-2 text-center">
		<h3><a href="#top"> <span class="glyphicon glyphicon-chevron-up"></span></a>
		<br>
		Home of Pictures<h3>
		
	<div class="row" style="color:gray;">
		<div class="col-sm-2 small"><span class="glyphicon glyphicon-earphone"> 089 636 424 123</div>
		<div class="col-sm-8 small">Copyright 2018 - Ilham Yahya</div>
		<div class="col-sm-2 small text-left">
			<span class="glyphicon glyphicon-envelope"/><a href="mailto:ilhamyahya76@gmail.com">ilhamyahya76@gmail.com</a></div>
		
	</div>
<script>
$(document).ready(function(){
  $('body').scrollspy({target: ".navbar", offset: 50});   
  $("#myNavbar a").on('click', function(event) {
    if (this.hash !== "") {
      
      event.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        window.location.hash = hash;
      });
    }
  });
});
</script>
</body>
</html>