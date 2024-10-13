<div class=" container text-sm-center">
    <div class="container">
        <div class="row ">
            <div class="col-md-6 offset-md-3 blockBody pad">
                <form id="form_spec" method="post"><!--REGStartsHere-->
                    <div class="flex-container mb-2" style="justify-content: center">
                        <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center; ">
                            <div class="me-1"> <label>Специализация</label></div>
                        </div>
                        <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                            <div class="form-card mb-1">
                                <select class="form-control" id="selectSpecialization" name="selectSpecialization"
                                    style="text-align: center; min-width: 250px; ">
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
                        </div>
                    </div>
                    <input name="buttonSelectSpecialization" id="buttonSelectSpecialization" class="btn btn-primary"
                        value="Продолжить" type="submit" /> <!--button for agreement cuz php-select break "onchange"-->
                </form>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-6 offset-md-3 blockBody pad">
                <form id="form_doc" method="post"><!--REGStartsHere-->

                    <div class="flex-container mb-2" style="justify-content: center">
                        <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                            <div class="me-1"> <label>Доктор</label></div>
                        </div>
                        <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                            <div class="form-card mb-1">
                                <select class="form-control" id="selectDoctor" name="selectDoctor"
                                    style="text-align: center; min-width: 250px; ">
                                    <?php
                                    if (isset($_POST['selectSpecialization'])) {
                                        $_SESSION['selectedSpecialization'] = $_POST['selectSpecialization'];     //$selectedSpecialization = $_POST['selectSpecialization'];
                                        $result = mysqli_query($conn, "SELECT * FROM `doctors` WHERE specializationId = '" . $_SESSION['selectedSpecialization'] . "' ");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value= " ' . $row['doctorId'] . ' " > ' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['patronymic'] . ' </option>';
                                        }
                                        ;
                                    } else if (!empty($_SESSION['selectedDoctor'])) {
                                        $resultAfter = mysqli_query($conn, "SELECT * FROM `doctors` WHERE specializationId = '" . $_SESSION['selectedDoctor'] . "' ");
                                        while ($rowAfter = $resultAfter->fetch_assoc()) {
                                            echo '<option value=" ' . $row['doctorId'] . ' "' ?>
                                            <?php echo ($rowAfter['doctorId'] == $_SESSION['selectedDoctor']) ? 'selected' : ''; ?>
                                            <?php echo '>'; ?>
                                            <?php echo '' . $rowAfter['surname'] . ' ' . $rowAfter['name'] . ' ' . $rowAfter['patronymic'] . '</option>';
                                        }
                                        ;
                                    }
                                    ;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="buttonSelectDoctor" class="btn btn-primary" value="Продолжить" />
                </form>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-6 offset-md-3 blockBody pad">
                <form id="form_schedule" method="post"><!--REGStartsHere-->
                    <div class="flex-container mb-2" style="justify-content: center">
                        <div class="frame col-sm-3 col-lg-3 text-sm-center" style="text-align: center;">
                            <div class="me-1"> <label>Дата и время</label></div>
                        </div>
                        <div class="frame flex-element col-sm-6 col-md-6 col-lg-6">
                            <div class="form-card  mb-1">
                                <select class="form-control" id="selectSchedule" name="selectSchedule"
                                    style="text-align: center; min-width: 250px; ">
                                    <?php
                                    if (isset($_POST['selectDoctor'])) {
                                        $_SESSION['selectedDoctor'] = $_POST['selectDoctor']; //$selectedDoctor = $_POST['selectDoctor'];
                                        $result = mysqli_query($conn, "SELECT * FROM `schedules` WHERE doctorId = '" . $_SESSION['selectedDoctor'] . "' and patientId is null ");
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value= " ' . $row['scheduleId'] . ' " > ' . $row['datetimeOfReception'] . ' </option>';
                                        }
                                        ;
                                    }
                                    ;
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" type="submit" name="buttonSelectSchedule" class="btn btn-primary"
                        value="Записаться на приём" />
                </form>
            </div>
        </div>


        <?php
        /*
        if (isset($_POST['selectSchedule'])) {
            $selectedSchedule = $_POST['selectSchedule'];
            $query = "UPDATE `schedules` SET `patientId`= '" . $_SESSION['user_id'] . "' WHERE `scheduleId` = '" . $selectedSchedule . "'";
            $res = $conn->query($query);
            $conn->close();
            header("Location:./profile.php");
            exit();
            //unset($_SESSION['selectedSpecialization']);
            //unset($_SESSION['selectedDoctor']);
        }
        ;*/
        ?>

    </div>


</div><!--blockBody container text-sm-center">-->