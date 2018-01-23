<?php require_once 'session.php'; ?>
<nav id="custom-bootstrap-menu" class="navbar-default">
    <div class="container-fluid">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li id="home" class="active"><a href="index.php">Hasil</a></li>
                <li id="input"><a href="#" data-toggle="pill" onclick="qc.change_page('input');">Update</a></li>
                <?php
                if (isset($_SESSION['user_level'])) {
                    if ((int) $_SESSION['user_level'] == 1) {
                        ?>
                        <li id="user"><a href="#" data-toggle="pill" onclick="qc.change_page('user');">User</a></li>
                        <?php
                    }
                }
                ?>
                <li><a href="#" onclick="dialogPassword();">Update Password</a></li>
                <li id="logout"><a href="#" onclick="logout();">Logout</a></li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                <li style="color:white;">
                    <table>
                        <tr><td>User Name</td><td>:</td><td><?php echo $_SESSION['user_name']; ?></td></tr>
                        <tr><td>Jajaran</td><td>:</td><td><?php echo $_SESSION['jajaran']; ?></td></tr>
                    </table>
                </li>

            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>