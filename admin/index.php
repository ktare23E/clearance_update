<?php

    include_once 'header.php';

?>

    <div class="container-student">
        <!-- sidebar -->
        <?php   include_once 'aside.php'; ?>
        <!------------------ END OF ASIDE ---------------->
        <main class="main-student">
            <div class="right">
                <div class="top">
                    <button id="menu-btn" class="menu-btn">
                        <span class="material-symbols-sharp">menu</span>
                    </button>
                    <h1>Dashboard</h1>
                    <div class="theme-toggler">
                        <span class="material-symbols-sharp active">light_mode</span>
                        <span class="material-symbols-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Hey, <b>World</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="../images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <!-- ========== END OF TOP ============= -->
    
            </div>



            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">analytics</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Total Enrolled Students</h3>
                            <h1 class="total_users"></h1>
                        </div>
                    </div>

                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- -------------  END OF SALES -------------- -->

                <div class="expenses">
                    <span class="material-symbols-sharp">bar_chart</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Total Active Student from Enrolled:</h3>
                            <h1 class="total_active"></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p id="active_users_percentage"></p>
                            </div>
                        </div>
                    </div>

                    <a href="student.php">See for more details</a>
                </div>
                <!-- -------------  END OF EXPENSES -------------- -->

                <div class="income">
                    <span class="material-symbols-sharp">stacked_line_chart</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Total of Signing Office of this Active Clearance Period</h3>
                            <h1 class="signing_office"></h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p id="active_signing_office"></p>
                            </div>
                        </div>
                    </div>
                    
                    <small class="text-muted">Last 24 Hours</small>
                </div>

                <div class="sales">
                    <span class="material-symbols-sharp">analytics</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Singing Offices of this Clearance Period</h3>
                            <h3 class="office_names"></h3>
                        </div>
                    </div>
                    <a href="signing_office.php">See for more details</a>
                    <!-- <small class="text-muted">Last 24 Hours</small> -->
                </div>
                <!-- -------------  END OF SALES -------------- -->

                <div class="expenses">
                    <span class="material-symbols-sharp">bar_chart</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Clearance Types</h3>
                            <h3 class="clearance_type"></h3><br>
                            <!-- <ul class="clearance_type">
                                <li></li>
                            </ul> -->
                        </div>
                        <!-- <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <p id="active_users_percentage"></p>
                            </div>
                        </div> -->
                    </div>

                    <a href="clearance_type.php">See for more details</a>
                </div>
                <!-- -------------  END OF EXPENSES -------------- -->

                <div class="income">
                    <span class="material-symbols-sharp">stacked_line_chart</span>
                    
                    <div class="middle">
                        <div class="left">
                            <h3>Active School Year and Semester</h3>
                            <!-- <h1 class="sy_sem"></h1> -->
                            <h3 class="sy_sem"></h3>
                        </div>
                        <div class="progress">
                            <!-- <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg> -->
                            <!-- <div class="number">
                                <p>44%</p>
                            </div> -->
                        </div>
                    </div>

                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!-- -------------  END OF INCOME -------------- -->
            </div>
            <!-- -------------  END OF INSIGHTS -------------- -->

        
        </main>
       

    </div>
    <script>
        setInterval(function(){
            $.ajax({
                url: 'get_total_users.php',
                type: 'GET',
                success: function(response) {
                    $('.total_users').text(response);
                }
            });
        },1000)
            
    </script>

    <script>
            setInterval(function(){
                $.ajax({
                    url: 'get_active_status.php',
                    type: 'GET',
                    success: function(response) {
                            $('.total_active').text(response);
                    }
                });
            },1000)
    </script>

<script>
    setInterval(function(){
            $.ajax({
            url: 'get_active_users_percentage.php',
            type: 'GET',
            success: function(response) {
                    $('#active_users_percentage').text(response);
            }
        });
    },1000)


</script>

    <script>
        setInterval(function(){
            $.ajax({
                url: 'get_signing_office.php',
                type: 'GET',
                success: function(response) {                        
                    $('.signing_office').text(response);
                }
            });
        },1000)
            
    </script>
    <script>
    setInterval(function(){
            $.ajax({
            url: 'get_active_signing_office_percentage.php',
            type: 'GET',
            success: function(response) {
                    $('#active_signing_office').text(response);
            }
        });
    },1000)
    
    
</script>

<script>
        setInterval(function(){
            $.ajax({
                url: 'get_office_name.php',
                type: 'GET',
                success: function(response) {
                        $('.office_names').text(response);
                }
            });
        },1000)
        
</script>

<script>
        setInterval(function(){
            $.ajax({
                url: 'get_clearance_type.php',
                type: 'GET',
                success: function(response) {
                        $('.clearance_type').text(response);
                }
            });
        },1000)
        
</script>

<script>
        setInterval(function(){
            $.ajax({
                url: 'get_sy_sem.php',
                type: 'GET',
                success: function(response) {
                        $('.sy_sem').text(response);
                }
            });
        },1000)
        
</script>
    
    <script src="../assets/js/index.js"></script>
    
    
</body>
</html>
