<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./components/styles_gbl.css">
    <title>404</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h1 {
            font-family: "SUSE", system-ui;
            font-size: 70px;
            margin: 10px;
        }

        p {
            font-family: "Montserrat", system-ui;
            padding: 10px;
            font-size: 20px;
        }

        .error-404 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            font-family: "SUSE", system-ui;
        }

        a:hover {
            outline: 3px solid black;
        }
    </style>
</head>
<body>
    <div class="error-404">
        <h1>404</h1>
        <p>You've encountered an error where we can't provide you the page you're looking for... sorry...</p>
        <a href="./index.php">Back to home</a>
    </div>
</body>
</html>
