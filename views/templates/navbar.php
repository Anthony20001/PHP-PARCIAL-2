<?php require_once "utils/security.php"?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Navbar</a>

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php" aria-current="page">Home<span class="visually-hidden">(current)</span></a>
                </li>

                <?php if(isset($_SESSION["user"])){?>
                    <li class="nav-item">
                        <?php $controller = Security::encode("Product"); $method = Security::encode("search"); ?>
                        <a class="nav-link" href="<?php echo "index.php?c=".$controller."&m=".$method;?>">Productos</a>
                    </li>
                <?php }?>


                <?php if(isset($_SESSION["user"])){?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Comentario</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <?php $controller = Security::encode("Contact"); $method = Security::encode("create"); ?>
                        <a class="dropdown-item" href="<?php echo "index.php?c=".$controller."&m=".$method;?>">Crear</a>
                        <a class="dropdown-item" href="#">Ver</a>
                    </div>
                </li>
                <?php }?>

            </ul>

            <!--<?php if(isset($_SESSION["user"])){?>
            <form class="d-flex my-2 my-lg-0">
                <input class="form-control me-sm-2" type="text" placeholder="Buscar productos">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <?php }?>-->

            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <?php if(isset($_SESSION["user"])){?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["name"]?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="">Editar perfil</a>
                        <hr class="dropdown-divider">
                        <?php $controller = Security::encode("User"); $method = Security::encode("signoff"); ?>
                        <a class="dropdown-item" href="<?php echo "index.php?c=".$controller."&m=".$method;?>">Cerrar sesi??n</a>
                    </div>
                </li>

                <?php }else{?>
                <li class="nav-item">
                <?php $controller = Security::encode("User"); $method = Security::encode("login"); ?>
                    <a class="nav-link" href="<?php echo "index.php?c=".$controller."&m=".$method;?>" tabindex="-1">Login</a>
                </li>
                <?php }?>
            </ul>
        </div>
  </div>
</nav>
