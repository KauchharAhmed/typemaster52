@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
			<h3 class="heading_b uk-margin-bottom">MANAGE PARAGRAPH</h3>
            <div class="md-card uk-margin-medium-bottom">
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
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
								                <th>#SL No</th>
                                <th>Paragraph Title</th>
                                <th>Paragraph</th>
                                <th>Times (Minutes:Seconds)</th>
								                <th>Words</th>
                                <th>Active/Deactive</th>
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
                                <td><?php echo $value->paragraph_title; ?></td>
                                <td><?php echo substr($value->paragraph,0,50); ?></td>
                                <td><?php echo $value->how_times; ?></td>
								                <td><?php echo $value->word; ?></td>
                                <?php if ($value->status == '1') { ?>
                                <td><a class="md-btn md-btn-warning md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('deactiveParagraph/'.$value->id)}}">DEACTIVE</a></td>
                               <?php }else{ ?>
                                <td><a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('activeParagraph/'.$value->id)}}">ACTIVE</a></td>
                                <?php } ?>
								                <td><a class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('editParagraph/'.$value->id)}}">EDIT</a></td>
								                <td><a onclick="return confirm('Are you Sure to Delete it ?')" class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light" href="#">DELETE</a></td>
                              </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->
        </div>
    </div>
@endsection

@section('js')
<script>
    UIkit.notify({
        message : 'Username & password does not match. Try again.',
        status  : 'danger',
        timeout : 5000,
        pos     : 'bottom-center'
    });
    return false;
</script>
@endsection