<div id="div_schedules">
    <form id="form_select_Doctor" method="post">
        <div class="form-card">
            <select class="form-control" id="selectSchedule"
                name="selectSchedule"><!--OR make date and time separate and make "one day - many times"-->
                <?php
                if (isset($_POST['selectDoctor'])) {
                    //$selectedSpecialization = mysqli_real_escape_string($conn, $_POST['selectSpecialization']);
                    $selectedDoctor = $_POST['selectDoctor'];
                    $result = mysqli_query($conn, "SELECT * FROM `schedules` WHERE doctorId = '" . $selectedDoctor . "' and patientId is null ");
                    if (!empty($result)) {
                        if ($row = mysqli_fetch_array($result)) {
                            echo '<option value= " ' . $row['scheduleId'] . ' " > ' . $row['datetimeOfReception'] . ' </option>';
                        }
                    }
                    ;
                }
                ;
                ?>
            </select>
        </div>
        <input name="buttonDoctorAddSchedule" id="buttonDoctorAddSchedule" class="btn btn-primary"
            value="Добавить время приёма" type="submit" />
    </form>
</div>