    document.getElementById("form_reg").addEventListener("submit", function (e) { 
    reg_login = document.getElementById("reg_login").value; 
    reg_password = document.getElementById("reg_password").value; 
    reg_email = document.getElementById("reg_email").value; 

    reg_name = document.getElementById("reg_name").value; 
    reg_surname = document.getElementById("reg_surname").value; 
    reg_patronymic = document.getElementById("reg_patronymic").value; 

    reg_gender = document.getElementById("reg_gender").value; 
    reg_birthdayDate = document.getElementById("reg_birthdayDate").value; 
    reg_permanentResidence = document.getElementById("reg_permanentResidence").value; 

    reg_passport = document.getElementById("reg_passport").value; 
    reg_mio = document.getElementById("reg_mio").value; 
    reg_policyCMI = document.getElementById("reg_policyCMI").value; 
    reg_policyPIP = document.getElementById("reg_policyPIP").value; 

    reg_disability = document.getElementById("reg_disability").value; 
    reg_phoneNumber = document.getElementById("reg_phoneNumber").value; 

   $(document).ready(function(){
     $.ajax({
       url: './server/registration.php',
       type: 'POST',
       data: {
        reg_login: reg_login,
        reg_password: reg_password,
        reg_email: reg_email,
        reg_name: reg_name,
        reg_surname: reg_surname,
        reg_patronymic: reg_patronymic,
        reg_gender: reg_gender,
        reg_birthdayDate: reg_birthdayDate,
        reg_permanentResidence: reg_permanentResidence,
        reg_passport: reg_passport,
        reg_mio: reg_mio,
        reg_policyCMI: reg_policyCMI,
        reg_policyPIP: reg_policyPIP,
        reg_disability: reg_disability,
        reg_phoneNumber: reg_phoneNumber
       }
     });
   });
  });

  
document.getElementById("form_auth").addEventListener("submit", function (e) { 
  auth_login = document.getElementById("auth_login").value;
  auth_password = document.getElementById("auth_password").value; 

    $(document).ready(function(){
      $.ajax({
        url: './server/authorization.php',
        type: 'POST',
        data: {
          auth_login: auth_login,
          auth_password: auth_password
        }
      });
    });
});


document.getElementById("form_auth_manager").addEventListener("submit", function (e) { 
  auth_login = document.getElementById("auth_login").value;
  auth_password = document.getElementById("auth_password").value; 

    $(document).ready(function(){
      $.ajax({
        url: './server/authorization.php',
        type: 'POST',
        data: {
          auth_login: auth_login,
          auth_password: auth_password
        }
      });
    });
});
  /*
  document.getElementById("form_Profession").addEventListener("submit", function (e) { 
    const selected_Profession = document.querySelector('select_Profession'); // выбираем элемент select
    const selectedValue = selected_Profession.value;
    //selected_Profession = document.getElementById("select_Profession").text;
    console.log(selected_Profession);
   $(document).ready(function(){
     $.ajax({
       url: '../Pages/sighup.php',
       type: 'POST',
       data: {
        selectedValue: selectedValue
       }
     });
   });
  });
  */