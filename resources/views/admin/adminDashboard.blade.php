@extends('admin.masterAdmin')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
            <?php
                $total_user  = DB::table('admin')->where('type',2)->where('status',1)->count();
                $total_session  = DB::table('tbl_step')->count();
                $total_exam     = DB::table('tbl_exam_result')->count();
                $total_exam_fees = DB::table('tbl_payment')->where('status',1)->sum('amount');
            ?>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Total Users</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_user; ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Total Session</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_session; ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Total Exam Held</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_exam; ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Total Exam Fee</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript><?php echo $total_exam_fees; ?></noscript></span></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- large chart -->
            <div class="uk-grid" style="display: none;">
                <div class="uk-width-1-1">
                    <div class="md-card">
                        <div class="md-card-toolbar">
                            <div class="md-card-toolbar-actions">
                                <i class="md-icon material-icons md-card-fullscreen-activate">&#xE5D0;</i>
                                <i class="md-icon material-icons">&#xE5D5;</i>
                                <div class="md-card-dropdown" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="#">Action 1</a></li>
                                            <li><a href="#">Action 2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h3 class="md-card-toolbar-heading-text">
                                Chart
                            </h3>
                        </div>
                        <div class="md-card-content">
                            <div class="mGraph-wrapper">
                                <div id="mGraph_sale" class="mGraph" data-uk-check-display></div>
                            </div>
                            <div class="md-card-fullscreen-content">
                                <div class="uk-overflow-container">
                                    <table class="uk-table uk-table-no-border uk-text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Best Seller</th>
                                            <th>Total Sale</th>
                                            <th>Change</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>January 2014</td>
                                            <td>Qui consequuntur laudantium architecto.</td>
                                            <td>$3 234 162</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>February 2014</td>
                                            <td>Consequatur unde quis quibusdam eligendi.</td>
                                            <td>$3 771 083</td>
                                            <td class="uk-text-success">+2.5%</td>
                                        </tr>
                                        <tr>
                                            <td>March 2014</td>
                                            <td>Eum corporis saepe.</td>
                                            <td>$2 429 352</td>
                                            <td class="uk-text-danger">-4.6%</td>
                                        </tr>
                                        <tr>
                                            <td>April 2014</td>
                                            <td>Provident quibusdam asperiores nesciunt.</td>
                                            <td>$4 844 169</td>
                                            <td class="uk-text-success">+7%</td>
                                        </tr>
                                        <tr>
                                            <td>May 2014</td>
                                            <td>Unde sed sed.</td>
                                            <td>$5 284 318</td>
                                            <td class="uk-text-success">+3.2%</td>
                                        </tr>
                                        <tr>
                                            <td>June 2014</td>
                                            <td>Odio quaerat minima adipisci ut.</td>
                                            <td>$4 688 183</td>
                                            <td class="uk-text-danger">-6%</td>
                                        </tr>
                                        <tr>
                                            <td>July 2014</td>
                                            <td>Quia odio atque aut.</td>
                                            <td>$4 353 427</td>
                                            <td class="uk-text-success">-5.3%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <p class="uk-margin-large-top uk-margin-small-bottom heading_list uk-text-success">Some Info:</p>
                                <p class="uk-margin-top-remove">Unde aliquam ducimus quibusdam dicta est facere qui perferendis vitae inventore aut est exercitationem voluptas rerum ratione reiciendis sed ducimus illo aut vel enim et alias unde asperiores quia vitae sed qui nobis qui recusandae veniam vitae distinctio dolorem est iure odit quia et maiores vel assumenda facilis iste eos et sed natus sed voluptatem vero culpa ut ullam eveniet commodi perferendis aperiam eveniet sed quo dolor ipsam ipsa officiis ipsa a consequatur rerum minus quas saepe corrupti sit commodi laboriosam eligendi cupiditate est dolores laboriosam necessitatibus et dignissimos ipsum totam numquam nihil nesciunt suscipit eum tempore qui excepturi quis ea fugiat id vel velit enim et vel exercitationem aliquid ut adipisci et officiis praesentium corrupti consequuntur inventore aut aut eligendi repellat animi commodi sed dolorem possimus quo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card uk-margin-medium-bottom">
                <div class="md-card-content">
                    <table id="dt_default" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th style="color:green;"><b>Rank</b></th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Exam Session</th>
                                <th>Total Word</th>
                                <th>Typed Word</th>
                                <th>Typed Word (%)</th>
                                <th>Untyped Word</th>
                                <th>Untyped Word (%)</th>
                                <th>Right Typed Word</th>
                                <th>Accuracy (%)</th>
                                <th>Wrong Typed Word</th>
                                <th>Inaccuracy (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $j = 1;
                                foreach ($query as $value) { 
                                if($value->score >= '80'){
                            ?>
                            <tr style="background-color: green;color:white;">
                                <td><center><?php echo $i++; ?></center></td>
                                <td style="color:white;font-weight:bolder;"><center><?php echo $j++;?></center></td>
                                <td><center><?php echo $value->email; ?></center></td>
                                <td><center><?php echo $value->first_name; ?></center></td>
                                <td><center><?php echo "$value->step_name"; ?></center></td>
                                <td>
                                    <center>
                                    <?php echo $value->word; ?>
                                    </center>
                                </td>
                                <td><center><?php echo $value->typed_word; ?></center></td>
                                <td><center><?php $typedWordPercentage = ($value->typed_word*100)/$value->word;
                                    echo number_format($typedWordPercentage,2); ?>%</center></td>
                                <td><center><?php $untypedWord = $value->word - $value->typed_word;
                                    echo $untypedWord;
                                 ?></center></td>
                                 <td><center><?php $untypedWordPercentage = 100 - $typedWordPercentage;
                                    echo number_format($untypedWordPercentage,2);
                                  ?>%</center></td>
                                <td><center><?php 
                                    $rightWord = $value->typed_word - $value->wrong_word;
                                    echo $rightWord;
                                 ?></center></td>
                                <td><center><?php 
                                    $accuracyPercentage = ($rightWord*100)/$value->word ;
                                    echo number_format($accuracyPercentage,2);
                                ?>%</center></td>
                                <td><center><?php echo $value->wrong_word; ?></center></td>
                                <td><center><?php $inaccuracyPercentage = 100 - $accuracyPercentage;
                                    echo number_format($inaccuracyPercentage,2);
                                ?>%</center></td>
                            </tr>
                            <?php }elseif($value->score >= '50'){ ?>
                            <tr style="background-color: yellow;">
                                <td><center><?php echo $i++; ?></center></td>
                                <td style="color:green;font-weight:bolder;"><center><?php echo $j++;?></center></td>
                                <td><center><?php echo $value->email; ?></center></td>
                                <td><center><?php echo $value->first_name; ?></center></td>
                                <td><center><?php echo "$value->step_name"; ?></center></td>
                                <td>
                                    <center>
                                    <?php echo $value->word; ?>
                                    </center>
                                </td>
                                <td><center><?php echo $value->typed_word; ?></center></td>
                                <td><center><?php $typedWordPercentage = ($value->typed_word*100)/$value->word;
                                    echo number_format($typedWordPercentage,2); ?>%</center></td>
                                <td><center><?php $untypedWord = $value->word - $value->typed_word;
                                    echo $untypedWord;
                                 ?></center></td>
                                 <td><center><?php $untypedWordPercentage = 100 - $typedWordPercentage;
                                    echo number_format($untypedWordPercentage,2);
                                  ?>%</center></td>
                                <td><center><?php 
                                    $rightWord = $value->typed_word - $value->wrong_word;
                                    echo $rightWord;
                                 ?></center></td>
                                <td><center><?php 
                                    $accuracyPercentage = ($rightWord*100)/$value->word ;
                                    echo number_format($accuracyPercentage,2);
                                ?>%</center></td>
                                <td><center><?php echo $value->wrong_word; ?></center></td>
                                <td><center><?php $inaccuracyPercentage = 100 - $accuracyPercentage;
                                    echo number_format($inaccuracyPercentage,2);
                                ?>%</center></td>
                            </tr>
                            <?php }else{ ?>
                            <tr style="background-color: red;color:#fff;">
                                <td><center><?php echo $i++; ?></center></td>
                                <td style="color:white;font-weight:bolder;"><center><?php echo $j++;?></center></td>
                                <td><center><?php echo $value->email; ?></center></td>
                                <td><center><?php echo $value->first_name; ?></center></td>
                                <td><center><?php echo "$value->step_name"; ?></center></td>
                                <td>
                                    <center>
                                    <?php echo $value->word; ?>
                                    </center>
                                </td>
                                <td><center><?php echo $value->typed_word; ?></center></td>
                                <td><center><?php $typedWordPercentage = ($value->typed_word*100)/$value->word;
                                    echo number_format($typedWordPercentage,2); ?>%</center></td>
                                <td><center><?php $untypedWord = $value->word - $value->typed_word;
                                    echo $untypedWord;
                                 ?></center></td>
                                 <td><center><?php $untypedWordPercentage = 100 - $typedWordPercentage;
                                    echo number_format($untypedWordPercentage,2);
                                  ?>%</center></td>
                                <td><center><?php 
                                    $rightWord = $value->typed_word - $value->wrong_word;
                                    echo $rightWord;
                                 ?></center></td>
                                <td><center><?php 
                                    $accuracyPercentage = ($rightWord*100)/$value->word ;
                                    echo number_format($accuracyPercentage,2);
                                ?>%</center></td>
                                <td><center><?php echo $value->wrong_word; ?></center></td>
                                <td><center><?php $inaccuracyPercentage = 100 - $accuracyPercentage;
                                    echo number_format($inaccuracyPercentage,2);
                                ?>%</center></td>
                            </tr>
                            <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end database-->



        </div>
    </div>
@endsection