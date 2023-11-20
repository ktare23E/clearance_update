<?php

    include_once 'header.php';
?>
    <div class="container">
        <!-- sidebar -->
        <?php
                include_once 'aside.php';
        ?>
        <!------------------ END OF ASIDE ---------------->

        <div class="loader" id="loader">
            <div class="center">
                <div class="ring"></div>
                <span id="loading-span">loading...</span>
            </div>
        </div>
    </div>
        <script>
            $(document).ready(function(){
                const loadingSpan = document.getElementById("loading-span") 
                const loader = document.getElementById("loader");
                setTimeout(() => {
                    // loader.style.display = "none"
                    loadingSpan.innerHTML = "Welcome to NMSC Online Clearance System";
                    setTimeout(() => {
                        window.location.href = "index.php"
                    },3000)
                }, 1500)
            })
            
        </script>
    
    <script src="../assets/js/index.js"></script>
    
    
</body>
</html>
