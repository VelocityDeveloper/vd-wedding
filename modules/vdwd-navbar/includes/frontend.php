<?php
$menus = $settings->menus;
?>
<div class="vdwd-navbar vdwd-navbar-<?php echo $id; ?>">
    <?php if ($menus) : ?>
        <nav class="navbar navbar-expand overflow-x-auto py-0">
            <ul class="navbar-nav mx-auto">
                <?php foreach ($menus as $key => $menu) : ?>
                    <li class="nav-item">
                        <a class="nav-link border-end text-center py-1 py-md-2 px-2 px-md-4" href="<?php echo $menu->link; ?>">
                            <?php if ($menu->icon) : ?>
                                <div class="link-icon px-2 px-md-1">
                                    <i class="<?php echo $menu->icon; ?>"></i>
                                </div>
                            <?php endif; ?>
                            <?php if ($menu->title) : ?>
                                <div class="link-title">
                                    <?php echo $menu->title; ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>