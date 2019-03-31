<html>

<head>
    <title>
       <?php echo $__env->yieldContent('title'); ?>
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/mainlayout.css">
    <!-- FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Cinzel Decorative' rel='stylesheet'>
    <!-- ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
</head>

<body>
    <div id="topbar" class="sticky-top">
        <!-- TOPBAR -->
        <div id="title">
            <h4 class="float-left" style="font-family: Cinzel Decorative;padding-left: 25px;padding-top: 4px;"><strong>Premier
                    University</strong></h4>
            <div class="float-right">
                <div class="container" style="display: flex">
                    <i class="fas fa-user logos" onclick="window.location='/profile'"></i>
                    <i class="fas fa-power-off logos" onclick="window.location='/logout'"></i>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="flex-items">
        <!-- FLEX ITEMS -->
        <div id="sidebar">
            <!-- SIDEBARS -->
            <!-- NAME OR PROFILE -->
            <h4 class="text-center text-white" id="sidebar-title"></h4>
            <hr style="background: white">
            <!-- LIST OF LINK -->
            <ul class="list-group">
                <?php if(Session::has('admin')): ?>
                <li class="list-group-item all-links <?php echo e(Request::is('dashboard') ? 'url_active' : ''); ?>" onclick="window.location='/dashboard'"><span class="icons"><i class="fab fa-dashcube" ></i></span><span>Dashboard</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('course') || Request::is('addmultiple') ? 'url_active' : ''); ?>" onclick="window.location='/course'"><span class="icons"><i class="fab fa-discourse" ></i></span><span>Course</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('semester') ? 'url_active' : ''); ?>" onclick="window.location='/semester'"><span class="icons"><i class="fas fa-university" ></i></span><span>Semester</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('session') ? 'url_active' : ''); ?>" onclick="window.location='/session'"><span class="icons"><i class="fas fa-adjust"></i></span><span>Session</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('block') ? 'url_active' : ''); ?>" onclick="window.location='/block'"><span class="icons"><i class="fas fa-ban"></i></span><span>Block</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('result') ? 'url_active' : ''); ?>" onclick="window.location='/result'"><span class="icons"><i class="fas fa-clipboard"></i></span><span>Result</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('admin/student') ? 'url_active' : ''); ?>" onclick="window.location='/admin/student'"><span class="icons"><i class="fas fa-user-graduate"></i></span><span>Student</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('admin/teacher') ? 'url_active' : ''); ?>" onclick="window.location='/admin/teacher'"><span class="icons"><i class="fas fa-chalkboard-teacher"></i></span><span>Teacher</span></li>
                <?php endif; ?>
                <?php if(session()->has('student')): ?>
                <li class="list-group-item all-links <?php echo e(Request::is('student/dashboard') ? 'url_active' : ''); ?>" onclick="window.location='/student/dashboard'"><span class="icons"><i class="fab fa-dashcube" ></i></span><span>Dashboard</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('enrollment') ? 'url_active' : ''); ?>" onclick="window.location='/enrollment'"><span class="icons"><i class="fas fa-plus"></i></span><span>Enrollment</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('student/result') ? 'url_active' : ''); ?>" onclick="window.location='/student/result'"><span class="icons"><i class="fas fa-clipboard"></i></span><span>Result</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('student/reciept') || Request::is('student/payment')  ? 'url_active' : ''); ?>" onclick="window.location='/student/reciept'"><span class="icons"><i class="fas fa-credit-card"></i></span><span>Payment</span></li>
                <?php endif; ?>
                <?php if(session()->has('teacher')): ?>
                <li class="list-group-item all-links <?php echo e(Request::is('teacher/dashboard') ? 'url_active' : ''); ?>" onclick="window.location='/teacher/dashboard'"><span class="icons"><i class="fab fa-dashcube" ></i></span><span>Dashboard</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('teacher/students') ? 'url_active' : ''); ?>" onclick="window.location='/teacher/students'"><span class="icons"><i class="fas fa-user" ></i></span><span>Student</span></li>
                <li class="list-group-item all-links <?php echo e(Request::is('teacher/upload') ? 'url_active' : ''); ?>" onclick="window.location='/teacher/upload'"><span class="icons"><i class="fas fa-upload" ></i></span><span>Upload</span></li>
                <?php endif; ?>
                <?php if(Session::has('advisor')): ?>
                <li class="list-group-item all-links <?php echo e(Request::is('teacher/advising') ? 'url_active' : ''); ?>" onclick="window.location='/teacher/advising'"><span class="icons"><i class="fab fa-tripadvisor"></i></span><span>Advising</span></li>
                <?php endif; ?>
            </ul>
        </div>
        <div id="contents">
            <!-- CONTENTS -->
            <!-- THIS PART WILL BE YIELDED FOR CONTENTS -->
            <div class="container">
                <?php echo $__env->yieldContent('rightcontent'); ?>
            </div>
        </div>
    </div>
</body>

</html>
