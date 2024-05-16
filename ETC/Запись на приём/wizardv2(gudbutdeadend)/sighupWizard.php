<!--author https://bbbootstrap.com/snippets/multi-step-form-wizard-30467045# -->
<!--specialization-->
<!--qualification-->

<?php
include "../../server/connect.php";
?>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Запись на приём</strong></h2>
                <p>Заполните все поля формы, чтобы перейти к следующему шагу</p>
                <div class="row">
                    <div class="col-md-12 mx-0" id="msform">
                        <form> <!----><!--FORM!!!-->

                            <!-- progressbar (css line 178)-->
                            <ul id="progressbar">
                                <li class="active" id="specialization">
                                    <strong>Специализация<strong>
                                </li>
                                <li id="doctor">
                                    <strong>Доктор</strong>

                                </li>
                                <li id="schedule">
                                    <strong>Дата и время приёма<strong>
                                </li>
                                <li id="confirm">
                                    <strong>Завершение<strong>
                                </li>
                            </ul>
                            <!-- fieldsets -->


                            <fieldset>
                                <form id="form_specialization" method="post"><!--Form №1 - "specialization" -->
                                    <div class="form-card">
                                        <select class="form-control" id="selectSpecialization"
                                            name="selectSpecialization">
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

                                    <input type="button" name="next" class="next action-button" value="Next Step"
                                        onclick="submit('form_specialization')" />
                                </form>
                            </fieldset>


                            <fieldset>
                                <form id="form_doctor" method="post">
                                    <div class="form-card">

                                        <select class="form-control" id="selectDoctor" name="selectDoctor">
                                            <?php
                                            if (isset($_POST['selectSpecialization'])) {
                                                $selectedSpecialization = $_POST['selectSpecialization'];
                                                $result = mysqli_query($conn, "SELECT * FROM `doctors` WHERE specializationId = '" . $selectedSpecialization . "' ");
                                                if (!empty($result)) {
                                                    if ($row = mysqli_fetch_array($result)) {
                                                        echo '<option value= " ' . $row['doctorId'] . ' " > ' . $row['name'] . $row['surname'] . ' </option>';

                                                    }
                                                }
                                                ;
                                            }
                                            ;
                                            ?>
                                        </select>

                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />

                                </form>
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Payment Information</h2>

                                </div>
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Previous" />
                                <input type="button" name="make_payment" class="next action-button" value="Confirm" />
                            </fieldset>

                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h5>You Have Successfully Signed Up</h5>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form><!---->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>