@extends('admin.masterEntrerpreneur')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <div style="display: none;" class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Visitors (last 7d)</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Sale</span>
                            <h2 class="uk-margin-remove">$<span class="countUpMe">0<noscript>142384</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Orders Completed</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>64</noscript></span>%</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Visitors (live)</span>
                            <h2 class="uk-margin-remove" id="peity_live_text">46</h2>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- user all result -->
            <center><h3 class="heading_b uk-margin-bottom"><b>SMART TYPING RESULT</h3></b></center>
            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th style="color:green;"><b>Rank</b></th>
                                <th>Name</th>
                                <th>Exam Session</th>
                                <th>Accuracy (%)</th>
                                <th>WPM(Word Per Minutes)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $j = 1;
                                foreach ($query as $value) { 
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td style="color:green;font-weight:bolder;"><?php echo $j++;?></td>
                                <td><?php echo $value->first_name.' '.$value->last_name; ?></td>
                                <td><?php echo "$value->step_name"; ?></td>
                                <td><?php echo number_format($value->score,2); ?>%</td>
                                <td>
                                    <?php 
                                        $explode = explode(":", $value->exam_time);
                                        if($explode[0] != '0'){
                                            $wpm = $value->typed_word/$explode[0];
                                            echo number_format($wpm)." WPM";
                                        }else{
                                            echo "0 WPM";
                                        }
                                        // echo $value->typed_word;
                                        // echo $value->exam_time;
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->
            
        </div>
    </div>
@endsection