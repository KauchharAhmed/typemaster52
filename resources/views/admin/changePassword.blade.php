@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">Change Password</h3>

            <div class="md-card">
                <div class="md-card-content large-padding">
                    {!! Form::open(['url' => 'adminChangePasswordInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>

              <?php if(Session::get('success') != null) { ?>
              <div class="alert alert-info alert-dismissible" role="alert">
              <strong><?php echo Session::get('success') ;  ?></strong>
              <?php Session::put('success',null) ;  ?>
              </div>
              <?php } ?>

              <?php
              if(Session::get('failed') != null) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
              <strong><?php echo Session::get('failed') ; ?></strong>
              <?php echo Session::put('failed',null) ; ?>
              </div>
              <?php } ?>

              @if (count($errors) > 0)
              @foreach ($errors->all() as $error)      
              <div class="alert alert-danger alert-dismissible" role="alert">
              <strong>{{ $error }}</strong>
              </div>
              @endforeach
              @endif

                          <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <label for="fullname">Old Password<span class="req">*</span></label>
                                <input type="password" name="old_password" required class="md-input" />
                            </div>

                            <div class="uk-form-row">
                                <label for="fullname">New Password<span class="req">*</span></label>
                                <input type="password" name="new_password" required class="md-input" />
                            </div>

                            <div class="uk-form-row">
                                <label for="fullname">Confirm Password<span class="req">*</span></label>
                                <input type="password" name="confirm_password" required class="md-input" />
                            </div>
                            
                            <input type="hidden" name="id" value="<?php echo Session::get('admin_id'); ?>">

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