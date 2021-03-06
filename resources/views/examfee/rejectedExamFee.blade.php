@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
			<h3 class="heading_b uk-margin-bottom">REJECTED EXAM FEE TRANSACTION</h3>
            <div class="md-card uk-margin-medium-bottom">
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
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
              								<th>#SL No</th>
                              <th>Name</th>
                              <th>Username(E-mail Address)</th>
                              <th>Bkash Number</th>
                              <th>Amount</th>
                              <th>Transaction ID</th>
              								<th>Approve</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$i = 1 ;
                        		foreach ($result as $value) { ?>
              							<tr>
              								<td><?php echo $i++; ?></td>
                              <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                              <td><?php echo $value->email; ?></td>
                              <td><?php echo $value->bkash_number; ?></td>
                              <td><?php echo $value->amount; ?></td>
                              <td><?php echo $value->transanction_id ; ?></td>
              								<td><a class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('approveExamFee/'.$value->id)}}">Approve</a></td>
              							</tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end- database-->
        </div>
    </div>
@endsection