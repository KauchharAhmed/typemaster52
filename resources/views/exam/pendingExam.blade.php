@extends('admin.masterEntrerpreneur')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:17px;font-weight:bold;">The transaction is Under Review</h3>
                        </div>
                        <div class="md-card-content" style="background:#efffd8;font-size:20px;font-weight:bold;border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;text-align:justify;">
                            <p class="paragraph">
                                We are reviewing your transaction, please be patient; it will confirm by SMS once our system is verified. In this case it takes time 48 hours.
                            </p>
                            <span style="font-weight: bolder;font-size: 35px;"><u>Your Exam Starts After</u></span><p style="color:red;font-family: tahoma;font-size: 50px;text-align: center;" id="demo"></p>
                            <?php 
                                $paymentDate = date ("M d Y H:i:s", strtotime($scanPaymentStatus->created_date_time));
                                $countdown_date = date('M d Y H:i:s', strtotime("+48 hours", strtotime($paymentDate)));
                                //echo $countdown_date;
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('js')
<script>

var paymentDate = '<?php echo $scanPaymentStatus->created_date_time; ?>';
var countdown_date = '<?php echo $countdown_date; ?>'
// Set the date we're counting down to
var countDownDate = new Date(countdown_date).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + " Day " + hours + " Hours "
  + minutes + " Minutes " + seconds + " Seconds ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection