<!DOCTYPE html>
<html>
    <head>
    <title>Login Page</title>
    <meta name="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
            body {
            background: linear-gradient(to left, #2A9D8F, #264653, #2A9D8F); /* Three-layer Gradient Background */
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #444;
        }

        fieldset {
            border-radius: 15px;
            border: none;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            background-color: #ffffff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }

        .heading {
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
            color: #2A9D8F;
        }

        .info {
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
            color: #888;
        }

        .container {
            text-align: center;
        }

        select, input {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
            font-size: 16px;
            color: #555;
            background-color: #f9f9f9;
           
        }

        select:focus, input:focus {
            border-color: #2A9D8F;
            box-shadow: 0 0 8px rgba(42, 157, 143, 0.2);
            outline: none; 
        }

        option {
            background-color: #f9f9f9;
            color: #555;
        }
        
        button {
            width: 100%;
            height: 40px;
            background-color: #2A9D8F;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            appearance: none;
        }

        button:hover {
            background-color: #21867a;
            box-shadow: 0 4px 10px rgba(33, 134, 122, 0.2);
        }

        label {
            font-size: 14px;
            color: #444;
            margin-bottom: 5px;
            display: block;
            text-align: left;
        }

    </style>
    </head>
    <body>
        <form action="login.php" method="post">
        <fieldset>
          <div class="heading">
            LOGIN 
          </div><br>
          <div class="info">
            Enter the email & password and access the login page
          </div><br>
          <div class="container">
          <div class="select">
          <label for="roles" style="padding-right:255px;font-size:16px">Roles </label>
          <select  name="role" placeholder="Select an option" id="roles" required>
          <option disabled selected value>Select an option</option>
          <option value="user">User</option>
          <option value="manager">Manager</option>
          <option value="admin">Admin</option>
          <option value="superadmin">Super Admin</option></select>
          </div><br>
          <div>
           <label for="email" style="padding-right:255px;font-size:16px">Email </label><input type="email" placeholder="Enter your Email" name="email" style="width:95%;" required><br><br>
           <label for="pwd" style="padding-right:225px;font-size:16px" style="-webkit-text-security: circle">Password</label> <input type="password" placeholder="Enter your Password" name="pwd" style="width:95%;" required>
          </div><br>
          <button name="login">LOGIN</button>
      </div>
      </fieldset>
        </form>
     <?php
       if(isset($_POST['login']))
       {
           $db = mysqli_connect("localhost","root","","login");
           if ($db->connect_error) {
               die("Connection failed: " . $db->connect_error);
           }
           
           $email = $_POST['email'];
           $pwd = $_POST['pwd'];
           $role = $_POST['role'];

           session_start();
           $_SESSION['email']=$email;
           $sql ="select * from sadmin where email='$email' and pwd = '$pwd'";
           $result=mysqli_query($db,$sql);
           $count= mysqli_num_rows($result);      
           $var = "";
           if ($count == 1) {
            switch ($role) {
              case 'user':
                  header("Location: http://localhost/InternshipAssignment/user.php/");
                  break;
              case 'manager':
                  header("Location: http://localhost/InternshipAssignment/manager.php/");
                  break;
              case 'admin':
                  header("Location: http://localhost/InternshipAssignment/admin.php/");
                  break;
              case 'superadmin':
                  header("Location: http://localhost/InternshipAssignment/superadmin.php/");
                  break;
              default:
                  echo "<script>alert('Invalid role selected');</script>";
                  break;
          }
          exit(); 
      }    
            else {
            echo "<script type='text/javascript'>alert('Login failed')</script>";
            $db->error;
        }
      
            
    $db->close();
  } 
      
?>
</body>
</html>
