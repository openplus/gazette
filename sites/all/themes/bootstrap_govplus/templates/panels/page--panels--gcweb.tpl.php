<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<header id="navbar" class="main-header" role="banner" class="<?php print $navbar_classes; ?>">
  <!-- <?php if ($site_name || $site_slogan || $logo): ?>
    <a href="<?php print $site_name_url; ?>" class="logo">
      <?php if ($logo && $logo_svg): ?>
        <object id="header-logo" data='<?php print $logo_svg; ?>' role="img" tabindex="-1" type="image/svg+xml">
          <img alt="<?php print t('WxT Logo'); ?>" src="<?php print $logo; ?>"  />
        </object>
      <?php elseif ($logo): ?>
        <img alt="<?php print t('WxT Logo'); ?>" src="<?php print $logo; ?>"  />
      <?php endif; ?>
      <span <?php print $logo_class; ?>>
        <?php if ($site_name): ?>
          <?php print $site_name; ?>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
          <small><?php print $site_slogan; ?></small>
        <?php endif; ?>
      </span>
    </a>
  <?php endif; ?> -->

  <a href="<?php print $site_name_url; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
              <img src="/sites/all/themes/bootstrap_govplus/images/flag_of_canada.svg__3.png" />
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
              <img src="/sites/all/themes/bootstrap_govplus/images/goc-biglogo.png" />
          </span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" id="togglemenu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="pull-left site-search">
            <?php if ($search_box): ?>
              <?php print $search_box; ?>
            <?php endif; ?>
          </div>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php print t('Select Language'); ?> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                  <ul class="text-right">
                  <?php print $menu_bar; ?>
                </ul>
                </ul>
              </li>

            </ul>
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <i class="fa fa-angle-down"></i>


                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->

                  <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <ul>
                      <li>
                        <?php
                          global $user;
                          // this is yucky and needs to move to a preprocess function where we don't need to user_load
                          if ($user->uid) {
                            $account = user_load($user->uid);
                            $query = drupal_get_query_parameters();
                            if (isset($query['profile']) && $query['profile'] == 'true') {
                              print l(t('My Dashboard'), 'user/' . $user->uid);
                            }
                            else {
                              print l(t('My Profile'), 'user/' . $user->uid, array('query' => array('profile' => 'true')));
                            }
                          }
                        ?></li>
                    </ul>
                    <?php print render($secondary_nav); ?>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" <?php print 'title="'.t('My Interests').'"'; ?> id="slidemenu-toggle"><i class="fa fa-heart"></i></a>
              </li>

            </ul>

          </div>
        </nav>
  <?php print render($page['header']); ?>
  <!-- <nav role="navigation" id="wb-bc" property="breadcrumb">
    <div class="container-fluid">
      <div class="row">
        <?php print render($breadcrumb); ?>
      </div>
    </div>
  </nav> -->
</header>
<aside class="main-sidebar">
  <section class="sidebar" style="height: auto;">
      <?php print render($page['mega_menu']); ?>
  </section>
</aside>

<div role="main" class="content-wrapper">
    <section class="content-header">
      <?php if (empty($panels_layout)): ?>
        <?php print render($title_prefix); ?>
        <?php if (!empty($title)): ?>
          <h1 id="wb-cont"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php print render($breadcrumb); ?>
      <?php endif; ?>
    </section>
    <section<?php print $content_column_class; ?> class="content">
      <?php if (empty($panels_layout)): ?>
        <?php if (!empty($page['highlighted'])): ?>
          <?php print render($page['highlighted']); ?>
        <?php endif; ?>
        <a id="main-content"></a>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
      <?php endif; ?>
      <?php if (!empty($messages)): ?>
        <?php print render($messages); ?>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>
  <div class="slideoutmenu">
    <?php print render($page['slideout_menu']); ?>
  </div>
</div>
