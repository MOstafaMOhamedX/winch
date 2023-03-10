<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700");

        * {
            font-family: "Open Sans", sans-serif;
            font-weight: 400;
        }

        body {
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        img {
            max-width: 100%;
        }

        .container {
            height: 100vh;
            width: 100%;
            background-image: url("http://html.medhati.com/trendy/assets/img/slider2.jpg");
            background-size: cover;
            background-position: 50% 0%;
            /*overflow: hidden;*/
        }

        .wrapper {
            width: 100%;
            height: 100%;
            opacity: 0.7;
            background: linear-gradient(-55deg, transparent 25%, #16181E 25%, #16181E 75%, transparent 75%, transparent 100%);
            /*background: linear-gradient(-210deg, transparent 0%, #16181E 0%, #16181E 70%, transparent 50%, transparent 100%);*/
            transition: all 0.5s cubic-bezier(0.67, 0, 0.3, 1) 1s;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .content {
            /*transform:rotate(50deg);*/
            padding: 1rem;
            color: white;
        }

        .content h1 {
            font-size: 3rem;
            color: white;
        }

        .content p {
            font-size: 1.1rem;
            color: white;
        }

        .content a {
            color: white;
            display: inline-block;
            padding: 2.1% 4%;
            overflow: hidden;
            border-radius: 0;
            text-decoration: none;
        }

        .btn1 {
            border: 1px solid white;
            transition: 0.2s ease-in-out;
        }

        .btn1:hover {
            border: 1px solid white;
            background-color: white;
            color: black;
            transition: 0.2s ease-in-out;
        }

        .btn2 {
            margin-left: 3%;
            background: linear-gradient(to right, #252AFF 0%, #25FFED 100%);
            border-image: linear-gradient(to bottom right, #252AFF 0%, #25FFED 100%);
            border-image-slice: 1;
            border-width: 1px;
            border-style: solid;
            transition: 0.2s ease-in-out;
        }

        .btn2:hover {
            background: none;
            border-image: linear-gradient(to bottom right, #252AFF 0%, #25FFED 100%);
            border-image-slice: 1;
            border-width: 1px;
            border-style: solid;
            transition: 0.2s ease-in-out;
        }

        @media screen and (max-width: 355px) {
            .content {
                /*transform:rotate(50deg);*/
                padding: 1rem 1.4rem;
            }

            .content h1 {
                font-size: 2.5rem;
                /*margin: 5px 0px;*/
                /*line-height: 1.2;*/
            }

            .wrapper {
                background: linear-gradient(-210deg, transparent 0%, #16181E 0%, #16181E 70%, transparent 50%, transparent 100%);
                transition: all 0.5s cubic-bezier(0.67, 0, 0.3, 1) 1s;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                text-align: left;
            }
        }

        @media screen and (min-width: 356px) and (max-width: 650px) {
            .content {
                /*transform:rotate(50deg);*/
                padding: 1rem 1.4rem;
            }

            .wrapper {
                background: linear-gradient(-210deg, transparent 0%, #16181E 0%, #16181E 70%, transparent 50%, transparent 100%);
                transition: all 0.5s cubic-bezier(0.67, 0, 0.3, 1) 1s;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                text-align: left;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <div class="content">
                <h1>We're Coming Soon</h1>
                <p>Perfect and awesome to present your future product or service.<br>Hooking audience attention is all in the opener.</p>
            </div>
        </div>
    </div>
</body>
</html>
