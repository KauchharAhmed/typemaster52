@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">EDIT GROUP</h3>

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
                    {!! Form::open(['url' => 'updateGroupInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <div class="parsley-row">
                                    <label for="fullname">Group Name<span class="req">*</span></label>
                                    <input type="text" name="groupName" required class="md-input" value="<?php echo $value->group_name; ?>" />
                                </div>
                            </div>
                            <input type="hidden" name="primary_id" value="<?php echo $value->id; ?>">
                            
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary">Update</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection