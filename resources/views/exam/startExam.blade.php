@extends('admin.masterEntrerpreneur')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-2">
                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:19px;font-weight:bold;">Type the text carefully in time 
                            </h3>
                            <h3 class="md-card-toolbar-heading-text" id="count" style="color:#fff;font-size:22px;font-weight:bold;margin-left: 300px;">{{ $time }}</h3>
                            <span style="float:right !important;margin-top:7px;"><button id="startClock" class="md-btn md-btn-danger">Start Exam</button></span>
                        </div>
                        <div class="md-card-content" style="background:#efffd8;font-size:27px;font-weight:bold;border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;text-align:justify;">
                            <p class="paragraph">{{ $result }}</p>
                            
                            <input type="hidden" name="paragraph_id" value="{{ $paragraph_id }}">
                            <input type="hidden" name="session_id" value="{{ $session_id }}">
                            
                            <textarea type="text" name="paragraph" style="background:#516888;" placeholder="Type the above text here" cols="30" rows="8" class="md-input inputTxt" disabled></textarea>

                            <!-- <center><input type="submit" class="md-btn md-btn-primary md-btn-large" id="formSubmit" value="SUBMIT"></center> -->

                        </div>
                    </div>
                </div>
                <!-- <div class="uk-width-2-6">

                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:17px;font-weight:bold;">Exam Time Remaing</h3>
                        </div>
                        <div class="md-card-content" style="border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;">
                            <h3 id="count" style="font-weight:700;">{{ $time }} Sec</h3>
                        </div>
                    </div>
                </div> -->

                <!-- get paragraph id -->
                <input type="hidden" name="paragraph_id" id="paragraph_id" value="<?php echo $paragraphQuery->id; ?>">
                <!-- get user id -->
                <input type="hidden" name="user_id" id="user_id" value="<?php echo Session::get('admin_id'); ?>">
                <!-- get exam time -->
                <input type="hidden" name="exam_time" id="exam_time" value="<?php echo $time; ?>">
                <!-- get exam total word -->
                <input type="hidden" name="word" id="word" value="<?php echo $paragraphQuery->word; ?>">
                <!-- step id --->
                <input type="hidden" name="step_id" id="step_id" value="<?php echo $step_id; ?>">
            </div>

        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function(){

        // Disabling the right click on webpage
        // $(document).bind("contextmenu",function(e){
        // return false;
        // }); 

        // Disabling the copy, paste and cut
        $('.inputTxt').bind('copy paste cut',function(e) {
          e.preventDefault();
          alert('cut,copy & paste options are disabled !!');
        });

        $(".inputTxt").bind("keypress keyup keydown", function (event) {
            var evtType = event.type;
            var eWhich = event.which;
            var echarCode = event.charCode;
            var ekeyCode = event.keyCode;


            if(eWhich == 8 || eWhich == 37 || eWhich == 38 || eWhich == 39 || eWhich == 40){
                alert('You pressed either backspace, left arrow, right arrow, up arrow or down arrow key');
                return false;
            }

            if(eWhich == 17 && eWhich == 17){
                alert('You pressed Ctrl+R together');
                return false;
            }

        });

        $("body").bind("keypress keyup keydown", function (event) {
            var evtType     = event.type;
            var eWhich      = event.which;
            var echarCode   = event.charCode;
            var ekeyCode    = event.keyCode;

            // Disabling the F5 button on webpage
            if(eWhich == 13){
                alert('You pressed Enter');
                return false;
            }

            if(eWhich == 17 && eWhich == 17){
                alert('You pressed Ctrl+R together');
                return false;
            }

        });

    })
</script>

<script>
(function(){
    $("#startClock").click(function(e){
        e.preventDefault();

        $(this).val("STARTED").css('font-weight','bold').addClass('md-btn-danger').removeClass('md-btn-warning');
        //$(this).attr("disabled","disabled");
        $("#startClock").html('Submit');
         $("#startClock").attr("id", "formSubmit");
        $('[name="paragraph"]').removeAttr("disabled");

        //var counter = "<?php //echo $time; ?>";            
                            
        //var counter = 15;
        // setInterval(function(){
        //     counter--;
        //     if (counter >= 0){
        //         $("#count").text(counter+' Sec');
        //     }

        //     if(counter == 0){
        //         exam();
        //     }

        // }, 1000);

        var timer2 = "<?php echo $time; ?>";
        var interval = setInterval(function() {

        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('#count').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;

        //alert(timer2);

        if(timer2 == '0:00'){
            exam();
        }

        }, 1000);

        $('#formSubmit').click(function(e){
            e.preventDefault();

            var step_id      = $("#step_id").val();
            var paragraph_id = $('#paragraph_id').val();
            var user_id      = $('#user_id').val();
            var exam_time    = $('#exam_time').val();
            var word         = $('#word').val();
            var c_time       = $('#count').text();
            var inputTxt     = $('.inputTxt').val();
            var databaseWord = $('.paragraph').text();
            var session_id   = $('[name="session_id"]').val();

            // alert(session_id);
            // return false;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                'url':"{{ url('/manuallySubmitExamForm') }}",
                'type':'post',
                'dataType':'text',
                data:{step_id:step_id,paragraph_id:paragraph_id,user_id:user_id,exam_time:exam_time,word:word,c_time:c_time,inputTxt:inputTxt,databaseWord:databaseWord,session_id:session_id},
                success:function(data)
                {
                    if(data == '2'){
                        alert("Your Exam successfully done. Thank You for participation");
                        location.href='<?php echo url('/'); ?>'+'/examResult';
                    }
                }
            });

        });

        function exam(){

            var step_id      = $("#step_id").val();
            var paragraph_id = $('#paragraph_id').val();
            var user_id      = $('#user_id').val();
            var exam_time    = $('#exam_time').val();
            var word         = $('#word').val();
            var c_time       = $('#count').text();
            var inputTxt     = $('.inputTxt').val();
            var databaseWord = $('.paragraph').text();
            var session_id   = $('[name="session_id"]').val();

            // alert(session_id);
            // return false;

            // alert(inputTxt);
            // return false;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                'url':"{{ url('/forceSubmitExamForm') }}",
                'type':'post',
                'dataType':'text',
                data:{step_id:step_id,paragraph_id:paragraph_id,user_id:user_id,exam_time:exam_time,word:word,c_time:c_time,inputTxt:inputTxt,databaseWord:databaseWord,session_id:session_id},
                success:function(data)
                {
                    if(data == '1'){
                        alert("Your Exam successfully done. Thank You for participation");
                        location.href='<?php echo url('/'); ?>'+'/examResult';
                    }
                }
            });
        }               
        
    });
})();

</script>

@endsection