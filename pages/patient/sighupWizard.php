<div id="div_container">

    <div id="div_specialization">

        <form id="form_specialization" method="post" style="display : block;"><!--Form №1 - "specialization" -->
            <div class="form-card">
                <select class="form-control" id="selectSpecialization" name="selectSpecialization">
                    <?php
                    $query = "SELECT * FROM `specializations`";
                    $res = mysqli_query($conn, $query);
                    while ($row = $res->fetch_assoc()) {
                        echo '<option value=" ' . $row['specializationId'] . ' " > ' . $row['specializationTitle'] . ' </option>';
                    }
                    ;
                    ?>
                </select>
            </div>
            <input name="buttonSelectSpecialization" id="buttonSelectSpecialization" class="btn btn-primary"
                value="Продолжить" type="submit" /><!-- onclick="submitJS('form_specialization')"-->
        </form>

    </div>


    <div id="div_doctor">
        <form id="form_doctor" method="post"><!--Form №2 - "doctors" (where specialization=*select.value*) -->
            <div class="form-card">
                <select class="form-control" id="selectDoctor" name="selectDoctor">
                    <?php
                    if (isset($_POST['selectSpecialization'])) {
                        $selectedSpecialization = $_POST['selectSpecialization'];
                        $result = mysqli_query($conn, "SELECT * FROM `doctors` WHERE specializationId = '" . $selectedSpecialization . "' ");
                        if (!empty($result)) {
                            if ($row = mysqli_fetch_array($result)) {
                                echo '<option value= " ' . $row['doctorId'] . ' " > ' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['patronymic'] . ' </option>';

                            }
                        }
                        ;
                    }
                    ;
                    ?>
                </select>
            </div>
            <input type="submit" name="buttonSelectDoctor" class="btn btn-primary" value="Продолжить" />
        </form>
    </div>

    <form id="form_schedule" method="post">
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
        <!--
    <input class="form-control" type="datetime-local" id="reg_birthdayDate" name="reg_birthdayDate"
        value="2018-06-12T00:00" min="1950-01-01T00:00" max="2024-01-01T00:00" />-->
        <input type="submit" type="submit" name="buttonSelectSchedule" class="btn btn-primary" value="Завершить" />

        <?php
        if (isset($_POST['selectSchedule'])) {
            //$selectedSpecialization = mysqli_real_escape_string($conn, $_POST['selectSpecialization']);
            $selectedSchedule = $_POST['selectSchedule'];
            //$_SESSION['user_id'] = $row['patientId'];
            $query = "UPDATE `schedules` SET `patientId`= '" . $_SESSION['user_id'] . "' WHERE `scheduleId` = '" . $selectedSchedule . "'";
            $res = $conn->query($query);
            $conn->close();
            /*
                    $result = mysqli_query($conn, "SELECT * FROM `schedules` WHERE doctorId = '" . $selectedDoctor . "' ");
                    if (!empty($result)) {
                        if ($row = mysqli_fetch_array($result)) {
                            echo '<option value= " ' . $row['scheduleId'] . ' " > ' . $row['datetimeOfReception'] . ' </option>';

                        }
                    };*/
        }
        ;
        ?>
    </form>

</div>