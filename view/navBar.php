

<nav class="navbar navbar-expand-lg navbar-danger bg-danger">
    <a class="navbar-brand" href="accueil" style="color : white !important;">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="accueil" style="color : white !important;">Accueil <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <?php
        if (isset($_SESSION['co'])) {
           ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="profil" style="color : white !important;"><i class="fas fa-address-book"></i> Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="control_deco" style="color : white !important;"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                </li>
            </ul>
            <?php
        } else {
           ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="signIn"  style="color : white !important;"> <i class="fas fa-users"></i> Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signUp"  style="color : white !important;"><i class="fas fa-newspaper"></i> S'inscrire</a>
                </li>
            </ul>
            <?php
        }

        ?>

    </div>
</nav>
<br>
