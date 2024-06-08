<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Super Admin - Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(to right, #51A3A3, #75485E);
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
            transition: padding-bottom 0.3s ease; /* Smooth transition for padding */
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
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        button:hover {
            background-color: #75485E;
            box-shadow: 0 4px 10px rgba(67, 127, 127, 0.2);
        }

        button a {
            text-decoration: none;
            color: #ffffff;
            display: block;
            height: 100%;
            width: 100%;
            line-height: 40px;
        }

        button a:hover {
            color: #ffffff;
        }

        label {
            font-size: 14px;
            color: #444;
            margin-bottom: 5px;
            display: block;
            text-align: left;
            padding-right: 240px; 
        }

        #updation {
            margin-top: 20px;
            display: none; /* Initially hide the updation fields */
        }
    </style>
    <script>
        function showUpdateFields() {
            var updateOption = document.getElementById("updates").value;
            var updationDiv = document.getElementById("updation");
            var fieldset = document.querySelector("fieldset");

            updationDiv.innerHTML = "";

            if (updateOption == "uemail") {
                updationDiv.innerHTML = `
                    <label for="old_email">Old Email</label>
                    <input required type="email" id="old_email" name="old_email" placeholder="Enter your old email" style="width:100%;height:35px;margin-bottom:10px;">
                    <label for="new_email">New Email</label>
                    <input required type="email" id="new_email" name="new_email" placeholder="Enter your new email" style="width:100%;height:35px;">
                `;
            } else if (updateOption == "upwd") {
                updationDiv.innerHTML = `
                    <label for="email">Email</label>
                    <input required type="email" id="email" name="email" placeholder="Enter your email" style="width:100%;height:35px;margin-bottom:10px;">
                    <label for="new_pwd">New Password</label>
                    <input required type="password" id="new_pwd" name="new_pwd" placeholder="Enter your new password" style="width:100%;height:35px;">
                `;
            } else if (updateOption == "both") {
                updationDiv.innerHTML = `
                    <label for="old_email">Old Email</label>
                    <input required type="email" id="old_email" name="old_email" placeholder="Enter your old email" style="width:100%;height:35px;margin-bottom:10px;">
                    <label for="new_email">New Email</label>
                    <input required type="email" id="new_email" name="new_email" placeholder="Enter your new email" style="width:100%;height:35px;margin-bottom:10px;">
                    <label for="new_pwd">New Password</label>
                    <input required type="password" id="new_pwd" name="new_pwd" placeholder="Enter your new password" style="width:100%;height:35px;">
                `;
            }

            // Adjust fieldset padding dynamically based on updationDiv visibility
            if (updationDiv.innerHTML.trim() !== "") {
                fieldset.classList.add("expanded");
                fieldset.style.paddingBottom = "px";
                updationDiv.style.display = "block";
            } else {
                fieldset.classList.remove("expanded");
                fieldset.style.paddingBottom = "0px";
                updationDiv.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <form action="update.php" method="post">
        <fieldset class="fieldset">
            <div class="heading">SUPER ADMIN - UPDATE</div><br>
            <div class="container">
                <label for="roles">Roles</label>
                <select name="role" id="roles" required>
                    <option disabled selected value>Select an option</option>
                    <option value="user">User</option>
                    <option value="manager">Manager</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                </select><br>
                <label for="updates">Updation</label>
                <select name="update" id="updates" onchange="showUpdateFields()" required>
                    <option disabled selected value>Select an option</option>
                    <option value="uemail">Email Only</option>
                    <option value="upwd">Password only</option>
                    <option value="both">Both</option>
                </select><br>
                <div id="updation" ></div><br>
                <button><a href="http://localhost/InternshipAssignment/superadmin.php/" target="_parent">BACK</a></button><br><br>              
                <button type="submit" name="submit">SUBMIT</button>
            </div>
        </fieldset>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $db = new mysqli("localhost", "root", "", "login");

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $role = $_POST['role'];
        $updateOption = $_POST['update'];

        if ($updateOption == 'uemail') {
            $oldEmail = $_POST['old_email'];
            $newEmail = $_POST['new_email'];

            $query = "SELECT * FROM sadmin WHERE email='$oldEmail'";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                $query = "UPDATE sadmin SET email='$newEmail' WHERE email='$oldEmail'";
                if ($db->query($query) === TRUE) {
                    echo "<script type='text/javascript'>alert('Email updated successfully.');</script>";
                } else {
                    echo "Error updating record: " . $db->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Old email not found.');</script>";
            }

        } elseif ($updateOption == 'upwd') {
            $email = $_POST['email'];
            $newPwd = $_POST['new_pwd'];

            $query = "SELECT * FROM sadmin WHERE email='$email'";
            $result = $db->query($query);

            if ($result->num_rows > 0) {
                $query = "UPDATE sadmin SET pwd='$newPwd' WHERE email='$email'";
                if ($db->query($query) === TRUE) {
                    echo "<script type='text/javascript'>alert('Password updated successfully.');</script>";
                } else {
                    echo "Error updating record: " . $db->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Email not found.');</script>";
            }

        } elseif ($updateOption == 'both') {
            $oldEmail = $_POST['old_email'];
            $newEmail = $_POST['new_email'];
            $newPwd= $_POST['new_pwd'];
            $query = "SELECT * FROM sadmin WHERE email='$oldEmail'";
            $result = $db->query($query);
    
            if ($result->num_rows > 0) {
                $query = "UPDATE sadmin SET email='$newEmail', pwd='$newPwd' WHERE email='$oldEmail'";
                if ($db->query($query) === TRUE) {
                    echo "<script type='text/javascript'>alert('Email and password updated successfully.');</script>";
                } else {
                    echo "Error updating record: " . $db->error;
                }
            } else {
                echo "<script type='text/javascript'>alert('Old email not found.');</script>";
            }
        }
    
        $db->close();
    }
    ?>
</body>
</html>    
