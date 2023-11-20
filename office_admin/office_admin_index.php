<?php
    include_once 'office_header.php';

?>
    <div class="office-container">
        <?php 
            include_once 'office_navtop.php'
        ?>
        
        <!-- ================ MAIN =================== -->
        <div class="office-main-container">
            <div class="first-div-container">
                <h2>NMSCST Online Clearance System</h2>
            </div>

            <div class="get-started-section">
                <div class="get-started-title">
                    <h2>Get started</h2>
                    <div>Below are some of actions/operations you can perform as a user</div>
                </div>
                <div class="actions-container">
                    <div class="action-container">
                        <div class="action-click">
                            <span class="material-symbols-sharp">playlist_add</span>
                            <h3>Add Requirements</h3>
                            <div class="circles-style">
                                <div class="circle blue"></div>
                                <div class="circle red"></div>
                                <div class="circle orange"></div>
                            </div>
                        </div>
                        <div>Let students know what are your clearance requirements for specific type of clearance by adding it to the system</div>
                        <a href="office_requirements.php">
                            <button class="background-warning">add requirements</button>
                        </a>
                        <small>Updated version 2022</small>
                    </div>
                    <div class="action-container">
                        <div class="action-click">
                            <span class="material-symbols-sharp">grid_view</span>
                            <h3>View Students</h3>
                            <div class="circles-style">
                                <div class="circle blue"></div>
                                <div class="circle red"></div>
                                <div class="circle orange"></div>
                            </div>
                        </div>
                        <div>View/check the students' list</div>
                        <a href="office_students.php" >
                            <button class="background-primary">view students</button>
                        </a>
                        <small>Updated version 2022</small>
                    </div>
                    <div class="action-container">
                        <div class="action-click">
                            <span class="material-symbols-sharp">grid_view</span>
                            <h3>View/sign clearance</h3>
                            <div class="circles-style">
                                <div class="circle blue"></div>
                                <div class="circle red"></div>
                                <div class="circle orange"></div>
                            </div>
                        </div>
                        <div>View and sign the students' clearance and check their clearance status</div>
                        <a href="office_clearance.php" >
                            <button class="background-success">view clearance</button>
                        </a>
                        <small>Updated version 2022</small>
                    </div>
                    
                    
                        
                </div>
            </div>
            
            
        </div>

        
    </div>
    
    
    <script src="../assets/js/office_admin_index.js"></script> 
    
</body>
</html>
