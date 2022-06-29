<?php
    if (session_status() == PHP_SESSION_NONE) session_start();
    include "db-connect.php";
?>

<form action="process/login.php" method="post">
  <div class="container">

    <p>Выберите категорию:</p>
    
<div class="toolbarrole">
    <label>
        <select name="Role" required>
            <option value="1">Учитель</option>
            <option value="2">Куратор</option>
            <option value="3">Ученик</option>
        </select>
    </label>
</div>
</br>

    <h1>Войти</h1><br/>
    
    <div class="textbox">
<input type="text"  name="Email" required>
      <label>Email</label>
    </div>


    <div class="textbox">
      <input type="password"  name="Password" required>
      <label>Password</label>
     </div>    

    <br/><button class="btn" type="submit">Войти</button>
    
    <form action="../process/forgot-pass.php">
    <br/><br/><button class="btn" id="btn" type="submit">Забыли пароль?</button>
    </form>
    
    
    <line>Нет аккаунта? <a href='process/sign-up-page.php'>Регистрация.</a></line>
  </div>
    
</form>