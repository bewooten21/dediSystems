<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1"
                aria-expanded="false"
                >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=home">DeDi</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php?action=home">Home</a></li>
                <li><a href="index.php?action=forum">Forum</a></li>
                <li><a href="index.php?action=shop">Rent PA</a></li>

                <li class="dropdown">
                    <a
                        href="#"
                        class="dropdown-toggle"
                        data-toggle="dropdown"
                        role="button"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >About<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href='index.php?action=contact'>Contact</a></li>
                        <li><a href='index.php?action=aboutUs'>About Us</a></li>
                        <li><a href="#">Consulting</a></li>
                    </ul>
                </li>
                <?php if (isset($_SESSION['user'])) { ?>
                    <?php if ($_SESSION['user']->getRole() === "admin" || $_SESSION['user']->getRole() === "owner") { ?>
                        <li class="dropdown">
                            <a
                                href="#"
                                class="dropdown-toggle"
                                data-toggle="dropdown"
                                role="button"
                                aria-haspopup="true"
                                aria-expanded="false"
                                ><span ></span>Admin<span class="caret"></span
                                ></a>
                            <ul class="dropdown-menu">
                                <li><a href='index.php?action=viewAccount'>Account</a></li>
                                <li><a href="index.php?action=viewProducts">View Products</a></li>
                                <li><a href="index.php?action=viewUsers">View Users</a></li>
                                <li><a href="index.php?action=viewUserComments">View Messages</a></li>
                            </ul>
                        <?php } ?></li>
                <?php } ?>

                <?php if (isset($_SESSION['user'])) { ?>
                    <li class="dropdown">
                        <a
                            href="#"
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            role="button"
                            aria-haspopup="true"
                            aria-expanded="false"
                            ><span class="glyphicon glyphicon-user"></span><?php echo " " . $_SESSION['user']->getUsername(); ?><span class="caret"></span
                            ></a>
                        <ul class="dropdown-menu">
                            <li><a href='index.php?action=viewAccount'>Account</a></li>
                            <?php if (isset($_SESSION['user'])) { ?>
                                <li><a href='index.php?action=logout'>Logout</a><?php } ?></li>
                        </ul>
                    <?php } ?></li>
                <?php if (!isset($_SESSION['user'])) { ?>
                    <li><a href='index.php?action=login'>Login</a><?php } ?></li>
                    <li><a href="index.php?action=viewCart"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    

            </ul>
        </div>
    </div>
</nav>