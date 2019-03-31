<?php $__env->startSection('title'); ?>
Admin | Semester
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
<div class="container">
    <div id="msg" style="display: none;"><?php if($error): ?> <div class="alert alert-danger"><?php echo e($error); ?></div><?php endif; ?></div>
    <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#myModal">Add
        Semester</button>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive" style="overflow-y:auto ; height: 73%;">
                <table id="mytable" class="table table-sm text-center">
                    <thead>
                        <tr class="table-info">
                            <th>Semester</th>
                            <th>Status</th>
                            <th>Active/Block</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="semestertbody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Semester <span id="semname"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="deletedata()">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <form action="addsemester" method="POST">
            <?php echo e(csrf_field()); ?>

            <div class="modal-content">
                <div class="modal-header">
                    
                    <h4 class="modal-title text-muted">Add Semester</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usr"><strong>Add Semester Name</strong>:</label>
                        <input type="number" class="form-control" id="sems" name="semester_name" required placeholder="e.g 1 or 2">
                        <div id="errmsg" style="display: none; background: #facccc;color: #f04444;margin-top: 4px;padding: 4px 4px 4px 4px;">Please
                            type semester</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="add_semester_button" onclick="control_semester()">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
        </form>
    </div>
</div>
<script>
        function control_semester() {
            var sems = document.getElementById('sems');
            if (sems.value === '') {
                document.getElementById('errmsg').style.display = 'block';
            } else
                document.getElementById('add_semester_button').setAttribute('type', 'submit');

        }

</script>


<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 
<script>
        function hidmsg() {
            document.getElementById('msg').style.display = 'none';
        }

        function sup(name) {
            if (name === '1')
                return name + '<sup>st</sup>';
            else if (name === '2')
                return name + '<sup>nd</sup>';
            else if (name === '3')
                return name + '<sup>rd</sup>';
            else
                return name + '<sup>th</sup>';
        }

        function active(status) {
            if (status === 1) {
                return 'Active';
            } else {
                return 'Inactive';
            }
        }

        function setbutton(id, active) {
            if (active === 1) {
                return '<button class="btn btn-dark" onclick="enabledisable(' + id + ',1)">Disable</button>';
            } else {
                return '<button class="btn btn-success" onclick="enabledisable(' + id + ',0)">Enable</button>';
            }
        }
        $('document').ready(function () {
            getsemester();
        });

        function getsemester() {
            $.ajax({
                url: 'getsemester',
                method: 'get',
                success: function (data) {
                    var semester = data;
                    var tablerow = '';
                    if (semester.length > 0) {
                        for (var i = 0; i < semester.length; i++) {
                            tablerow = tablerow + "<tr><td>" + sup(semester[i].name) + "</td><td>" + active(semester[i].active) + "</td><td>" + setbutton(semester[i].id, semester[i].active) + "</td><td><button class ='btn btn-danger' onclick='deletemodal(" + semester[i].id + ")'>Delete</button></td></tr>";
                        }
                        document.getElementById('semestertbody').innerHTML = tablerow;
                        document.getElementById('mytable').style.display = ' ';
                    } else {
                        document.getElementById('mytable').style.display = 'none';
                    }

                },
                error: function (e) {
                    console.log(e);
                },
            });
        }

        function enabledisable(id, active) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'enabledisable/' + id + '/' + active,
                method: 'post',
                success: function (data) {
                    if (data['update'] === true) {
                        document.getElementById('msg').innerHTML = "<div class='alert alert-success'>Successfully updated.</div>";
                        document.getElementById('msg').style.display = '';
                    } else {
                        document.getElementById('msg').innerHTML = "<div class='alert alert-danger'>Failed to update.</div>";
                        document.getElementById('msg').style.display = '';
                    }
                    getsemester();
                    var hide = setTimeout(hidmsg, 4000);
                },
                error: function (e) {
                    console.log(e);
                }
            });
        }
        var global_semester;

        function deletemodal(id) {
            $.ajax({
                url: 'showmodaldata/' + id,
                method: 'get',
                success: function (data) {
                    document.getElementById('semname').innerHTML = "<strong>" + sup(data[0].name) + "</strong>";
                    $('#deleteModal').modal('show');
                    global_semester = id;
                },
                error: function (e) {
                    console.log(e);
                },
            });
        }

        function deletedata() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: 'deletesemester/' + global_semester,
                method: 'post',
                success: function (data) {
                    if (data['delete'] === true) {
                        $('#deleteModal').modal('hide');
                        document.getElementById('msg').innerHTML = "<div class='alert alert-success'>Successfully deleted.</div>";
                        document.getElementById('msg').style.display = '';
                    } else {
                        document.getElementById('msg').innerHTML = "<div class='alert alert-danger'>Failed to delete.</div>";
                        document.getElementById('msg').style.display = '';
                    }
                    getsemester();
                    var hide = setTimeout(hidmsg, 4000);
                },
                error: function (e) {
                    console.log(e);
                },
            });
        }
    </script>
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>