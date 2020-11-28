@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">EDIT STEP</h3>

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
                    {!! Form::open(['url' => 'updateStepInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <b><label for="fullname">Paragraph</label><b>
                                    <input type="text" name="paragraph_id" value="<?php echo $value->paragraph_title ; ?>" class="md-input" disabled/>
                                </div><br>
                                <div class="parsley-row">
                                    <b><label for="fullname">Step Name<span class="req">*</span></label></b>
                                    <input type="text" name="stepName" value="<?php echo $value->step_name ; ?>" class="md-input" required />
                                </div>
                                <div class="parsley-row">
                                    <b><label for="fullname">Session Amount<span class="req">*</span></label></b>
                                    <input type="text" name="amount" value="<?php echo $value->amount ; ?>" class="md-input" required />
                                </div>
                                
                            </div>

                            <input type="hidden" name="primary_id" value="<?php echo $value->id; ?>" required>
                            
                        </div><br>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary">UPDATE</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection