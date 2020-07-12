<!DOCTYPE html>
<html>

<head>
    <title>CONTACTO</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=Lato&family=Raleway&family=Roboto&display=swap');

        * {
            margin: 0;
            padding: 0;
        }

        .content {
            width: 60%;
            margin: auto;
            margin-top: 20px;
        }

        .title,
        .message {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .title {
            background-color: #007c91;
            text-align: center;
            font-family: 'Julius Sans One', sans-serif;
            color: #ffffff;
            font-size: 2rem;
        }

        .message {
            border: 1px solid #007c91;
            font-family: 'Raleway', sans-serif;
            font-size: 1.2rem;
        }

        .remitente,
        .asunto,
        .contenido {
            padding: 10px;
            box-sizing: border-box;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <p>
                {{ $data['name'] }}
            </p>
        </div>
        <div class="message">


            <p class="remitente">
                <strong>
                    Remitente:
                </strong>
                {{ $data['email'] }}
            </p>

            <p class="asunto">
                <strong>
                    Telefono:
                </strong>
                {{ $data['phone'] }}
            </p>

            <p class="contenido">
                <strong>
                    Mensaje:
                </strong>
                {{ $data['comment'] }}
            </p>

        </div>
    </div>

    </body>
</html>
