<?php $__env->startSection('title'); ?>
Student |Reciept
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<?php 
?>
<div class="container">
    <?php if($error == false): ?>
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?php echo e($profile[0]->name); ?></strong>
                        <br>
                        Section: <?php echo e($secname); ?>

                        <br>
                        Advisor: <?php echo e($advisor_name); ?>

                        <br>
                        Session: <?php echo e($session->year.' '.$session->month); ?>

                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: <?php if($paid == true): ?> <?php echo e($payment_data->date); ?> <?php else: ?> <?php echo e(date('Y-m-d')); ?> <?php endif; ?></em>
                    </p>
                    <p>
                        <em>Receipt #: <?php if($paid == true): ?> <?php echo e($payment_data->reference); ?> <?php else: ?> ###### <?php endif; ?></em>
                    </p>
                    <p>
                        <em>Status : <?php if($paid == true): ?> Paid <?php else: ?> Unpaid <?php endif; ?> </em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1 style="margin-left: 150%;">Receipt</h1>
                </div>
                </span>
                <table class="table tale-sm text-center">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Type</th>
                            <th class="text-center">Credit</th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for( $i= 0; $i < count($datas); $i++): ?> <tr>
                            <td class="col-md-9"><em><?php echo e($datas[$i]->subname); ?></em></h4>
                            </td>
                            <td class="col-md-1" style="text-align: center"> <?php if($datas[$i]->type == 0): ?>Regular
                                <?php elseif($datas[$i]->type == 1): ?>Retake <?php elseif($datas[$i]->type == 2): ?> Recourse <?php endif; ?>
                            </td>
                            <td class="col-md-1 text-center"><?php echo e($datas[$i]->subcredit); ?></td>
                            <td class="col-md-1 text-center"><?php echo e($sub_value[$i].'/='); ?></td>
                            </tr>
                            <?php endfor; ?>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right">
                                    <h4><strong>Total: </strong></h4>
                                </td>
                                <td class="text-center text-danger">
                                    <h4><strong><?php echo e($total.'/='); ?></strong></h4>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <form method="GET" action="/student/payment/<?php echo e($total); ?>">
                <?php if($paid == false): ?>
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                </button>
                <?php else: ?>
                <button type="button" class="btn btn-danger btn-lg btn-block" onclick="window.location='makepdf'">
                    Download Copy   <span class="glyphicon glyphicon-chevron-download"></span>
                </button>
                <?php endif; ?>
            </form>

        </div>
    </div>

    <?php else: ?>
    <div class="alert alert-danger">
        <ul>
            <li><?php echo e($error); ?></li>
        </ul>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>