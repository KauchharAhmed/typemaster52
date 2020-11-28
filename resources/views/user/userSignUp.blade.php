<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registration Form</title>
  </head>
  <body style="font-family: new-roman">

    <div class="container p-md-3" style="background: #44b1ff;">
      
      <div class="row">
        <div class="col-md-12">

            <div class="main_content admission_form">
                <h2 class="text-center">Registration Form</h2>
                <div class="admission_heading_form">
                  <h4 class="text-center text-danger text-uppercase">Input Your Valid Information</h4>
                  <p class="text-center" style="font-size: 18px;">[ Star <span class="text-danger">*</span> marked field is required. ] </p>
                  <h4 class="text-center text-danger text-uppercase p-md-3">Basic Info</h4>
                  <hr>
                </div>

                <?php if(Session::get('succes') != null) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong><?php echo Session::get('succes') ;  ?></strong>
                  <?php Session::put('succes',null) ;  ?>
                </div>
                <?php } ?>
                <!--    End session message-->

                <?php if(Session::get('failed') != null) { ?>  
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><?php echo Session::get('failed') ; ?></strong>
                        <?php echo Session::put('failed',null) ; ?>
                    </div>
                <?php } ?> <!--End  failed session message-->

                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)   
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ $error }}</strong>
                </div>
                @endforeach
                @endif 

                {!! Form::open(['url' =>'userSignupInfo','method' => 'post','files' => true]) !!}
                  
                <div class="row">
                  
                  <div class="col-md-6">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Chosse Session <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <select name="step" class="form-control form-control-sm">
                          <option value="">Select Session</option>
                          <?php foreach ($step as $steps) { ?>
                          <option value="<?php echo $steps->id; ?>"><?php echo $steps->step_name; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Student Name (English)  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="student_name_english" placeholder="Name English" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Student Name (Bangla) </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="student_name_bangla" placeholder="Name Bangla">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date Of Birth  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-4">
                            <select class="form-control form-control-sm" name="st_day" required="">
                                <option value="" selected="">Days</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="18">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                          </div>

                          <div class="col-md-4">
                            <select class="form-control form-control-sm" id="selectClass" name="st_month" required="">
                                <option value="" selected="">Month</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                          </div>

                          <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" name="st_year" placeholder="Years" required="">
                          </div>
                          
                        </div>
                      </div>

                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Birth Registration No.  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="birth_registration_no" placeholder="13 or- 17 number" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Birth Certificate Photo</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="birth_certificate_photo" id="birth_certificate_photo">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Select Blood Group</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="student_blood_group" >
                                <option value="" selected="">Select Group</option>
                                <option value="1">A Positive (A+)</option>
                                <option value="2">A Negative (A-)</option>
                                <option value="3">B Positive (B+)</option>
                                <option value="4">B Negative (B-)</option>
                                <option value="5">O Positive (O+)</option>
                                <option value="6">O Negative (O-)</option>
                                <option value="7">AB Positive (AB+)</option>
                                <option value="8">AB Negative (AB-)</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">National ID Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="student_nid_number" placeholder="13 or- 17 number" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nationality </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="nationality" value="Bangladeshi" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email(User Name) <span style="color: red;font-size: 18px;font-weight: bold">*</span> </label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control form-control-sm" name="student_email" placeholder="E-mail" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Password<span style="color: red;font-size: 18px;font-weight: bold">*</span> </label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control form-control-sm" name="password" placeholder="Password" >
                      </div>
                    </div>

                   </div> <!--End Col-md-6 -->
                   <div class="col-md-6">

                     <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Gender </label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="gender" >
                                <option value="" selected="">Select Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Others</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Religion </label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="religion"> 
                                <option value="" selected="">Select Religion</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Christianity</option>
                                <option value="4">Others</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mobile Number </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="student_mobile" placeholder="Mobile">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Occupation</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="occupation" placeholder="Occupation">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Student Photo </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="student_photo" id="student_photo">
                      </div>
                    </div>

                   </div><!--End Col-md-6 -->

                  <div class="col-md-2">
                    <label class="col-form-label">Exam Name</label>
                    <input type="text" class="form-control form-control-sm" name="st_exam_name_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="st_exam_name_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Department</label>
                    <input type="text" class="form-control form-control-sm" name="st_department_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="st_department_2" >
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Institute Name</label>
                    <textarea class="form-control" rows="1" name="st_institute_1"></textarea>
                    <br>
                    <textarea class="form-control" rows="1" name="st_institute_2"></textarea>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Year</label>
                    <input type="text" class="form-control form-control-sm" name="st_year_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="st_year_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Board / University</label>
                    <input type="text" class="form-control form-control-sm" name="st_board_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="st_board_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Grade</label>
                    <input type="text" class="form-control form-control-sm" name="st_grad_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="st_grad_2">
                  </div>

                </div><!-- end row -->
                  
                <h4 class="text-center text-danger text-uppercase p-md-3">FATHER'S INFORMATION</h4>
                <hr>
                <div class="row">
                  
                  <div class="col-md-6">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Father Name (English)  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_name_english" placeholder="Name English" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Father Name (Bangla) </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_name_bangla" placeholder="Name Bangla">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date Of Birth  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-4">
                            <select class="form-control form-control-sm" name="f_day" required="">
                                <option value="" selected="">Days</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="18">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                          </div>

                          <div class="col-md-4">
                            <select class="form-control form-control-sm" id="selectClass" name="f_month" required="">
                                <option value="" selected="">Month</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                          </div>

                          <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" name="f_year" placeholder="Years" required="">
                          </div>
                          
                        </div>
                      </div>

                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Select Blood Group</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="father_blood_group" >
                                <option value="" selected="">Select Group</option>
                                <option value="1">A Positive (A+)</option>
                                <option value="2">A Negative (A-)</option>
                                <option value="3">B Positive (B+)</option>
                                <option value="4">B Negative (B-)</option>
                                <option value="5">O Positive (O+)</option>
                                <option value="6">O Negative (O-)</option>
                                <option value="7">AB Positive (AB+)</option>
                                <option value="8">AB Negative (AB-)</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">National ID Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_nid_number" placeholder="13 or- 17 number" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nationality</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_nationality" placeholder="Nationality" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NID Scan Image </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="father_nid_scan_photo" id="father_nid_scan_photo">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_email" placeholder="E-mail">
                      </div>
                    </div>

                   </div> <!--End Col-md-6 -->
                   <div class="col-md-6">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Religion </label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="father_religion" > 
                                <option value="" selected="">Select Religion</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Christianity</option>
                                <option value="4">Others</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mobile Number </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_mobile" placeholder="Mobile" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Occupation</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="father_occupation" placeholder="Occupation">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" >Father Photo </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="father_image" id="father_image" >
                      </div>
                    </div>

                   </div><!--End Col-md-6 -->

                  <div class="col-md-2">
                    <label class="col-form-label">Exam Name</label>
                    <input type="text" class="form-control form-control-sm" name="fa_exam_name_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="fa_exam_name_2" >
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Department</label>
                    <input type="text" class="form-control form-control-sm" name="fa_department_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="fa_department_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Institute Name</label>
                    <textarea class="form-control" rows="1" name="fa_institute_1"></textarea>
                    <br>
                    <textarea class="form-control" rows="1" name="fa_institute_2"></textarea>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Year</label>
                    <input type="text" class="form-control form-control-sm" name="fa_year_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="fa_year_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Board / University</label>
                    <input type="text" class="form-control form-control-sm" name="fa_board_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="fa_board_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Grade</label>
                    <input type="text" class="form-control form-control-sm" name="fa_grad_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="fa_grad_2">
                  </div>

                </div><!-- end row -->

                <h4 class="text-center text-danger text-uppercase p-md-3">MOTHER'S INFORMATION</h4>
                <hr>
                <div class="row">
                  
                  <div class="col-md-6">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mother Name (English)  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_name_english" placeholder="Name English" required="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mother Name (Bangla) </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_name_bangla" placeholder="Name Bangla">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Date Of Birth  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-4">
                            <select class="form-control form-control-sm" name="m_day" required="">
                                <option value="" selected="">Days</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="18">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                          </div>

                          <div class="col-md-4">
                            <select class="form-control form-control-sm" name="m_month" required="">
                                <option value="" selected="">Month</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                          </div>

                          <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" name="m_year" placeholder="Years" required="">
                          </div>
                          
                        </div>
                      </div>

                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Select Blood Group</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="mother_blood_group">
                                <option value="" selected="">Select Group</option>
                                <option value="1">A Positive (A+)</option>
                                <option value="2">A Negative (A-)</option>
                                <option value="3">B Positive (B+)</option>
                                <option value="4">B Negative (B-)</option>
                                <option value="5">O Positive (O+)</option>
                                <option value="6">O Negative (O-)</option>
                                <option value="7">AB Positive (AB+)</option>
                                <option value="8">AB Negative (AB-)</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">National ID Number</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_nid_number" placeholder="13 or- 17 number">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">NID Scan Image</label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="mother_nid_scan_photo" id="mother_nid_scan_photo">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Nationality </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_nationality" placeholder="Nationality">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control form-control-sm" name="mother_email" placeholder="E-mail">
                      </div>
                    </div>

                   </div> <!--End Col-md-6 -->
                   <div class="col-md-6">

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Religion</label>
                      <div class="col-sm-8">
                        <div class="row">
                          <div class="col-md-8">
                            <select class="form-control form-control-sm" name="mother_religion" > 
                                <option value="" selected="">Select Religion</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Christianity</option>
                                <option value="4">Others</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Mobile Number </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_mobile" placeholder="11 Number">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Occupation</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control form-control-sm" name="mother_occupation" placeholder="Occupation">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label" >Mother Photo </label>
                      <div class="col-sm-8">
                        <input type="file" class="form-control-file" name="mother_photo" id="mother_photo">
                      </div>
                    </div>

                   </div><!--End Col-md-6 -->

                  <div class="col-md-2">
                    <label class="col-form-label">Exam Name</label>
                    <input type="text" class="form-control form-control-sm" name="mo_exam_name_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="mo_exam_name_2" >
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Department</label>
                    <input type="text" class="form-control form-control-sm" name="mo_department_1">
                    <br>
                    <input type="text" class="form-control form-control-sm" name="mo_department_2">
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Institute Name</label>
                    <textarea class="form-control" rows="1" name="mo_institute_1"></textarea>
                    <br>
                    <textarea class="form-control" rows="1" name="mo_institute_2"></textarea>
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Year</label>
                    <input type="text" class="form-control form-control-sm" name="mo_year_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="mo_year_2" >
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Board / University</label>
                    <input type="text" class="form-control form-control-sm" name="mo_board_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="mo_board_2" >
                  </div>

                  <div class="col-md-2">
                    <label class="col-form-label">Grade</label>
                    <input type="text" class="form-control form-control-sm" name="mo_grade_1" >
                    <br>
                    <input type="text" class="form-control form-control-sm" name="mo_grade_2" >
                  </div>

                </div><!-- end row -->

                <h4 class="text-center text-danger text-uppercase p-md-3">CONTRACT INFORMATION</h4>

                <div class="row">
                    <div class="col-md-6">
                      <h4><b>Present Address</b></h4>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Division  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="division_id" id="division_id" required=""> 
                                <option value="" selected="">Select</option>
                                <?php foreach ($division_result as $division_value) { ?>
                                  <option value="<?php echo $division_value->id; ?>"><?php echo $division_value->division_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="district_id" id="district_id" required=""> 
                                
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Thana  <span style="color: red;font-size: 18px;font-weight: bold">*</span></label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="thana_id" id="thana_id" required=""> 
                                
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Post </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_post">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Postal Code </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_post_code" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Village </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_village" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ward Number</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_ward_number" >
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Road Number </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_road_number">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">House Number </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="pre_house_number">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <h4><b>Permanent Address</b> <input type="checkbox" name="address_check" value="same" ></h4>
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Division </label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="per_division_id" id="per_division_id" > 
                                <option value="" selected="">Select</option>
                                <?php foreach ($division_result as $division_value) { ?>
                                  <option value="<?php echo $division_value->id; ?>"><?php echo $division_value->division_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">District </label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="per_district_id" id="per_district_id" > 
                                
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Thana </label>
                        <div class="col-sm-8">
                          <select class="form-control form-control-sm" name="per_thana_id" id="per_thana_id" > 
                                
                            </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Post </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_post" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Postal Code </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_post_code">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Village </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_village">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Ward Number </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_ward" >
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Road Number </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_road_number" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">House Number </label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control form-control-sm" name="per_house_number" >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <button type="submit" class="btn btn-sm btn-primary m-r-5">SUBMIT</button>
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5">
                      <div class="form-group row">
                          &nbsp;&nbsp;&nbsp;<span style="color:white;">Already have an account!</span>&nbsp;&nbsp;&nbsp;
                          <br><a style="color:white;" href="{{ URL::to('signin') }}" class="btn btn-sm btn-primary m-r-5">Sign In</a>
                      </div>
                    </div>

                  </div>

                {!! Form::close() !!}
            </div>
          
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      $("#division_id").change(function(e){
        e.preventDefault();

        var division_id = $("#division_id").val();

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          'url':"{{ url('/getDistrictByDivision') }}",
          'type':'post',
          'dataType':'text',
          data:{  
          division_id:division_id
          },
          success:function(data)
          {
            $("#district_id").html(data);
          }
        });
      });

      $("#district_id").change(function(e){
        e.preventDefault();

        var district_id = $("#district_id").val();

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          'url':"{{ url('/getThanaByDistrict') }}",
          'type':'post',
          'dataType':'text',
          data:{  
          district_id:district_id
          },
          success:function(data)
          {
            $("#thana_id").html(data);
          }
        });
      });

      $("#per_division_id").change(function(e){
        e.preventDefault();

        var per_division_id = $("#per_division_id").val();

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          'url':"{{ url('/getPerDistrictByDivision') }}",
          'type':'post',
          'dataType':'text',
          data:{  
          per_division_id:per_division_id
          },
          success:function(data)
          {
            $("#per_district_id").html(data);
          }
        });
      });

      $("#per_district_id").change(function(e){
        e.preventDefault();

        var per_district_id = $("#per_district_id").val();

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          'url':"{{ url('/getPerThanaByDistrict') }}",
          'type':'post',
          'dataType':'text',
          data:{  
          per_district_id:per_district_id
          },
          success:function(data)
          {
            $("#per_thana_id").html(data);
          }
        });
      });


    </script>


  </body>
</html>