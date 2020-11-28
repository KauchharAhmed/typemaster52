@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
			<h3 class="heading_b uk-margin-bottom">MANAGE SLIDER</h3>
            
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

            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
              								<th>#SL No</th>
              								<th>Slider Image</th>
              								<th>EDIT</th>
              								<th>DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$i = 1 ;
                        		foreach ($result as $value) { ?>
            							<tr>
            								<td><?php echo $i++; ?></td>
            								<td><img width="100" height="50" src="{{ URL::to('public/images/slider') }}/{{ $value->slider_image }}" alt=""></td>
            								<td><a class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('editSlider/'.$value->id)}}">EDIT</a></td>
            								<td><a onclick="return confirm('Are you Sure to Delete it ?')" class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('deleteSlider/'.$value->id)}}">DELETE</a></td>
            							</tr>
							           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->
        </div>
    </div>
@endsection