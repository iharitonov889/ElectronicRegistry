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
    <title>Работа с докторами</title>
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

        <div class="wrapper" style="margin: 20px;">


            <form>
                <div class="form-element flex-element">
                    <!--<input type="submit" name="edit" value="Сохранить изменения" class="btn btn-primary">-->
                    <a href="addDoctor.php" class="btn btn-primary" style="width:100%">Добавить нового доктора</a>
                </div>
            </form>
            <table class="table table-bordered blockBody">
                <thead>
                    <tr><!--thead class affects the columns-->
                        <th class="flex-element">Идентификатор</th>
                        <th class="flex-element">Фамилия</th>
                        <th class="flex-element">Имя</th>
                        <th class="flex-element">Отчество</th>
                        <th class="flex-element">Специализация</th>
                        <!--th></th>-->
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM doctors";
                    $result = mysqli_query($conn, $query);
                    while ($data = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td class="flex-element"><?php echo $data['doctorId']; ?></td>
                            <td class="flex-element"><?php echo $data['surname']; ?></td>
                            <td class="flex-element"><?php echo $data['name']; ?></td>
                            <td class="flex-element"><?php echo $data['patronymic']; ?></td>
                            <td class="flex-element"><?php $res = mysqli_query($conn, "SELECT * FROM `specializations` where specializationId = '" . $data['specializationId'] . "' ");
                            echo $res->fetch_row()[1];
                            ?></td>
                            <!--<td class="flex-element"><?php //echo $data['specializationId']; ?></td> Идентификатор-->


                            <td class="flex-element">
                                <!--<a href="view.php?id=<?php //echo $data['id']; ?>" class="btn btn-info">Read More</a>-->
                                <a href="editDoctor.php?doctorId=<?php echo $data['doctorId']; ?>"
                                    class="btn btn-primary">Редактировать</a>
                                <a href="deleteDoctor.php?doctorId=<?php echo $data['doctorId']; ?>"
                                    class="btn btn-primary">Удалить</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>



        </div><!--wrapper-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->

    <!--Page-->

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

<!-- doesnt work,   but ok <?php
//if (isset($_SESSION["delete"])) {
?>
<div class="alert alert-success">
    <?php
    //echo $_SESSION["delete"];
    ?>
</div>
<?php
//unset($_SESSION["delete"]);
//};
?>-->