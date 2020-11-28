@extends('admin.masterEntrerpreneur')
@section('content')
<div id="page_content">
        <div id="page_content_inner">
            <?php
            $session_Query = DB::table('admin')->where('id',Session::get('admin_id'))->first();
            $session_id = $session_Query->step_id;

            $amountQuery = DB::table('tbl_step')->where('id',$session_id)->first();

            ?>

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

            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-3-6">
                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:17px;font-weight:bold;">Pay to attend in exam first via Bkash</h3>
                        </div>
                        <div class="md-card-content" style="background:#efffd8;font-size:18px;font-weight:bold;border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;text-align:justify;">
                            <center><p class="paragraph">Send at: 01671697082 (<?php echo '৳'.$amountQuery->amount; ?> included tax)</p></center>
                            
                            {!! Form::open(['url' =>'paymentByBkash','method' => 'post','role' => 'form']) !!}

                            <input type="hidden" name="paragraph_id" value="{{ $paragraph_id }}">
                            <input type="hidden" name="session_id" value="{{ $session_id }}">
                            <input type="hidden" name="session_amount" value="{{ $amountQuery->amount }}">
                            
                            
                            <table height="200px;" align="center">
                                <tr>
                                    <td style="font-size:14px !important;">Amount</td>
                                    <td><input type="number" style="padding: 5px;" width="100" name="amount"></td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px !important;">Bkash Number</td>
                                    <td><input type="number" style="padding: 5px;" name="bkash_number"></td>
                                </tr>
                                <tr>
                                    <td style="font-size:14px !important;">Transanction ID</td>
                                    <td><input type="text" style="padding: 5px;" name="txrid"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" class="md-btn md-btn-primary md-btn" id="formSubmit" value="Submit"></td>
                                </tr>
                            </table>

                            {!! Form::close() !!}

                        </div>

                    </div>

                </div>
                <div class="uk-width-2-4">
                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:17px;font-weight:bold;">সেন্ড মানি করতে নিচের ধাপগুলো অনুসরণ করুন-</h3>
                        </div>
                        <div class="md-card-content" style="background:#efffd8;font-size:18px;font-weight:bold;border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;text-align:justify;">
                            <p class="paragraph">
                                <!-- <ol>
                                    <li> Go to your bKash Mobile Menu by dialing *247#</li>
                                    <li> Choose “Send Money.</li>
                                    <li> Enter the bKash Account Number you want to send money to.</li>
                                    <li> Enter the amount you want to send.</li>
                                    <li> Enter a reference about the transaction. (Do not use more than one word, avoid space or special characters).</li>
                                    <li> Now enter your bKash Mobile Menu PIN to confirm the transaction.</li>
                                    <li> Done! You and the Receiver both will receive a confirmation message from bKash..</li>
                                    <li><strong>You can 'Send Money' for free with bKash App! </strong></li>
                                </ol> -->
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
                            </p>
                            
                            

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection