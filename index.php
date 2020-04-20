<?php

	

if(isset($_POST['login']))
	if(!empty($_POST['name']) && !empty($_POST['password']))
	{
		$connect=mysqli_connect('us-cdbr-iron-east-01.cleardb.net', 'b6b56d1720fc8e', '6788b937', 'heroku_d28bba37fb42476');
		
	

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysqli_query($connect,"SELECT ID, Password FROM `clients` WHERE Name='".($_POST['name'])."' LIMIT 1");

    $data = mysqli_fetch_assoc($query);
	
	
	
	
	

    

    # Соавниваем пароли

    if($data['Password'] === ($_POST['password']))
	{
		$connect=mysqli_connect('us-cdbr-iron-east-01.cleardb.net', 'b6b56d1720fc8e', '6788b937', 'heroku_d28bba37fb42476');
	 $_SESSION['id'] = $data['ID'];
	 $id = $_SESSION['id'];
		
	
	
		mysqli_query($connect,"UPDATE `clients` SET Online= NOW() WHERE ID='$id'");
	
		
		header("Location: table.php?id=".$id); 
		 
		exit();
		
			
			
           
			

	}
	else

    {
		echo("Неправильно введен пароль/логин");
		

        
		

    }

}
	}
else
{
	echo("Все поля обязательны для заполнения!");
}

?>
<?php
if(isset($_POST["registration"])){
if(!empty($_POST['name']) && !empty($_POST['mail'])  && !empty($_POST['password'])) {
 $connect=mysqli_connect('us-cdbr-iron-east-01.cleardb.net', 'b6b56d1720fc8e', '6788b937', 'heroku_d28bba37fb42476');
 $Name=mysqli_real_escape_string($connect,$_POST['name']);
 $Mail=mysqli_real_escape_string($connect,$_POST['mail']);
 $Password=mysqli_real_escape_string($connect,$_POST['password']);
 $query=mysqli_query($connect,"SELECT * FROM `clients` WHERE Name='{$Name}'");
 $numr=mysqli_num_rows($query);
 if($numr==0)
 {
 $sql_q="INSERT INTO `clients`
 (Name,Mail,Password)
 VALUES('{$Name}','{$Mail}', '{$Password}')";
 $res=mysqli_query($connect,$sql_q);
 if($res){
 echo "Аккаунт успешно создан";
 }
 else {
 echo "Не удалось добавить информацию";
 }
 }
else {
 echo "Этот ник занятый. Попробуйте другой!";
 }
}else {
 //$info = "Все поля обязательны для заполнения!";
 echo "Все поля обязательны для заполнения!";
}
}
?>

<?php

?>
<meta charset="utf-8">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="log.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>




<div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p></p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>SIGN UP</h2>

  
  <p></p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://www.gtagangwars.de/suite/images/styleLogo-6bd77433ddf78bd8477ea7306e804f677bc925d0.png" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://www.gtagangwars.de/suite/images/styleLogo-6bd77433ddf78bd8477ea7306e804f677bc925d0.png" alt="" />
       </div>
	<form  action=""  method="post" name="loginform">
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons"></i></a>
   <h2>LOGIN</h2>
 <input type="text" name="name" placeholder="Username" />
<input type="password" name="password" placeholder="Password" />
<button class="btn_login"  name="login" type="submit" onclick="cambiar_login()">LOGIN</button>
	 </div>
	 </form>
  
  <form  action=""  method="post" name="registerform">
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons"></i></a>
     <h2>SIGN UP</h2>
	   
<input type="text" name="name" placeholder="Username" />
<input type="text" name="mail" placeholder="Mail" />
<input type="password" name="password" placeholder="Password" />
<button class="btn_sign_up" name="registration" type="submit" onclick="cambiar_sign_up()">SIGN UP</button>
		   </form> 

  </div>

    </div>
    
  </div>
 </div>
</div>
<script>
    /* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/

function cambiar_login() {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
document.querySelector('.cont_form_login').style.display = "block";
document.querySelector('.cont_form_sign_up').style.opacity = "0";               

setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
  
setTimeout(function(){    
document.querySelector('.cont_form_sign_up').style.display = "none";
},200);  
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";
  
setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);  

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);  


}    



function ocultar_login_sign_up() {

document.querySelector('.cont_forms').className = "cont_forms";  
document.querySelector('.cont_form_sign_up').style.opacity = "0";               
document.querySelector('.cont_form_login').style.opacity = "0"; 

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);  
  
  }




</script>