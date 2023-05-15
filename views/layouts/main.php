<?php

use app\core\Application;


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            
            
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>

                </ul>

                <?php if( Application::isGuest()): ?>
                <ul class="navbar-nav ml-auto left">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">register</a>
                    </li>

                </ul>
                <?php else:?>

                <ul class="navbar-nav ml-auto " >
                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page"
                            href="/profile"><?php echo Application::$app->user->get_display_name()?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/logout">Logout</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/profile">Profile</a>
                        
                    </li>

                </ul>

                <?php endif;?>

         
        </div>
    </nav>

    <div class="container">
        <?php

 if(Application::$app->session->getFlash('sucess')):?>
        <div class="alert alert-success" role="alert">

            <?php echo Application::$app->session->getFlash('sucess'); ?>

        </div>
        <?php endif;?>

        {{content}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>