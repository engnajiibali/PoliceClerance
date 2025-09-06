<div id="sidebar-menu" class="sidebar-menu">
	<br>
<ul>
<li class="menu-title"><span>MAIN MENU</span></li>
<li>
<ul>
<li >
<a href="{{asset('dashboard/')}}">
<i class="ti ti-smart-home"></i><span>Dashboard</span>
</a>

</li>
@foreach(getMenu() as $menu)
@php
// Get the allowed submenus (an array of submenu IDs)
$allowedSubmenus = allowedSubmenus(Session()->get('userRole'));

// Filter submenus by allowed submenus
$submenus = $menu->subMenus->filter(function($subMenu) use ($allowedSubmenus) {
return in_array($subMenu->id, $allowedSubmenus);
});
@endphp

<!-- Only display the menu if there are valid submenus -->
@if($submenus->isNotEmpty())




<li class="submenu">
<a href="javascript:void(0);">
<i class="{{ $menu->icon }}"></i><span>{{ $menu->menu_name }}</span>
<span class="menu-arrow"></span>
</a>
<ul>

@foreach($submenus as $subMenu)
<li>
<a href="{{ asset($subMenu->url) }}" target="{{ $subMenu->target }}" title="{{ $subMenu->title }}">
<i class="fa fa-circle-o"></i> {{ $subMenu->icon . ' ' . $subMenu->name_sub_menu }}
</a>
</li>
@endforeach


</ul>
</li>
@endif
@endforeach

</ul>

</ul>
</div>