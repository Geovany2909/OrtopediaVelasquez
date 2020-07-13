<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template - shit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #ffffff;
        }

        .content {
            width: 60%;
            margin: auto;
            margin-top: 20px;
            border-radius: 3px;
            border:rgb(0, 54, 47) 4px solid;
            border-radius: 2%;
        }

        .title,
        .message {
            padding: 10px;
            box-sizing: border-box;
        }

        .title {
            width: 100%;
            background-color: rgb(17, 165, 158);
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: #ffffff;
            font-size: 1.2rem;
        }

        .message {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1rem;
            background-color: rgb(247, 245, 245);
        }

        .remitente,
        .asunto,
        .contenido {
            padding: 15px;
            box-sizing: border-box;
        }

        .footer {
            position: relative;
            left: 0;
            bottom: 0;
            margin-top: 10%;
            margin-bottom: 0%;
            width: 100%;
            height: 100%;
            background-color: rgb(17, 165, 158);
            color: white;
            text-align: center;
            display: block;
        }
        .message, .remitente, .asunto {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <img align="center" alt=""
                src="https://mcusercontent.com/49b329ec2f0344be23d09f081/images/14bdbaa9-83a7-45bd-8f19-f25e9a76009a.jpg"
                width="122.58999999999999" style="max-width:299px; padding-bottom: 0; display: inline !important;
                vertical-align: bottom; border-radius: 18%;" class="mcnImage">
        </div>

        <div class="message">
            <p class="remitente">
                <strong>
                    Nombre:
                </strong>
                Geovanni Carmona
            </p>

            <p class="remitente">
                <strong>
                    Remitente:
                </strong>
                <a href="">geovanni@gmail.com</a>
            </p>

            <p class="asunto">
                <strong>
                    Asunto:
                </strong>
                Consulta
            </p>

            <p class="contenido">
                <strong>
                    Mensaje:
                </strong>
                Quiero quitarle la patita a mi perro para hacer tacos
            </p>
            <div class="footer">
                <br>
                <h3>Ortopedia Velasquez</h3>
                <strong>Copyright © Todos los derechos reservados</strong>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
