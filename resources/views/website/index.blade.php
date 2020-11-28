<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Typing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/download.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 270px;
  }
  </style>
<body style="font-family: sans-serif;">

<div class="container">

      <?php
      if(Session::get('login_faild') != null) { ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong><?php echo Session::get('login_faild') ; ?></strong>
      <?php echo Session::put('login_faild',null) ; ?>
      </div>
      <?php } ?>

      @if (count($errors) > 0)
      @foreach ($errors->all() as $error)      
      <div class="alert alert-danger alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong>{{ $error }}</strong>
      </div>
      @endforeach
      @endif

      <?php if(Session::get('password_change') != null) { ?>
      <div class="alert alert-info alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong><?php echo Session::get('password_change') ;  ?></strong>
      <?php Session::put('password_change',null) ;  ?>
      </div>
      <?php } ?>

      <?php if(Session::get('success') != null) { ?>
      <div class="alert alert-info alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong><?php echo Session::get('success') ;  ?></strong>
      <?php Session::put('success',null) ;  ?>
      </div>
      <?php } ?>

      <?php
      if(Session::get('failed') != null) { ?>
      <div class="alert alert-danger alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong><?php echo Session::get('failed') ; ?></strong>
      <?php echo Session::put('failed',null) ; ?>
      </div>
      <?php } ?>

      @if (count($errors) > 0)
      @foreach ($errors->all() as $error)      
      <div class="alert alert-danger alert-dismissible" role="alert">
      <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
      <strong>{{ $error }}</strong>
      </div>
      @endforeach
      @endif

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top" style="padding: 20px!important;border-radius: 5px;">
  <a class="navbar-brand" href="#">Smart Typing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
      </li>
    </ul>
      {!! Form::open(['url' => 'userloginProcess','method' => 'post' , 'class'=> 'form-inline my-2 my-lg-0' , 'id'=> 'form_validation' ]) !!}
      <input class="form-control mr-sm-2" type="email" placeholder="Username" name="login_username" aria-label="Search" autocomplete="off" required>&nbsp;
      <input class="form-control mr-sm-2" type="password" placeholder="Password" name="login_password" aria-label="Search" required>
      <button class="btn btn-success my-2 my-sm-0" type="submit">Login</button>
    {!! Form::close() !!}
  </div>
</nav>

<div class="row">
    <div class="col-md-6">
        <br><br>
        <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators" style="display: none;">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php $firstSliderQuery = DB::table('tbl_slider')->orderBy('id','asc')->take(1)->get();
    foreach ($firstSliderQuery as $value1) { ?>
      <div class="carousel-item active">
        <img style="border-radius: 7px;" src="{{ URL::to('public/images/slider') }}/{{ $value1->slider_image }}">
      </div>
    <?php } ?>
    
  <?php 
    $sliderQuery = DB::table('tbl_slider')->skip(1)->take(5)->get();
    foreach ($sliderQuery as $value) { ?>
    <div class="carousel-item">
      <img style="border-radius: 7px;" src="{{ URL::to('public/images/slider') }}/{{ $value->slider_image }}">
    </div>
    <?php } ?>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    </div>
    
    <div class="col-md-6">
        <br><u><h3 class="text-center">Registration</h3></u>
        {!! Form::open(['url' => 'userRegistrationProcess','method' => 'post' , 'id'=> 'regForm' ]) !!}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="email">First Name <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" id="email" placeholder="First Name" name="first_name" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="email">Last Name <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" id="email" placeholder="Last Name" name="last_name" required="">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="email">Username (E-mail Address) <span style="color:red;font-weight: bold;">*</span></label>
              <input type="email" class="form-control" placeholder="Username (E-mail Address)" name="username" id="username" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="email">Mobile No <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" placeholder="Mobile" name="mobile" required="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="password">Password <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" placeholder="Password" name="password" required="" id="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="password">Confirm Password <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" placeholder="Confirm Password" name="confirmPassword" id="cpassword" required="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
              <label for="email">Birthday <span style="color:red;font-weight: bold;">*</span></label>
                <input type="number" class="form-control" id="email" placeholder="Day" name="day" required="">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              <label for="password">Month <span style="color:red;font-weight: bold;">*</span></label>
              <select name="month" class="form-control" required="">
                <option value="">Select Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
              <label for="password">Year <span style="color:red;font-weight: bold;">*</span></label>
              <input type="number" class="form-control" id="email" placeholder="Year" name="year" required="">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
              <label for="email">Birth Certificate No <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" class="form-control" id="email" placeholder="Birth Certificate No" name="birth_certificate_no" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label for="password">NID No </label>
              <input type="text" class="form-control" id="email" placeholder="NID No" name="nid">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
              <label for="password">Gender </label>
              <div class="form-check-inline">
                <label class="form-check-label">
                  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" class="form-check-input" name="gender" value="1">Male
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="2">Female
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="gender" value="3">Others
                </label>
              </div>
              </div>
            </div>
          </div>
 
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        {!! Form::close() !!}
    </div>
</div>


</div>

</body>
</html>
<script>
   $( document ).ready(function() {
      // var username = $('[name="username"]').val('');
      $("input#password").attr("type","password");
      $("input#cpassword").attr("type","password");
  });
</script>
