<nav>
    <div class='nav-left'>
        <a href="/53web02-0310">Logo</a>
    </div>
    <div class='nav-right'>
    <ul>
        <?php
        if($_SESSION['user']['role'] === '管理員'){ ?>
        <li><a href="/53web02-0310/user/users.php">會員管理</a></li>
        <li><a href="/53web02-0310/shopMod.html">上架商品</a></li>
        <?php } ?>
        <li><a href="/53web02-0310/logout.php">登出</a></li>
    </ul>
    </div>
</nav>