<?php $__env->startSection('title'); ?>
Student |Payment
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<div class="container" style="margin-left: 32%;margin-top: 4%;">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                    <div class="checkbox pull-right">
                        <label>
                            <input type="checkbox" />
                            Remember
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" action="/student/payment/post/<?php echo e($total); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label for="cardNumber">
                                RECIEPENT CARD NUMBER</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="rcardNumber" placeholder="Valid Card Number"
                                    required autofocus readonly value="12345" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">
                                YOUR CARD NUMBER</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="ycardNumber" placeholder="Valid Card Number"
                                    required autofocus />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <?php if($errors->has('ycardNumber')): ?><p style="color:red"><?php $__currentLoopData = $errors->get('ycardNumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($e); ?><br><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p><?php endif; ?>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a href="#"><span class="nav-link active badge pull-right"><span class="glyphicon glyphicon-taka"></span><?php echo e($total.'/='); ?></span>
                        Final Payment</a>
                </li>
            </ul>
            <br />
            <button class="btn btn-success btn-lg btn-block" role="button" type="submit">Pay</button>
        </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>