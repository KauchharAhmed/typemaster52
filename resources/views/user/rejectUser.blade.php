@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
      <h3 class="heading_b uk-margin-bottom">REJECT USER</h3>
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
                              <th>Mobile</th>
                              <th>Bkash Number</th>
                              <th>Amount</th>
                              <th>Transaction ID</th>
                              <th>Change Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $i = 1 ;
                            foreach ($users as $user) { ?>
                            <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $user->first_name.' '.$user->last_name; ?></td>
                              <td><?php echo $user->mobile; ?></td>
                              <td><?php echo $user->bkash_number; ?></td>
                              <td><?php echo $user->amount; ?></td>
                              <td><?php echo $user->transaction_id; ?></td>
                              <td><a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('approvedUserChangeStatus/'.$user->id)}}">Change Status</a></td>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end- database-->
        </div>
    </div>
@endsection