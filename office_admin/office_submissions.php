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
                <div>
                    <h3 style="font-size: 2.5rem;">Students Panel</h3>
                </div>
            </div>

            <div class="student-panel-insights-container">
                <div class="student-insight-container">
                    <div class="upper-insight">
                        <div class="left-logo-insight">
                            <span class="material-symbols-sharp">groups_2  </span>
                        </div>
                        <div class="right-insights">
                            <h3 class="success">Active students</h3>
                            <h2>5,286</h2>
                        </div>
                        
                    </div>
                    <div class="lower-insight">
                        <small>Ajinomoto of sardines</small>
                    </div>
                </div>

                <div class="student-insight-container">
                    <div class="upper-insight">
                        <div class="left-logo-insight">
                            <span class="material-symbols-sharp">groups_2  </span>
                        </div>
                        <div class="right-insights">
                            <h3 class="success">Active students <span class="text-muted">under you</span>  </h3>
                            <h2>5,286</h2>
                        </div>
                        <div class="right-insights">
                            <h3>Insight data 1</h3>
                            <h2>1,234</h2>
                        </div>
                        <div class="right-insights">
                            <h3>Insight data 2</h3>
                            <h2>1,234</h2>
                        </div>
                    </div>
                    <div class="lower-insight">
                        <small>Ajinomoto of sardines</small>
                    </div>
                </div>
            </div>
            <div class="student-table-data-container">
                <h2>Lists of students</h2>
                <div class="table-container">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011-04-25</td>
                                <td>$320,800</td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011-07-25</td>
                                <td>$170,750</td>
                            </tr>
                            
                            <tr>
                                <td>Jonas Alexander</td>
                                <td>Developer</td>
                                <td>San Francisco</td>
                                <td>30</td>
                                <td>2010-07-14</td>
                                <td>$86,500</td>
                            </tr>
                            <tr>
                                <td>Shad Decker</td>
                                <td>Regional Director</td>
                                <td>Edinburgh</td>
                                <td>51</td>
                                <td>2008-11-13</td>
                                <td>$183,000</td>
                            </tr>
                            <tr>
                                <td>Michael Bruce</td>
                                <td>Javascript Developer</td>
                                <td>Singapore</td>
                                <td>29</td>
                                <td>2011-06-27</td>
                                <td>$183,000</td>
                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>27</td>
                                <td>2011-01-25</td>
                                <td>$112,000</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
                
            
        </div>

        
    </div>
    
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    
    <script src="../assets/js/office_admin_index.js"></script> 
    
</body>
</html>
