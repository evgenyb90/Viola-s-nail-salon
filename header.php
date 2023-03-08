<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Viola\'s nail salon';?></title>
    <link rel="icon" type="image/x-icon" href="./img/nail-polish-64.png">
    <link rel="stylesheet" href="./css/style.css">
    
</head>
<body>
    <header class="header">
        <div class="container flex header__flex">
            <a class="header__logo flex" href="index.php">
                <img src="img/logo.png" alt="logo">
                Viola's nail salon
            </a>
            <div aria-roledescription="button" aria-label="open navigation" class="nav-menu-open">
                <span class="nav-menu-open__span"></span>
                <span class="nav-menu-open__span"></span>
                <span class="nav-menu-open__span"></span>
            </div>
            <nav class="header__nav">
                <div class="nav-menu-close">
                    <span class="nav-menu-close__span"></span>
                    <span class="nav-menu-close__span"></span>
                </div>
                <ul class="flex header__list">
                    <li class="header__item">
                        <a href="galleria.php">GALLERIA</a>
                    </li>
                    <li class="header__item">
                        <a href="timmi.php">TIIMI</a>
                    </li>
                    <li class="header__item">
                        <a href="hinnasto.php">HINNASTO</a>
                    </li>
                    <li class="header__item">
                        <a href="./login/login.php">VARAA AIKA</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    
    

