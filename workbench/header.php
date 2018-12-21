<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Language" content="UTF-8" />
        <meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		
        <link rel="shortcut icon" href="<?php echo getPathToStaticResource('/images/favicon.ico'); ?>" />
		
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/master.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/pro_dropdown.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/simpletree.css'); ?>" />
		
		<link rel="stylesheet" type="text/css" href="../assets/styles/salesforce-lightning-design-system.min.css" />
		
        <?php
			$myPage = getMyPage();
			$title = $myPage->showTitle ? ": " . $myPage->title : "";
			print "<title>Workbench$title</title>";
			
			print "<script type='text/javascript'>var getPathToStaticResource = " . getPathToStaticResourceAsJsFunction() . ";</script>";
		?>
        
		<script type="text/javascript" src="<?php echo getPathToStaticResource('/script/pro_dropdown.js'); ?>"></script>
	</head>
	<body>
	
	<div class="slds-context-bar">
				<div class="slds-context-bar__primary">
					<div class="slds-context-bar__item slds-context-bar__dropdown-trigger slds-dropdown-trigger slds-dropdown-trigger_click slds-no-hover">
						<!--div class="slds-context-bar__icon-action">
							<button class="slds-button slds-icon-waffle_container slds-context-bar__button" title="Description of the icon when needed">
								<span class="slds-icon-waffle">
									<span class="slds-r1"></span>
									<span class="slds-r2"></span>
									<span class="slds-r3"></span>
									<span class="slds-r4"></span>
									<span class="slds-r5"></span>
									<span class="slds-r6"></span>
									<span class="slds-r7"></span>
									<span class="slds-r8"></span>
									<span class="slds-r9"></span>
								</span>
								<span class="slds-assistive-text">Open App Launcher</span>
							</button>
						</div-->
						<span class="slds-context-bar__label-action slds-context-bar__app-name">
							<span class="slds-truncate" title="App Name">Workbench</span>
						</span>
					</div>
				</div>
				<nav class="slds-context-bar__secondary" role="navigation">
					<ul class="slds-grid">
						<li class="slds-context-bar__item slds-is-active">
							<a href="javascript:void(0);" class="slds-context-bar__label-action" title="Home">
								<span class="slds-assistive-text">Current Page:</span>
								<span class="slds-truncate" title="Home">Home</span>
							</a>
						</li>
						<li class="slds-context-bar__item slds-context-bar__dropdown-trigger slds-dropdown-trigger slds-dropdown-trigger_click">
							<a href="javascript:void(0);" class="slds-context-bar__label-action" title="Menu Item">
								<span class="slds-truncate" title="Menu Item">Menu Item</span>
							</a>
							<div class="slds-context-bar__icon-action slds-p-left_none">
								<button class="slds-button slds-button_icon slds-button_icon slds-context-bar__button" aria-haspopup="true" title="Open menu item submenu">
									<svg class="slds-button__icon" aria-hidden="true">
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="../assets/icons/utility-sprite/svg/symbols.svg#chevrondown" />
									</svg>
									<span class="slds-assistive-text">Open menu item submenu</span>
								</button>
							</div>
							<div class="slds-dropdown slds-dropdown_right">
								<ul class="slds-dropdown__list" role="menu">
									<li class="slds-dropdown__item" role="presentation">
										<a href="javascript:void(0);" role="menuitem" tabindex="-1">
											<span class="slds-truncate" title="Main action">
												<svg class="slds-icon slds-icon_x-small slds-icon-text-default slds-m-right_x-small" aria-hidden="true">
													<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="../assets/icons/utility-sprite/svg/symbols.svg#add" />
												</svg>Main action</span>
										</a>
									</li>
									<li class="slds-dropdown__header slds-has-divider_top-space" role="separator">
										<span class="slds-text-title_caps">Menu header</span>
									</li>
									<li class="slds-dropdown__item" role="presentation">
										<a href="javascript:void(0);" role="menuitem" tabindex="-1">
											<span class="slds-truncate" title="Menu Item One">Menu Item One</span>
										</a>
									</li>
									<li class="slds-dropdown__item" role="presentation">
										<a href="javascript:void(0);" role="menuitem" tabindex="-1">
											<span class="slds-truncate" title="Menu Item Two">Menu Item Two</span>
										</a>
									</li>
									<li class="slds-dropdown__item" role="presentation">
										<a href="javascript:void(0);" role="menuitem" tabindex="-1">
											<span class="slds-truncate" title="Menu Item Three">Menu Item Three</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="slds-context-bar__item">
							<a href="javascript:void(0);" class="slds-context-bar__label-action" title="Menu Item">
								<span class="slds-truncate" title="Menu Item">Menu Item</span>
							</a>
						</li>
						<li class="slds-context-bar__item">
							<a href="javascript:void(0);" class="slds-context-bar__label-action" title="Menu Item">
								<span class="slds-truncate" title="Menu Item">Menu Item</span>
							</a>
						</li>
						<li class="slds-context-bar__item">
							<a href="javascript:void(0);" class="slds-context-bar__label-action" title="Menu Item">
								<span class="slds-truncate" title="Menu Item">Menu Item</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
				