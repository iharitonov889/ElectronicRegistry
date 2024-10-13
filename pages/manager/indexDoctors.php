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
    <link rel="stylesheet" type="text/css" href="../../design/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../design/components.css">
    <title>Работа с докторами</title>
</head>

<body>
    <div class="wrapper">
        <header class="flex-container blockBody pad" style="width: 100%; justify-content: space-between;">
            <!--flex-container (Row №1(Header)-->

            <div class="frame pad"><!--header part №1-->
                <a href="../../index.php"><img class="headerLogo mtmb" src="../../images/logo.png"
                        style="visibility: visible"></a>
                <p class="headerTitle mtmb"> Электронная регистратура <br>ГБУЗ «Калачевская ЦРБ» </p>
            </div><!--frame pad-->

            <div class="frame"><!--header part №2-->
                <div class="frame pad"><!--header subpart №2.1-->
                    <?php {
                        if (isset($_SESSION['manager_login']) != null) {
                            echo '<form method="post"> <button type="submit" class="btn btn-primary btn-lg" name="managerLogout">Выйти из профиля</button> </form>
          ';//path
                        }
                        ;
                    }
                    ; ?>
                </div>
            </div>
        </header>

        <div class="content" style="margin: 20px;">

            <?php
            if (!(isset($_SESSION['manager_login']))) {
                echo '<div class="frameWOIF pad">
                <div class="blockBody flex-element col-sm-12 col-lg-6" style="margin-left: auto; margin-right: auto;">
<div class="container-fluid block text-sm-center" style="text-align: left"><!--style=" display: table;"-->
<h4>Меню управления менеджера недоступно</h4>
<p>Ошибка - не была пройдена авторизация</p>
<h5 style="color: #6B9AFF;">Доступ запрещен</h5>
</div><!--container-fluid-->
</div> <!--flex-element-->
</div>';
            } else { ?>

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

            <?php }
            ; ?>

        </div><!--wrapper-->

        <?php
        $footerFile = getAbsolutePath('siteComponents/footer.php');
        include $footerFile;
        ?>

    </div><!--wrapper-->

    <!--Page-->

</body>

<script src="../../javascript/bootstrap.bundle.min.js"></script>
<script src="../../javascript/jquery-3.7.1.min.js"></script>

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