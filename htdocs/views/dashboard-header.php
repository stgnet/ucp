<nav id="nav-bar-background" class="navbar navbar-default navbar-fixed-top">
	<div id="global-message-container">
		<div id="global-message"></div>
	</div>

	<div id="add_new_dashboard" class="add-dashboard">
		<button class="btn btn-xs btn-primary btn-outline" type="button" data-toggle="modal" data-target="#add_dashboard">
			Add new
		</button>
	</div>

	<ul class="nav nav-tabs dashboards" role="tablist" id="all_dashboards">
		<?php foreach($user_dashboards as $dashboard_info) { ?>
			<li class="<?php echo ($dashboard_info["id"] == $active_dashboard) ? 'active' : ''?> menu-order dashboard-menu" data-id="<?php echo $dashboard_info["id"]?>">
				<a data-pjax href="?dashboard=<?php echo $dashboard_info["id"]?>"><?php echo $dashboard_info["name"]?> <div class="remove-dashboard" data-dashboard_id="<?php echo $dashboard_info["id"]?>"><i class="fa fa-times" aria-hidden="true"></i></div></a>
			</li>
		<?php } ?>
	</ul>
</nav>

<!-- left navbar -->
<nav class="navbar navbar-inverse navbar-fixed-left">
	<ul class="nav navbar-nav">
		<li class="add-small-widget" data-toggle="modal" data-target="#add_small_widget"><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
		<li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a></li>
		<?php foreach($navItems as $button) {?>
			<li><a href="#" class="custom-widgets" data-module="<?php echo $button['rawname']?>"><i class="<?php echo preg_match("/^fa-/",$button['icon']) ? "fa ". $button['icon'] : $button['icon']?>" aria-hidden="true"></i></a></li>
			<!--<div id="nav-btn-<?php echo $button['rawname']?>" class="module-container <?php echo (!empty($button['hide']) ? 'hidden' : '')?>" data-module="<?php echo $button['rawname']?>">
				<div class="icon">
					<i class="<?php /*echo preg_match("/^fa-/",$button['icon']) ? "fa ". $button['icon'] : $button['icon']?>"></i>
					<?php echo !empty($button['badge']) ? '<span class="badge">'.$button['badge'].'</span>' : '<span class="badge" style="display:none">0</span>'?>
				</div>
				<?php echo isset($button['extra']) ? $button['extra'] : ""*/ ?>
			</div>-->
		<?php } ?>
		<li><a href="?logout"><i class="fa fa-sign-out fa-rotate-180" aria-hidden="true"></i></a></li>
	</ul>
</nav>

<div class="side-menu-widgets-container">
	<?php foreach($navItems as $module => $item) { ?>
		<div class="widget-extra-menu" id="menu_<?php echo $item['rawname']?>" data-module="<?php echo $item['rawname']?>">
			<a href="javascript:void(0)" class="closebtn" onclick="close_extra_widget_menu()"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
			<?php if (!empty($item['menu']['html'])) { ?>
				<ul>
					<?php echo $item['menu']['html'] ?>
				</ul>
			<?php } ?>
		</div>
	<?php } ?>
</div>


<div class="container-fluid main-content-object">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 main-content-column">
			<!--<div class="add-widget" data-toggle="modal" data-target="#add_widget">
				<i class="fa fa-4x fa-plus-circle" aria-hidden="true"></i>
			</div>-->
			<div id="dashboard-content">