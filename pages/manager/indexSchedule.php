<?php
session_start();
include ('../../pageController.php');
$connect = getAbsolutePath('server/connect.php');
include $connect;
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Работа с расписанием докторов</title>
</head>

<body>

    <div class="wrapper">
        <?php
        $headerCover = getAbsolutePath('siteComponents/headerCover.php');
        include $headerCover;
        echo '<a href="./index.php"> <img class="headerLogo mtmb" src= "../../images/logo.png" style="visibility: visible" > </a>
        <p class="headerTitle mtmb"> Электронная <br> регистратура </p>
       </div>
      <div class="flex-container">';//path
        
        $header = getAbsolutePath('siteComponents/header.php');
        include $header;
        ?>

        <div class="wrapper">
            <div class="frameWOIF pad">
                <div class="flex-container col-sm-12 col-lg-12">
                    <div class="flex-element col-sm-12 col-lg-6 form-control">

                        <div id="div_Doctors">
                            <form id="form_select_Doctor" method="post">
                                <div class="form-card" style="margin: 10px">
                                    <select class="form-control flex-element" id="selectDoctor"
                                        name="selectDoctor"><!-- multiple="multiple" onchange="this.form.submit()"-->
                                        <?php
                                        $query = "SELECT * FROM `doctors`";
                                        $res = mysqli_query($conn, $query);
                                        while ($row = $res->fetch_assoc()) {
                                            echo '<option value=" ' . $row['doctorId'] . ' " > ' . $row['surname'] . ' ' . $row['name'] . ' ' . $row['patronymic'] . ' </option>';
                                        }
                                        ; ?>
                                    </select>
                                </div>

                                <input name="buttonDoctorAddSchedule" id="buttonDoctorAddSchedule"
                                    class="btn btn-primary" value="Приступить к добавлению времени приёма"
                                    type="submit" />


                            </form>
                        </div>

                        <div id="div_schedules">
                            <form id="form_addSchedule" method="post">
                                <div class="form-card">

                                    <?php
                                    if (isset($_POST['selectDoctor'])) {
                                        $selectedDoctor = $_POST['selectDoctor'];  //echo '<h1>' . $selectedDoctor . '</h1>';
                                    }
                                    ;
                                    ?>

                                    <div class="blockBody pad" style="margin: 10px;">

                                        <div class="container" style="justify-content: space-between;">
                                            <div class="mb-3 frame">
                                                <div class="d-inline-flex align-items-center"
                                                    style="display:inline-block">
                                                    <label> Идентификатор доктора</label>
                                                    <input id="selectedDoctor" name="selectedDoctor" type="text"
                                                        class="form-control flex-element" value="<?php if (isset($_POST['selectDoctor'])) {
                                                            echo $selectedDoctor;
                                                        } ?> " readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container" style="justify-content: space-between;"><!--pt-1-->
                                            <div class="mb-3">
                                                <div class="d-inline-flex align-items-center"
                                                    style="display:inline-block">
                                                    <label style="min-width: 125px !important">Дата и время</label>

                                                    <input id="scheduleDT" name="scheduleDT" type="datetime-local" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input name="buttonAddSchedule" id="buttonAddSchedule" class="btn btn-primary"
                                    value="Добавить время приёма" type="submit" />
                            </form>
                        </div><!--id="div_schedules"-->

                    </div><!--flex-element-->
                </div><!--flex-container-->
            </div>


        </div><!--wrapper-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->

    <!--modals - https://stackoverflow.com/questions/63517642/open-bootstrap-modal-when-enter-pressed-on-form -->

    <div><!--PHP-->
        <?php
        if (isset($_POST['scheduleDT'])) {//name of button from form
            $selectedDoctor = $_POST['selectedDoctor'];
            //echo "<script>console.log('" . $selectedDoctor . "' );</script>";//data comes here - great
            $scheduleDT = $_POST['scheduleDT']; //echo "<script>console.log('" . $scheduleDT . "' );</script>";//data comes here - great
            $query = mysqli_query($conn, "INSERT INTO `schedules` (`doctorId`, `datetimeOfReception`) VALUES ('$selectedDoctor','$scheduleDT')");
            $res = $conn->query($query);
            $conn->close();
        }//isset
        ?>
    </div>

</body>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>


</html>