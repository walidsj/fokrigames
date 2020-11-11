<?php

$menu_item = $this->db->from('app_menu')
   ->get()
   ->result();

?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
   <ul class="nav">
      <?php foreach ($menu_item as $itemmenu) : ?>
         <?php if ($itemmenu->menu_level == 1) : ?>
            <?php if ($itemmenu->menu_haschild == 0) : ?>
               <li class="nav-item">
                  <a class="nav-link" href="<?= site_url($itemmenu->menu_link); ?>">
                     <i class="<?= $itemmenu->menu_icon; ?> menu-icon"></i>
                     <span class="menu-title"><?= $itemmenu->menu_nama; ?></span>
                  </a>
               </li>
            <?php elseif ($itemmenu->menu_haschild == 1) : ?>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#menu<?= $itemmenu->menu_id; ?>" aria-expanded="false" aria-controls="menu<?= $itemmenu->menu_id; ?>">
                     <i class="<?= $itemmenu->menu_icon; ?> menu-icon"></i>
                     <span class="menu-title"><?= $itemmenu->menu_nama; ?></span>
                     <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="menu<?= $itemmenu->menu_id; ?>">
                     <ul class="nav flex-column sub-menu">
                        <?php foreach ($menu_item as $itemsubmenu) : ?>
                           <?php if ($itemsubmenu->menu_level == 2) : ?>
                              <?php if ($itemsubmenu->menu_parrent == $itemmenu->menu_id) : ?>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?= (strpos($itemsubmenu->menu_link, 'https://') !== false || strpos($itemsubmenu->menu_link, 'http://') !== false) ? $itemsubmenu->menu_link : site_url($itemsubmenu->menu_link); ?>"><?= $itemsubmenu->menu_nama; ?></a>
                                 </li>
                              <?php endif; ?>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               </li>
            <?php endif; ?>
         <?php endif; ?>
      <?php endforeach; ?>
   </ul>
</nav>