<?php
include_once 'connection.php';
include_once 'office_header.php';

$officer_requirement = $_SESSION['is_officer'];

$requirements = $db->query('SELECT * FROM requirement_view WHERE officer_requirement = '."'$officer_requirement'".' AND office_id = ' . $_SESSION['office_id'] . ' GROUP BY requirement_details ORDER BY requirement_details ASC');

// $getRequirementsQuery = "SELECT * FROM requirement_view WHERE officer_requirement = '$officer_requirement' AND office_id = '" . $_SESSION['office_id'] . "' GROUP BY requirement_details ORDER BY requirement_details ASC";
// $runRequirementsQuery = mysqli_query($conn, $getRequirementsQuery);
// $requirements = mysqli_fetch_assoc($runRequirementsQuery)





?>
<div class="office-container">
    <?php
    include_once 'office_navtop.php'
    ?>


    <!-- ================ MAIN =================== -->
    <div class="main-requirements-container">
        <div class="first-main-content-container">
            <span class="">
                <h2 style="text-align: center;">List of Requirements of <?= $_SESSION['office_name']; ?></h2>
            </span>
            <div class="form signup">
                
                <table id="myTable" class="row-border" style="width:100%">
                    <thead>
                        <tr>
                            <th>Requirements</th>
                            <th>Clearance Type</th>
                            <th>Clearance Period</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requirements as $requirement) : ?>
                            <tr>
                                <td><?= $requirement->requirement_details; ?></td>
                                <td><?= $requirement->clearance_type_name; ?></td>
                                <td><?= $requirement->school_year_and_sem . ' ' . $requirement->sem_name; ?></td>
                                <td class='primary table-action-container'>
                                    <button class="view-link" style="background-color: skyblue;" onclick='getRequirements(<?= json_encode($requirement->requirement_details) ?>,"edit-requirement-modal")'>Edit</button>
                                    <a class='view-link' href='required_students_view.php?requirement_details=<?= json_encode($requirement->requirement_details); ?>&clearance_progress_id=<?= $requirement->clearance_progress_id; ?>&clearance_type_id=<?= $requirement->clearance_type_id; ?>&is_complied=<?= $requirement->is_complied; ?>'>Required Students</a>
                                    <a class="view-link" style="background:black;" href="student_list_no_requirements_view.php?requirement_details=<?= $requirement->requirement_details; ?>&clearance_progress_id=<?= $requirement->clearance_progress_id; ?>">Students No requirements</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- <button id="register-csv-file-btn">
                    <span class="material-symbols-sharp">upload_file</span>
                    Bulk Upload Via .csv file
                    <span class="material-symbols-sharp">arrow_forward_ios</span>
                </button> -->



        </div>

    </div>


</div>



<div class="modal" id="edit-requirement-modal" style="width: 350px;">
    <div class="modal-header">
        <div class="title">Edit Requirements</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="requirements-modal-body">
        <div class="input">
            <label for="">Requirement Details:</label>
            <input type="hidden" id="old_requirement">
            <textarea name="" id="requirement_details" cols="30" rows="5" placeholder="Requirement Description"></textarea>
        </div>
        <button type="submit" name="update_requirements" class="create-clearance" id="bulk-update-requirement">Update</button>
    </div>
</div>
<div id="overlay"></div>







<script src="../assets/js/office_admin_index.js"></script>

<script>
    //datatable
    new DataTable('#myTable', {
    order: [[2, 'desc']]
});  

    function getRequirements(requirement_details, modal) {
        $("#requirement_details").val(requirement_details);
        $("#old_requirement").val(requirement_details);
        $.ajax({
            url: "get_requirement.php",
            method: "POST",
            data: {
                requirement_details: requirement_details
            },
            success: function (response, status) {
                console.log(response);
                $("#" + modal).addClass("active");
            }
        });
    }


    $("#bulk-update-requirement").click(function(){
    var old_requirement = $("#old_requirement").val();
    var requirement_details = $("#requirement_details").val();
    console.log(old_requirement);
    console.log(requirement_details);

    $.ajax({
        url: "update_requirement.php",
        method: "POST",
        data: {
            old_requirement: old_requirement,
            requirement_details: requirement_details,
        },
        success: function(response,status) {
            if(response == "success"){
                $("#edit-requirement-modal").removeClass("active");
                location.reload();
            }
        }
    });
});



</script>

<script>
    $('[name="sy_sem_id"]').change(function() {
        $('[name="sy_sem_id2"]').val($('[name="sy_sem_id"]').val())
    })
</script>

<script>
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
    const closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal)
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal)
        })
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal)
        })
    })

    function openModal(modal) {
        if (modal == null) return
        modal.classList.add('active')
        overlay.classList.add('active')
    }

    function closeModal(modal) {
        if (modal == null) return
        modal.classList.remove('active')
        overlay.classList.remove('active')
    }
</script>


</body>

</html>