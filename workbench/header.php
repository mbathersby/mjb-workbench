<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <head>
        <meta http-equiv="Content-Language" content="UTF-8" />
        <meta http-equiv="Content-Type" content="text/xhtml; charset=UTF-8" />
		
        <link rel="shortcut icon" href="<?php echo getPathToStaticResource('/images/favicon.ico'); ?>" />
		
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/master.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/pro_dropdown.css'); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/style/simpletree.css'); ?>" />
		
		<link rel="stylesheet" type="text/css" href="<?php echo getPathToStaticResource('/slds/assets/styles/salesforce-lightning-design-system.min.css'); ?>" />

		
        <?php
			$myPage = getMyPage();
			$title = $myPage->showTitle ? ": " . $myPage->title : "";
			print "<title>Workbench$title</title>";
			
			print "<script type='text/javascript'>var getPathToStaticResource = " . getPathToStaticResourceAsJsFunction() . ";</script>";
		?>
        
		<script type="text/javascript" src="<?php echo getPathToStaticResource('/script/pro_dropdown.js'); ?>"></script>
	</head>
	<body>
	
	<?php
			if (WorkbenchConfig::get()->isConfigured("displayLiveMaintenanceMessage")) {
				print "<div style='background-color: orange; width: 100%; padding: 2px; font-size: 8pt; font-weight: bold;'>" .
				"Workbench is currently undergoing maintenance. The service may be intermittently unavailable during this time.</div><br/>";
			}
			
			
			// if async SOQL UI is not set, do not display it in the menu
			if (!WorkbenchConfig::get()->value("allowAsyncSoqlUI"))  {
				$asyncSOQLpage = $GLOBALS["MENUS"]['Queries']['asyncSOQL.php'];
				$asyncSOQLpage->onNavBar = false;
			}
			
			// If the API version is not correct, do not display Async SOQL in the menu
			if (WorkbenchContext::isEstablished() && !WorkbenchContext::get()->isApiVersionAtLeast(36.0)) {
				$asyncSOQLpage = $GLOBALS["MENUS"]['Queries']['asyncSOQL.php'];
				$asyncSOQLpage->onNavBar = false;
			}
			
			//check for latest version
			function strip_seps($haystack) {
				foreach (array(' ', '_', '-') as $n) {
					$haystack = str_replace($n, "", $haystack);
				}
				return $haystack;
			}
			
			if (WorkbenchConfig::get()->value("checkForLatestVersion") && extension_loaded('curl') && (isset($_GET['autoLogin']) || 'login.php'==basename($_SERVER['PHP_SELF']))) {
				try {
					$ch = curl_init();
					curl_setopt ($ch, CURLOPT_URL, 'https://api.github.com/repos/ryanbrainard/forceworkbench/tags');
					curl_setopt ($ch, CURLOPT_USERAGENT, getWorkbenchUserAgent());
					curl_setopt($ch, CURLOPT_TIMEOUT, 2);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					$tagsResponse = curl_exec($ch);
					$info = curl_getinfo($ch);
					curl_close($ch);
					if ($tagsResponse === false || $info['http_code'] != 200) {
						throw new Exception("Could not access GitHub tags");
					}
					
					$tags = json_decode($tagsResponse);
					
					$betaTagNames = array();
					$gaTagNames = array();
					foreach ($tags as $tag) {
						if (preg_match('/^[0-9]+.[0-9]+/',$tag->name) === 0) {
							continue;
							} else if (stristr($tag->name, 'beta') ) {
							$betaTagNames[] = $tag->name;
							} else {
							$gaTagNames[] = $tag->name;
						}
					}
					rsort($betaTagNames);
					rsort($gaTagNames);
					
					$latestBetaVersion = strip_seps($betaTagNames[0]);
					$latestGaVersion = strip_seps($gaTagNames[0]);
					$currentVersion = strip_seps($GLOBALS["WORKBENCH_VERSION"]);
					
					if (stristr($currentVersion, 'beta') && !stristr($latestBetaVersion, $latestGaVersion)) {
						$latestChannelVersion = $latestBetaVersion;
						} else {
						$latestChannelVersion = $latestGaVersion;
					}
					
					if ($latestChannelVersion != $currentVersion) {
						print "<div style='background-color: #EAE9E4; width: 100%; padding: 2px;'>" .
						"<a href='https://github.com/ryanbrainard/forceworkbench/tags' target='_blank' " .
                        "style='font-size: 8pt; font-weight: bold; color: #0046ad;'>" .
                        "A newer version of Workbench is available for download</a>" .
						"</div><br/>";
					}
					} catch (Exception $e) {
					//do nothing
				}
			}
		?>
	
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
						<?php
							foreach ($GLOBALS["MENUS"] as $menu => $pages) {
								if (isReadOnlyMode() && $menu == "Data") { //special-case for Data menu, since all read-only
									continue;
								}
								//$menuLabel = ($menu == "WORKBENCH") ? "&nbsp;<img src='" . getPathToStaticResource('/images/acn_white.png') . "' style='height: 32px; width: 140px;'/>" : strtolower($menu);
								
								print "<li class=\"slds-context-bar__item slds-is-active\">
											<a href=\"javascript:void(0);\" class=\"slds-context-bar__label-action\" title=\"Home\">
												<span class=\"slds-assistive-text\">Current Page:</span>
												<span class=\"slds-truncate\" title=\"Home\">Menu</span>
											</a>
											<div class=\"slds-context-bar__icon-action slds-p-left_none\">
												<button class=\"slds-button slds-button_icon slds-button_icon slds-context-bar__button\" aria-haspopup=\"true\" title=]\"Open menu item submenu\">
													<svg class=\"slds-button__icon\" aria-hidden=\"true\">
														<use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"" . getPathToStaticResource('/slds/assets/icons/utility-sprite/svg/symbols.svg#chevrondown') . "\" />
													</svg>
													<span class=\"slds-assistive-text\">Open menu item submenu</span>
												</button>
											</div>
										</li>";
										
								/*foreach ($pages as $href => $page) {
									if (!$page->onNavBar || (!isLoggedIn() && $page->requiresSfdcSession) || (isLoggedIn() && $page->title == 'Login') || (!$page->isReadOnly && isReadOnlyMode())) {
										continue;
									}
									print "<li><a href='$href' onmouseover=\"Tip('$page->desc')\" target=\"" . $page->window . "\">$page->title</a></li>\n";
								}
								print "</ul></li>";
								
								if(!isLoggedIn() || !termsOk()) break; //only show first "Workbench" menu in these cases*/
							}
						?>
						
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
										<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo getPathToStaticResource('/slds/assets/icons/utility-sprite/svg/symbols.svg#chevrondown'); ?>" />
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
													<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo getPathToStaticResource('/slds/assets/icons/utility-sprite/svg/symbols.svg#add'); ?>" />
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
				