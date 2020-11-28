@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">ADD SLIDER</h3>

            <div class="md-card">
                
            <div class="md-card">
            <div class="md-card-content">
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

                {!! Form::open(['url' => 'addSliderInfo','method' => 'post' , 'class'=> 'uk-form-stacked' , 'id'=> 'form_validation','files'=> 'true' ]) !!}
                <input type="file" name="sliderImage">
                <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <br><button type="submit" class="md-btn md-btn-primary">Submit</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                
            </div>
          </div>
            </div>
        </div>
    </div>
@endsection