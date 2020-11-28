@extends('admin.masterEntrerpreneur')
@section('content')
<div id="page_content">
        <div id="page_content_inner">

            <!-- large chart -->
            <div class="uk-grid">
                <div class="uk-width-2-3">

                    <div class="md-card">
                        <div class="md-card-toolbar" style="color:yellow;background: -webkit-gradient(linear, left top, left bottom, from(#42a1ec), to(#0070c9));background: -webkit-linear-gradient(#42a1ec, #0070c9);background: linear-gradient(#42a1ec, #0070c9);font-size:17px;font-weight:bold;">
                            <h3 class="md-card-toolbar-heading-text" style="color:#fff;font-size:17px;font-weight:bold;">Your Exam Result</h3>
                            
                        </div>
                        <div class="md-card-content" style="background:#efffd8;font-size:27px;font-weight:bold;border-bottom:2px solid #42a1ec;border-left:2px solid #42a1ec;border-right:2px solid #42a1ec;text-align:justify;">

                            <table>
                                <tr>
                                    <td>Total Word</td>
                                    <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $result->word; ?></td>
                                </tr>
                                <tr>
                                    <td>Typed Word</td>
                                    <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $result->typed_word; ?></td>
                                </tr>
                                <tr>
                                    <td>Wrong Word</td>
                                    <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo $result->wrong_word; ?></td>
                                </tr>
                                <tr>
                                    <td>Correct Word</td>
                                    <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php $correct_word = $result->typed_word - $result->wrong_word ; echo $correct_word;   ?></td>
                                </tr>
                                <tr>
                                    <td>Score</td>
                                    <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
                                    <td><?php echo number_format($result->score,2); ?>%</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="uk-width-2-6">

                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')

@endsection