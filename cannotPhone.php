<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cannot Phone</title>
   </head>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .notFound {
        display: block;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 20px;
    }

    p {
        font-size: 1.5rem;
        color: #555;
    }
    .phone {
        display: none;
        position: absolute;
        z-index: 1000;
        height: 850px;
        width: 100%;
        top: 0;
        left: 0;
    }

    @media (max-width:567px) {
        .notFound {
            display: none;
        }

        .phone {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .phone img {
            width: 12rem;
            height: auto;
        }

        .phone p {
            font: 700 18px/1.5 sans-serif;
            text-align: center;
            padding: 12px;
        }
    }
</style>

<body>
    <div class="phone">
        <img src="img/phone.png" alt="...">
        <p>We're really sorry, This site not available on phone. Please Use a Bigger screen size such as Laptop/ Pc.</p>
    </div>
    <div class="notFound">
        <h1>404 - Page Not Found</h1>
        <p>The page you are looking for might have been removed or is temporarily unavailable.</p>

        <p>Redirecting to <a href="home.php">Home Page</a></p>
    </div>

</body>

</html>