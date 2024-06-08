
<html>
    <head>
        <title>Super Admin</title>
        <meta name="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <style>
            body {
            background: linear-gradient(to right, #51A3A3, #75485E); /* Three-layer Gradient Background */
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
            padding: 60px;
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .heading {
            font-size: 32px;
            text-align: center;
            margin-bottom: 20px;
            color: #51A3A3;
        }
        .button {
            margin-top: 20px;
        }

        button {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
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
            font-weight: 5px;
            color: #fff;
            display: block;
            height: 100%;
            width: 100%;
            line-height: 40px;
        }

        button a:hover {
            color: #fff;
        }
        </style>

    </head>
    <body>
        <fieldset>
        <div class="heading">SUPER ADMIN</div><br>
        <div class="button">
        <button> <a href="http://localhost/InternshipAssignment/add.php/" target="_parent">ADD</a></button>
        <button> <a href="http://localhost/InternshipAssignment/delete.php/" target="_parent">DELETE</a></button>
        <button> <a href="http://localhost/InternshipAssignment/update.php/" target="_parent">UPDATE</a></button>
        </div>
        </fieldset>
    </body>
</html>