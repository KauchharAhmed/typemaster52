@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
            <h3 class="heading_b uk-margin-bottom">SESSION WISE EXAM REPORT</h3>
            
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

            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#Sl</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Exam Session</th>
                                <th>Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1 ;
                                foreach ($query as $value) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                    <td><?php echo $value->session_id; ?></td>
                                    <td><b><?php echo number_format($value->score,2); ?>%</b></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->
        </div>
    </div>
@endsection