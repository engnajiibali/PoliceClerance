<div id="sidebar-menu" class="sidebar-menu">
	<br>
<ul>
<li class="menu-title"><span>MAIN MENU</span></li>
<li>
<ul>
<li >
<a href="<?php echo e(asset('dashboard/')); ?>">
<i class="ti ti-smart-home"></i><span>Dashboard</span>
</a>

</li>
<?php $__currentLoopData = getMenu(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
// Get the allowed submenus (an array of submenu IDs)
$allowedSubmenus = allowedSubmenus(Session()->get('userRole'));

// Filter submenus by allowed submenus
$submenus = $menu->subMenus->filter(function($subMenu) use ($allowedSubmenus) {
return in_array($subMenu->id, $allowedSubmenus);
});
?>

<!-- Only display the menu if there are valid submenus -->
<?php if($submenus->isNotEmpty()): ?>




<li class="submenu">
<a href="javascript:void(0);">
<i class="<?php echo e($menu->icon); ?>"></i><span><?php echo e($menu->menu_name); ?></span>
<span class="menu-arrow"></span>
</a>
<ul>

<?php $__currentLoopData = $submenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
<a href="<?php echo e(asset($subMenu->url)); ?>" target="<?php echo e($subMenu->target); ?>" title="<?php echo e($subMenu->title); ?>">
<i class="fa fa-circle-o"></i> <?php echo e($subMenu->icon . ' ' . $subMenu->name_sub_menu); ?>

</a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


</ul>
</li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>

</ul>
</div><?php /**PATH C:\xampp\htdocs\gmpf\resources\views/include/sidebar.blade.php ENDPATH**/ ?>