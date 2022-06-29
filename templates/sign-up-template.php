<?php
    require_once "../config/db-connect.php";    
?>
    <form action="sign-up.php" method="post"> 
    
<div class="cont">
  <div id="login-box">
        
    <div class="left-box">
      <h1>Welcome to NIShub.</h1>
      
        <p>Выберите категорию</p>
    


<script language="JavaScript">
    function UserType(mySelect) {
        currentValue = mySelect.options[mySelect.selectedIndex].value;

         if(currentValue==1) {
            document.getElementById("ClassTC").style.display = 'block';
            document.getElementById("Shanyrak").style.display = 'none';
            document.getElementById("ClassInput").style.display = "none";
        } else if (currentValue==2){
                document.getElementById("Shanyrak").style.display = 'block';
                document.getElementById("ClassInput").style.display = "none";
                document.getElementById("ClassTC").style.display = 'none';
        } else if (currentValue==3){
                document.getElementById("ClassInput").style.display = 'block';
                document.getElementById("ClassTC").style.display = "none";
                document.getElementById("Shanyrak").style.display = 'none';
        }
    }
</script>

    <div class="toolbarrole">
        <label>
            <select name="Role" onchange="UserType(this);" required>
                <option id="teacher-role" name="role" value="1" >Учитель</option>
                <option id="curator-role" name="role" value="2" >Куратор</option>
                <option id="student-role" name="role" value="3" >Ученик</option>
            </select>
        </label>
    </div>  
      
      <label>
        <input type="text" placeholder="Enter Your Nickname" name="Nickname" required>
      </label>
      
      <label>
        <input type="email" placeholder="Enter Email Address" name="Email" required>
      </label>
      
      <label>
        <input type="text" placeholder="Enter Your Surname" name="Surname" required>
      </label>
      
      <label>
        <input type="text" placeholder="Enter Your Firstname" name="Name" required>
      </label>
      
      <label>
              <input type="search" id="ClassInput" list="Class" placeholder="Enter Your Class" name="Class" required>
         <datalist id="Class">
            <?php 
            $sql= "SELECT ClassID, Class FROM Class";
            if($result = mysqli_query($conn,$sql)){
            while($row=mysqli_fetch_assoc($result))
            echo "<option value=".$row['Class'].">"."</option>";
            }
            else{
            die ("Couldn't get class.");
            }   
            ?>
        </datalist>
      </label>
      

      <label>
              <input type="search" id="ClassTC" list="Class" placeholder="Choose Your Classes" name="ClassTC" multiple>
         <datalist multiple id="ClassTC">
            <?php 
            $sql= "SELECT ClassID, Class FROM Class";
if($result = mysqli_query($conn,$sql)){
            while($row=mysqli_fetch_assoc($result))
            echo "<option value=".$row['Class'].">"."</option>";
            }
            else{
            die ("Couldn't get class.");
            }  
            ?>
        </datalist>
      </label>

      <label>
              <input  type="search" id="Shanyrak" list="Shanyrak" placeholder="Choose Your Shanyrak" name="Shanyrak" multiple>
         <datalist multiple id="Shanyrak">
            <?php 
            $sql= "SELECT ShanyrakID, Shanyrak FROM Shanyraks";
            if($result = mysqli_query($conn,$sql)){
                while($row=mysqli_fetch_assoc($result))
                echo "<option value=".$row['Shanyrak'].">"."</option>";
            } else{
                die ("Couldn't get shanyrak.");
            }   
            ?>
        </datalist>
      </label> 
      
      
    
      <label>
        <input type="password" placeholder="Enter Password" name="Password" id="Password" required>
      </label>
      
      <label>
        <input type="password" placeholder="Enter Password Again" name="ConfirmPassword" id="ConfirmPassword" required>
      </label>
      
      <label>
         <input type="date" id="date" name="DateOfBirth"/>
      </label>
      
      
      <input type="submit" name="signup-button" value="Sign Up"/>
      
      <h2>Уже зарегистрированы? <a href="../index.php">Войти</a></h2>
    </div>
    
    <div  class="right-box">
        
    </div>
    
  </div>
</div>
    </form>
        
    <script language='javascript' type='text/javascript'>
    function submitForm(){  
if (document.getElementsById('Password').value.length >= 8 && document.getElementsById('Password').value == document.getElementsById('ConfirmPassword').value){
        return true;
        }
        alert("Password too short or doesn't match.");
        return false;
        }
    </script>
