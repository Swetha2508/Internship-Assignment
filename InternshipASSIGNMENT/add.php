<html>
    <head> <title>Super Admin - Add</title>
    <meta name="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <style>
         body {
            background: linear-gradient(to right, #51A3A3, #75485E);
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff; 
        }

        fieldset {
            border-radius: 15px;
            border: none;
            padding: 20px 40px;
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9); 
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .heading {
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
            color: #51A3A3; 
        }

        .container {
            text-align: center;
        }

        .select {
            margin-bottom: 20px;
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
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select:focus, input:focus {
            border-color: #51A3A3; 
            box-shadow: 0 0 8px rgba(81, 163, 163, 0.6); 
        }

        button {
            width: 100%;
            height: 40px;
            background-color: #51A3A3; 
            border: none;
            border-radius: 5px;
            color: #fff; 
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #75485E; 
            box-shadow: 0 4px 10px rgba(117, 72, 94, 0.6); 
        }

        button a {
            text-decoration: none;
            color: #fff;
            display: block;
            height: 100%;
            width: 100%;
            line-height: 40px;
        }

        button a:hover {
            color: #fff;
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
    <form action="add.php" method="post">
        <fieldset>
        <div class="heading">
            SUPER ADMIN - ADD 
          </div><br>
          <div class="container">
          <div class="select">
          <label for="roles" style="padding-right:255px;font-size:16px">Roles </label>
          <select placeholder="Select an option" name="role" id="roles" required>
          <option disabled selected value>Select an option</option>
          <option value="user">User</option>
          <option value="manager">Manager</option>
          <option value="admin">Admin</option>
          <option value="superadmin">Super Admin</option></select>
          </div><br>
          <div class="label">
           <label for="email" style="padding-right:255px;font-size:16px">Email </label><input required type="email" placeholder="Enter your Email" name="email"><br><br>
           <label for="pwd" style="padding-right:225px;font-size:16px" style="-webkit-text-security: circle">Password</label> <input required type="password" placeholder="Enter your Password" name="pwd">
          </div><br>
          <button><a href="http://localhost/InternshipAssignment/superadmin.php/" target="_parent">BACK</a></button><br><br>
          <button type= "submit" name="submit">SUBMIT</button>
      </div>
      </fieldset>
        </form>
  <?php
    
    
    if(isset($_POST['submit']))
    {
        $db = mysqli_connect("localhost","root","","login");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $role = $_POST['role'];
        $query = "INSERT INTO sadmin(email,pwd) values ('$email','$pwd')";
        if($db->query($query)==TRUE)
        {

             $Urole = strtoupper($role);
            echo "<script type='text/javascript'>alert('$Urole DATA Added Successfully. Thank You!!') </script>";
        }
        else
        {
              echo 'Error Occured';
              $db->error;
        }
        $db->close();
    }
    
  ?>
</body>
</html>