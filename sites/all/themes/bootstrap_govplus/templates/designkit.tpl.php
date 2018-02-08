/**
 * This template should be overridden by implementing themes to establish
 * the styles they would like to use with DesignKit settings. The following
 * template is provided as a simple example of how you can generate CSS
 * styles from DesignKit settings.
 *
 * .designkit-color { color: [?php print $foreground ?]; }
 * .designkit-bg { background-color: [?php print $background ?]; }
 */

body, body.theme-gcweb {
  color: <?php print $sitecolor ?>;
}

.skin-black .main-header>.navbar {
  background: <?php print $header2 ?>;
}

.forum-table thead tr {
  color: <?php print $primary ?>;
}

.forum-table thead tr a, .forum-table thead tr a:visited, .forum-table thead tr a:link {
  color: <?php print $primary ?>;
}

.skin-black .main-header>.navbar .nav>li>a, .skin-black .main-header>.navbar>.sidebar-toggle, #wet-fullhd-lang a {
  color: <?php print $headerlink ?> !important;
}

.skin-black .main-header>.navbar .sidebar-toggle:hover {
  background: <?php print $primarylight ?>;
}

body.theme-gcweb .navbar-nav>.user-menu>.dropdown-menu>.user-footer ul li a {
  color: <?php print $headerlink ?> !important;
}

.skin-black .main-header>.navbar .nav>li>a:hover, .skin-black .main-header>.navbar .nav>li>a:active, .skin-black .main-header>.navbar .nav>li>a:focus, .skin-black .main-header>.navbar .nav .open>a, .skin-black .main-header>.navbar .nav .open>a:hover, .skin-black .main-header>.navbar .nav .open>a:focus {
  background: <?php print $primarylight ?>; color:#000 !important;
}

body.theme-gcweb .navbar-nav>.user-menu>.dropdown-menu {
  background: <?php print $primarylight ?>;
}

body.theme-gcweb .navbar-nav> .user-menu > .dropdown-menu a:hover {
  background: <?php print $primarydark ?> !important;
}

.skin-black .wrapper, .skin-black .main-sidebar, .skin-black .left-side {
  background: <?php print $sidebarbg ?>;
}

.skin-black .sidebar-menu>li:hover>a, .skin-black .sidebar-menu>li.active>a {
  background: <?php print $sidebarbg2 ?>;
}

.skin-black .sidebar a {
  color: <?php print $sidebarlink ?>;
}

body.theme-gcweb .content-wrapper a, body.theme-gcweb .content-wrapper a:visited {
  color: <?php print $link ?>;
}

.btn-primary {
  background: <?php print $primary ?>; border:1px solid <?php print $primary ?>;
}

.btn-primary:hover {
  background: <?php print $primarylight ?>; border:1px solid <?php print $primarylight ?>;
}

.btn-primary:focus {
  background: <?php print $primarydark ?>; border:1px solid <?php print $primarydark ?>;
}

.calendar-calendar tr td.today, .calendar-calendar tr.odd td.today, .calendar-calendar tr.even td.today {
  background: <?php print $primary ?>;
}

body.theme-gcweb .pager a, body.theme-gcweb .pager a:visited, body.theme-gcweb .slideoutmenu .pager a, body.theme-gcweb .slideoutmenu .pager a:visited  {
  background: <?php print $primary ?> !important; color: #ffffff !important;
}

body.theme-gcweb .pager a:hover, body.theme-gcweb .pager a:visited:hover, body.theme-gcweb .slideoutmenu .pager a:hover, body.theme-gcweb .slideoutmenu .pager a:visited:hover {
  background: <?php print $primarylight ?> !important; color: #000000 !important;
}

body.theme-gcweb .ui-tabs .ui-widget-header li.ui-state-active {
  border-top-color: <?php print $primary ?>;
}

.pcp-wrapper .pcp-percent-bar-wrapper .pcp-percent-bar {
  background: <?php print $primarydark ?> !important;
}

body.theme-gcweb .slideoutmenu {
  background: <?php print $slideoutbg ?>; border-left:2px solid <?php print $primarydark ?>;
}

.slideoutmenu .type-faq:before, .slideoutmenu .type-course:before, .slideoutmenu .type-blog:before, .slideoutmenu .type-workpad:before, .slideoutmenu .type-advpoll:before, .slideoutmenu .type-forum:before, .slideoutmenu .type-news:before, .slideoutmenu .type-policy:before, .slideoutmenu .type-event:before, .slideoutmenu .type-alert:before, .slideoutmenu .type-page:before, .slideoutmenu .type-faq:before {
  background: <?php print $slideoutbg ?>;
}

.pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover { background: <?php print $primary ?>; border:1px solid <?php print $primary ?>;   color: <?php print $headerlink ?> !important; }

.flag-wrapper.flag-bookmarks a, .flag-wrapper.flag-bookmarks a:visited, .flag-wrapper.flag-acknowledge a, .flag-wrapper.flag-acknowledge a:visited {
  background: <?php print $primary ?>; color: color: <?php print $headerlink ?>;
}

.flag-wrapper.flag-bookmarks a:hover, .flag-wrapper.flag-bookmarks a:visited:hover, .flag-wrapper.flag-acknowledge a:hover, .flag-wrapper.flag-acknowledge a:visited:hover {
  background: <?php print $primarylight ?> !important; color: color: <?php print $headerlink ?> !important;
}

.current-search-item ul li a {
  background: <?php print $primary ?>; color: color: <?php print $headerlink ?>;
}

.current-search-item ul li a:hover {
  background: <?php print $primarylight ?>; color: color: <?php print $headerlink ?>;
}

body .flexslider .flex-caption a, body .flexslider .flex-caption a:visited {
  color: <?php print $headerlink ?>;
}

body.theme-gcweb .poll .bar .foreground {
  background: <?php print $primary ?>;
}

.selectboxit-btn.selectboxit-enabled:hover, .selectboxit-btn.selectboxit-enabled:focus, .selectboxit-btn.selectboxit-enabled:active {
  border:2px solid <?php print $primary ?> !important;
}

body.theme-gcweb .selectboxit-btn.selectboxit-enabled:hover, body.theme-gcweb .selectboxit-btn.selectboxit-enabled:focus, body.theme-gcweb .selectboxit-btn.selectboxit-enabled:active {
  border:2px solid <?php print $primary ?> !important;
}

body.theme-gcweb .selectboxit-list {
  border:2px solid <?php print $primary ?>; border-top:none;
}
