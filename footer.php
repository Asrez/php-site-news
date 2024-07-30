<?php
if (!defined("LOAD")) exit();
$footer=getSetting("footer");
?>
<footer class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 fooret_text text-center">
                <p>
                    تمامی حقوق این سایت برای <?= $footer['value_setting'] ?> محفوظ است.
                    <br>
                    Copyright © 2024 asrez, All rights reserved
                </p>
            </div>
            <div class="col-12 text-center">
                <div class="poweredby">
                    <a href="<?= $footer['link'] ?>" target="_blank">
                        طراحی و تولید: <?= $footer['value_setting'] ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>