@extends('admin.masterAdmin')
@section('content')

<div id="page_content">
        <div id="page_content_inner">
            <!-- large chart -->
			<h3 class="heading_b uk-margin-bottom">ALL EXAM SESSIONS</h3>
       
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
              								<th>#SL No</th>
                              <th>Session</th>
                              <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$i = 1 ;
                        		foreach ($result as $value) { ?>
            							<tr>
            								<td><?php echo $i++; ?></td>
                            <td><?php echo $value->step_name; ?></td>
                            <td><a class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" href="{{URL::to('sessionWiseExamReport/'.$value->id)}}">Details</a></td>
							           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- end database -->


        </div>
    </div>
@endsection