<?php
    include_once 'student_header.php';

?>
    <div class="office-container">
        <?php 
            include_once 'student_navtop.php'
        ?>

<div class="office-main-container">
            <div class="first-div-container">
                <div class="top-left">
                    <div>Clearance at ease!</div>
                    <!-- <h2><span class="primary">Nmsc</span> Online Clearance System</h2> -->
                    <h2>KRISTIAN LOVE PHOEBE</h2>
                    <h3>AYAW NIG USBA. KABALO KONG GIKILIG KA!</h3>
                    <h3>Post clearance requirements and sign students' clearance online! All in one place!  </h3>
                </div>
                <div class="top-right">
                    <div class="office-admin-image-container">
                        <img src="../images/nmsc-logo.png" alt="">
                    </div>
                </div>
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
                        <a href="">
                            <button class="background-warning">add requirements</button>
                        </a>
                        <small>Updated version 2022</small>
                    </div>
                    <div class="action-container">
                        <div class="action-click">
                            <span class="material-symbols-sharp">grid_view</span>
                            <h3>View submissions</h3>
                            <div class="circles-style">
                                <div class="circle blue"></div>
                                <div class="circle red"></div>
                                <div class="circle orange"></div>
                            </div>
                        </div>
                        <div>View/check the students' required submission for your clearance signation</div>
                        <a href="" >
                            <button class="background-primary">view submissions</button>
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
                        <a href="" >
                            <button class="background-success">view clearance</button>
                        </a>
                        <small>Updated version 2022</small>
                    </div>
                    
                    
                        
                </div>
            </div>
            
            
        </div>
        
        <!-- ================ MAIN =================== -->
        <div class="main-requirements-container">
            <div class="first-main-content-container">
                <div class="form signup">
                    <span class="title"><h2>List of Clearances</h2></span>
                    
                </div>
                <div class="form signup">
                    <span class="title"><h2>Add new requirements</h2></span>
                    <form action="" method="POST">
                        <div class="input-field-container">
                            <div class="input-field sy-sem-select">
                                <select name="student_year" id="year-level-option">
                                    <option value="0" >School year and sem</option>
                                    <option value="1st Year">1st Year</option>
                                    <option value="2nd Year">2nd Year</option>
                                    <option value="3rd Year">3rd Year</option>
                                    <option value="4th Year">4th Year</option>
                                </select>
                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                            </div>
                            <div class="input-field sy-sem-select">
                                <select name="student_year" id="year-level-option">
                                    <option value="0" >Clearance Type</option>
                                    <option value="1st Year">Graduating</option>
                                    <option value="2nd Year">Continuing</option>
                                    <option value="3rd Year">Transfering</option>
                                    
                                </select>
                                <i class="uil uil-angle-down" id="uil-arrow-down"></i>
                            </div>
                        </div>
                        <div class="input-field">
                            <textarea name="" id="" cols="30" rows="10" required></textarea>
                        </div>
                        <div class="input-field button">
                            <input type="submit" value="Create Account">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>

        
    </div>
    
    
    <script src="../assets/js/student_index.js"></script>   

    
</body>
</html>
