<style>
        .tbl{
            border: 1px solid black;
        }
        </style>
        <html>
            <head>
        
        
            </head>
            <body>
        <!------ Include the above in your HEAD tag ---------->
        <?php 
        $datas = $data['datas'];
        $profile = $data['profile'];
        $sub_value = $data['sub_value'];
        ?>
        <div class="container">
        <?php if($data['error'] == false): ?>
            <div class="row">
                <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6" style="float: left;">
                            <address>
                                <strong><?php echo e($profile[0]->name); ?></strong>
                                <br>
                                Section: <?php echo e($data['secname']); ?>

                                <br>
                                Advisor: <?php echo e($data['advisor_name']); ?>

                                <br> 
                                Session: <?php echo e($data['session']->year.' '.$data['session']->month); ?>

                            </address>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="float: right;">
                            <p>
                            <em>Date: <?php if($data['paid'] == true): ?> <?php echo e($data['payment_data']->date); ?> <?php else: ?> <?php echo e(date('Y-m-d')); ?> <?php endif; ?></em>
                            </p>
                            <p>
                            <em>Receipt #: <?php if($data['paid'] == true): ?> <?php echo e($data['payment_data']->reference); ?> <?php else: ?> ###### <?php endif; ?></em>
                            </p>
                            <p>
                                <em>Status :  <?php if($data['paid'] == true): ?> Paid <?php else: ?> Unpaid <?php endif; ?> </em>
                            </p>
                        </div>
                    </div>
                    <div  style="text-align: center">
                        <div  style="margin-top:1in;margin-left: 22%;">
                            <h1>Receipt</h1>
                        </div>
                        <div style="margin-left: 19%;width: 100%;">
                        <table style="">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th >Type</th>
                                    <th >Credit</th>
                                    <th >Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for( $i= 0; $i < count($datas); $i++): ?>
                                <tr class="tbl">
                                <td><em><?php echo e($datas[$i]->subname); ?></em></h4></td>
                                <td style="text-align: center"> <?php if($datas[$i]->type == 0): ?>Regular <?php elseif($datas[$i]->type == 1): ?>Retake <?php elseif($datas[$i]->type == 2): ?> Recourse <?php endif; ?> </td>
                                <td style="text-align: center"><?php echo e($datas[$i]->subcredit); ?></td>
                                <td style="text-align: center"><?php echo e($sub_value[$i].'/='); ?></td>
                                </tr>
                            <?php endfor; ?>
                                <tr>
                                    <td>   </td>
                                    <td>   </td>
                                    <td ><h4><strong>Total: </strong></h4></td>
                                    <td class="text-center text-danger"><h4><strong><?php echo e($data['total'].'/='); ?></strong></h4></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </body>
        </html>