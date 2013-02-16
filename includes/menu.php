<div id="tab-bar">
    <div id="tab-bar-1" <?php if (isset($_GET['page']) and $_GET['page'] == 1) { ?> class="tab-bar-active" <?php } else { ?> class="tab-bar-inactive" <?php } ?>  >
        Register a domain
        <?php if (isset($_GET['page']) and $_GET['page'] == 1) { ?> <img src="images/green-leaf.png" class="adjusted"/> <?php } else { ?>  <img src="images/blue-leaf.png" class="adjusted"/> <?php } ?>

    </div>
    <div id="tab-bar-2" <?php if (isset($_GET['page']) and $_GET['page'] == 2) { ?> class="tab-bar-active" <?php } else { ?> class="tab-bar-inactive" <?php } ?>>
        Select Hosting Plan
        <a href="index.php?page=1"> <?php if (isset($_GET['page']) and $_GET['page'] == 2) { ?> <img src="images/green-leaf.png" class="adjusted"/> <?php } else { ?>  <img src="images/blue-leaf.png" class="adjusted"/> <?php } ?></a>

    </div>
    <div id="tab-bar-3" <?php if (isset($_GET['page']) and $_GET['page'] == 3) { ?> class="tab-bar-active" <?php } else { ?> class="tab-bar-inactive" <?php } ?> >
        Checkout
        <a href="index.php?page=1"> <?php if (isset($_GET['page']) and $_GET['page'] == 3) { ?> <img src="images/green-leaf.png" class="adjusted"/> <?php } else { ?>  <img src="images/blue-leaf.png" class="adjusted"/> <?php } ?></a>

    </div>
    <div id="tab-bar-4" <?php if (isset($_GET['page']) and $_GET['page'] == 4) { ?> class="tab-bar-active" <?php } else { ?> class="tab-bar-inactive" <?php } ?> >
        Congrats
        <a href="index.php?page=1"> <?php if (isset($_GET['page']) and $_GET['page'] == 4) { ?> <img src="images/green-leaf.png" class="adjusted"/> <?php } else { ?>  <img src="images/blue-leaf.png" class="adjusted"/> <?php } ?></a>

    </div>
</div>