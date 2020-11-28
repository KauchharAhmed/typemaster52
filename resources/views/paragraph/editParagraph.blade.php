@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">EDIT PARAGRAPH</h3>

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
                    {!! Form::open(['url' => 'updateParagraphInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation' ]) !!}
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">

                              <div class="uk-form-row">
                                  <label for="fullname">Paragraph Title<span class="req">*</span></label>
                                  <input type="text" name="paragraphTitle" required class="md-input" value="<?php echo $value->paragraph_title; ?>" />
                              </div>

                              <div class="uk-form-row">
                                  <label for="fullname">Write Paragraph<span class="req">*</span></label>
                                  <textarea type="text" name="paragraph" cols="30" rows="4" class="md-input"><?php echo $value->paragraph; ?></textarea> 
                              </div>

                              <div class="uk-form-row">
                                  <label for="fullname">Time ( Example: 05:15 )<span class="req">*</span></label>
                                  <input type="text" name="how_times" required class="md-input" value="<?php echo $value->how_times; ?>" />
                              </div>

                              

                              <input type="hidden" name="primary_id" value="<?php echo $value->id; ?>">

                            </div>
                            
                        </div>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <button type="submit" class="md-btn md-btn-primary">update</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection