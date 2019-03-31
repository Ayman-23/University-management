<?php $__env->startSection('title'); ?>
Admin | Student
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-3">
            
        </div>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="Search Student...." id="search">
            <div class="container" id="msg" style="display: none;margin-top: 5px;"><h6 class="text-muted">No Result</h3></div>
        </div>
    </div>
    <br>
 <div class="row">
     <div class="col-md-1">

     </div>
     <div class="col-md-10">
        <!-- ADDING CODE -->
        
        <table class="table table-sm border" id="studentsearchtable" style="display: none">
                <thead>
                    <tr>
                     <th></th>
                     <th>Name</th>
                     <th>Student ID</th>
                     <th>Email</th>
                     <th>Status</th>
                     <th>Update</th>
                    </tr>
                </thead>
                <tbody id="studentsearchtbody">
                </tbody>
            </table>
            
        
        <table class="table table-sm border" id="studenttable">
            <thead>
                <tr>
                 <th></th>
                 <th>Name</th>
                 <th>Student ID</th>
                 <th>Email</th>
                 <th>Status</th>
                 <th>Update</th>
                </tr>
            </thead>
            <tbody id="studenttbody">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><img src="/images/<?php echo e($d->image); ?>" style="height:25px;width: 25px;" class="rounded-circle"></td>
                    <td><?php echo e($d->name); ?></td>
                    <td><?php echo e($d->user_id); ?></td>
                    <td><?php echo e($d->email); ?></td>
                    <?php if($d->active == 1): ?>
                    <td>Active</td> 
                <td><a class="btn btn-danger text-white" href='studentdisable/<?php echo e($d->user_id); ?>'>Disable</a></td>
                    <?php else: ?>
                    <td>Disabled</td> 
                <td><a class="btn btn-success text-white" href='studentenable/<?php echo e($d->user_id); ?>'>Enable</a></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        <?php echo e($data->links()); ?>

     </div>
     <div class="col-md-1">
         
     </div>
 </div>
</div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 
<script>
$('document').ready(function() {

    $('#search').keyup(function searching() {
        var search_string = document.getElementById('search').value;
        if (search_string === ' ' || !document.getElementById('search').value) {
            document.getElementById('studenttable').style.display = '';
            document.getElementById('studentsearchtable').style.display = 'none';
            document.getElementById('msg').style.display = 'none';
        } else {
            $.ajax({
                url: 'getstudentsearchresult/' + document.getElementById('search').value,
                method: 'get',
                success: function (data) {
                    var tablerow = '';
                    if (data['student'].length === 0 && data['id'].length === 0) {
                        document.getElementById('studentsearchtable').style.display = 'none';
                        document.getElementById('studenttable').style.display = '';
                        document.getElementById('msg').style.display = '';
                    } else {
                        document.getElementById('studentsearchtable').style.display = '';
                        document.getElementById('studenttable').style.display = 'none';
                        document.getElementById('msg').style.display = 'none';
                        var activeOrInactive;
                        var button;
                        for (var i = 0; i < data['student'].length; i++) {
                            if (data['student'][i].active === 1) {
                                activeOrInactive = "Active";
                                button = "<a class='btn btn-danger text-white' href='studentdisable/"+data['student'][i].user_id+"'>Disable</a>";
                            } else {
                                activeOrInactive = "Inactive";
                                button = "<a class='btn btn-success text-white' href='studentenable/"+data['student'][i].user_id+"'>Enable</a>";
                            }
                            tablerow = tablerow + "<tr><td><img src='/images/" + data['student'][i].image + "' style='height:25px;width: 25px;' class='rounded-circle'></td><td>" + data['student'][i].name + "</td><td>" + data['student'][i].user_id + "</td><td>" + data['student'][i].email + "</td><td>" + activeOrInactive + "</td><td>" + button + "</td></tr>";
                        }
                        for (var i = 0; i < data['id'].length; i++) {
                            if (data['id'][i].active === 1) {
                                activeOrInactive = "Active";
                                button = "<a class='btn btn-danger text-white' href='studentdisable/"+data['id'][i].user_id+"'>Disable</a>";
                            } else {
                                activeOrInactive = "Inactive";
                                button = "<a class='btn btn-success text-white' href='studentenable/"+data['id'][i].user_id+"'>Enable</a>";
                            }
                            tablerow = tablerow + "<tr><td><img src='/images/" + data['id'][i].image + "' style='height:25px;width: 25px;' class='rounded-circle'></td><td>" + data['id'][i].name + "</td><td>" + data['id'][i].user_id + "</td><td>" + data['id'][i].email + "</td><td>" + activeOrInactive + "</td><td>" + button + "</td></tr>";
                        }
                        document.getElementById('studentsearchtbody').innerHTML = tablerow;
                    }

                },
                error: function (e) {
                    console.log(e);
                }

            })
        }

    });
})
</script>
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>