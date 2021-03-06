@extends('admin.masterEntrerpreneur')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
			<h3 class="heading_b uk-margin-bottom">CHOOSE SESSION</h3>

            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
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
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
              					<th>#SL No</th>
              					<th>Group Name</th>
                                <th>Amount</th>
              					<th>Start Exam</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$i = 1 ;
                        		foreach ($result as $value) { ?>
            							<tr>
            								<td><?php echo $i++; ?></td>
            								<td><?php echo $value->step_name; ?></td>
                            <td><?php echo $value->amount; ?></td>
            								<td><a class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('chooseSessionInfo/'.$value->id)}}">Start Exam</a></td>
            							</tr>
							           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->
        </div>
    </div>
@endsection