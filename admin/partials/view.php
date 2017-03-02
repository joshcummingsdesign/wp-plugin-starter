<div class="wrap">
    <h1><?= $heading ?></h1>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form action="options.php" method="post">
                    <?php settings_fields($group); ?>
                    <?= $fields ?>
                    <p><input class="button-primary" type="submit" value="Submit"></p>
                </form>
            </div>
        </div>
        <br class="clear">
    </div>
</div>
