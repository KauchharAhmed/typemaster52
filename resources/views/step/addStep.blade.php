@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">ADD SESSION</h3>

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
                <div class="md-card-content large-padding">
                    {!! Form::open(['url' => 'addStepInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>

                          <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                              <select name="paragraph_id" class="md-input" required="" data-md-selectize>             
                                <option value="">Select Paragraph <span class="req">*</span></option>
                                <?php foreach ($result as $value) { ?>
                                  <option value="<?php echo $value->id; ?>"><?php echo $value->paragraph_title; ?></option>
                                <?php } ?>
                              </select>
                            </div>

                            <div class="uk-form-row">
                                <label for="fullname">Session Name<span class="req">*</span></label>
                                <input type="text" name="stepName" required class="md-input" /> 
                            </div>

                            <div class="uk-form-row">
                                <label for="fullname">Session Amount<span class="req">*</span></label>
                                <input type="text" name="amount" required class="md-input" /> 
                            </div>
                            <div class="uk-form-row">
                                <label for="fullname">Confirm Amount<span class="req">*</span></label>
                                <input type="text" name="confirm_amount" required class="md-input" /> 
                            </div>
                            
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