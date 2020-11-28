<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart-typing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F1F1F4;font-family: sans-serif;">

<div class="container">
    <div class="row">

      <div class="col-md-5" style="background-color: #FFFFFF;margin-top: 35px;border-radius: 10px;">
          <div class="form" style="padding: 15px;">

            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-10">
                <?php $feeQuery = DB::table('tbl_exam_fee')->first(); ?>
            <h4 style="text-align: center;"><b><u>Payment Here Via Bkash</u></b></h4>
            <p style="font-size: 17px;color:red;">Send Registration Fee at <br><strong>01671697082 </strong>(৳<?php echo $feeQuery->amount; ?> included tax.)</p>

            <?php if(Session::get('success') != null) { ?>
            <div class="alert alert-info alert-dismissible text-justify" role="alert">
            <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
            <strong><?php echo Session::get('success') ;  ?></strong>
            <?php Session::put('success',null) ;  ?>
            </div>
            <?php } ?>

            <?php
            if(Session::get('failed') != null) { ?>
            <div class="alert alert-danger alert-dismissible text-justify" role="alert">
            <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
            <strong><?php echo Session::get('failed') ; ?></strong>
            <?php echo Session::put('failed',null) ; ?>
            </div>
            <?php } ?>

            @if (count($errors) > 0)
            @foreach ($errors->all() as $error)      
            <div class="alert alert-danger alert-dismissible text-justify" role="alert">
            <a href="#" class="fa fa-times" data-dismiss="alert" aria-label="close"></a>
            <strong>{{ $error }}</strong>
            </div>
            @endforeach
            @endif
              </div>
              <div class="col-md-1"></div>
            </div>

            {!! Form::open(['url' =>'paymentRegistrationFee','method' => 'post','role' => 'form']) !!}
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="email">Amount <span style="color:red;font-weight: bold;">*</span></label>
                    <input type="number" class="form-control" placeholder="Amount" name="amount">
                  </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="form-group">
                <label for="email">Confirm Amount <span style="color:red;font-weight: bold;">*</span></label>
                <input type="number" class="form-control" placeholder="Confirm Amount" name="confirmAmount">
              </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="form-group">
                <label for="pwd">Bkash Number <span style="color:red;font-weight: bold;">*</span></label>
                <input type="number" class="form-control" placeholder="Bkash Number" name="sentBkashNumber">
              </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <div class="form-group">
                <label for="pwd">Transanction ID <span style="color:red;font-weight: bold;">*</span></label>
                <input type="text" class="form-control" placeholder="Transanction ID" name="txrid">
              </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              
              
              
              <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
              <input type="hidden" name="random_number_encode" value="<?php echo $random_number_encode; ?>">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <div class="col-md-1"></div>
              </div>
              <center><a href="{{ URL::to('/') }}">Back to Home</a></center>

            {!! Form::close() !!}
          </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5" style="background-color: #fff;margin-top: 35px;border-radius: 10px;">
        <div style="padding: 20px;margin-top: 50px;">
          <ol style="text-align: justify;">
          <li> *২৪৭# ডায়াল করে বিকাশ মোবাইল মেন্যুতে যান</li>
          <li>  “সেন্ড মানি” সিলেক্ট করুন </li>
          <li> আপনি যে বিকাশ একাউন্টে টাকা পাঠাতে চান সেই একাউন্ট নাম্বারটি লিখুন (০১৬৭১৬৯৭০৮২)</li>
          <li> আপনি যে পরিমাণ টাকা পাঠাতে চান সেই পরিমাণ টি লিখুন </li>
          <li> লেনদেনের একটি রেফারেন্স/তথ্যসূত্র দিন (একটি শব্দের বেশি ব্যবহার করবেন না, স্পেস এবং বিশেষ অক্ষর এর ব্যবহার এড়িয়ে চলুন)</li>
          <li> আপনার বিকাশ মোবাইল মেন্যু পিনটি দিয়ে লেনদেনটি সম্পন্ন করুন</li>
          <li> আপনি এবং প্রাপক দুজনই বিকাশ থেকে কনফার্মেশন মেসেজ পাবেন।</li><br>
          <strong>অ্যাপ দিয়ে 'সেন্ড মানি' সুবিধাটি উপভোগ করতে পারবেন একদম ফ্রি!</strong>
        </ol>
        </div>
      </div>
    </div>
</div>

</body>
</html>
