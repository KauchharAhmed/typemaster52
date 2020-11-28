@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">My Profile</h3>

            <div class="md-card">
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
                  <div class="user_heading user_heading_bg" style="background-image: url('public/assets/img/gallery/Image10.jpg');background-size:cover;">
                    <div class="bg_overlay">
                        <div class="user_heading_menu hidden-print">
                            <div class="uk-display-inline-block" data-uk-dropdown="{pos:'left-top'}">
                                <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav">
                                        <li><a href="#" id="updateProfile">Update Profile</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                        <div class="user_heading_avatar">
                            <div class="thumbnail">
                                <img src="{{ URL::to('public/images/user') }}/{{ Session::get('photo') }}" alt="Admin"/>
                            </div>
                        </div>
                        <?php 
                          $adminQuery = DB::table('admin')->where('id',Session::get('admin_id'))->first();
                         ?>
                        <div class="user_heading_content">
                            <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate"><?php echo $adminQuery->name; ?></span><span class="sub-heading">Admin</span></h2>
                            <ul class="user_stats">
                                <li>
                                    <h4 class="heading_a">E-mail <span class="sub-heading"><?php echo $adminQuery->email; ?></span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">Mobile <span class="sub-heading"><?php echo $adminQuery->mobile; ?></span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">Address <span class="sub-heading"><?php echo $adminQuery->address; ?></span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="md-card" id="updateProfileForm" style="display:none;">
            <h3 class="heading_b uk-margin-bottom" style="margin-left:20px;padding-top:10px;">Update Profile</h3>
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

              <?php 
                $profile = DB::table('admin')->where('id',Session::get('admin_id'))->first();
               ?>
                <div class="md-card-content large-padding">
                    {!! Form::open(['url' => 'updateProfileInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' , 'enctype' => 'multipart/form-data' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                          <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label>Name<span class="req">*</span></label>
                                <input type="text" name="name" required class="md-input" value="<?php echo $profile->name; ?>" />
                            </div>

                            <div class="uk-form-row">
                                <label>E-mail Address<span class="req">*</span></label>
                                <input type="text" name="email" required class="md-input" value="<?php echo $profile->email; ?>" />
                            </div>

                            <div class="uk-form-row">
                                <label>Mobile<span class="req">*</span></label>
                                <input type="text" name="mobile" required class="md-input" value="<?php echo $profile->mobile; ?>" />
                            </div>

                            <div class="uk-form-row">
                                <label>Address<span class="req">*</span></label>
                                <input type="text" name="address" required class="md-input" value="<?php echo $profile->address; ?>" />
                            </div>

                            <label for="">Picture</label>
                            <div class="uk-form-row">
                                <input class="md-input" type="file" id="register_email" name="image" /><br>
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo Session::get('admin_id'); ?>">
                            <input type="hidden" name="current_image" value="<?php echo $profile->image; ?>">

                          </div>
                            
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
$('#updateProfile').click(function(e){
  e.preventDefault();

  $('#updateProfileForm').removeAttr('style');

});
</script>
@endsection