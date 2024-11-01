=== Woocom Role Based Reports ===
Contributors: DBAR Productions
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R4HF689YQ9DEE
Tags: Woocommerce, reports, sales, orders, users, roles
Requires at least: 4.4
Tested up to: 5.5.1
WC tested up to: 4.5.0
Stable tag: trunk

Filter WooCommerce Sales Reports by user role

== Description ==

This is a very simple and lightweight plugin that allows you to filter the sales reports in WooCommerce by user roles. Works great with plugins like [WooCommerce Wholesale Ordering](https://stephensherrardplugins.com/plugins/woocommerce-wholesale-ordering/) and [WooCommerce User Role Pricing](https://stephensherrardplugins.com/plugins/woocommerce-user-role-pricing/) where you have different role based pricing tiers or customer types. This plugin then would allow you to show sales reports for a specific customer type by selecting the appropriate role.

This only works for the "Orders" tab of the WooCommerce>Reports page. When you are on that tab of the reports page, you will see a "Filter by User Role" select box and a "Save and Update" button, near the bottom right-hand corner of the page. Simply select the role that you want to filter the order/sales reports by, and hit the save and update button. The selected role is saved in your user data so you can refresh the page or choose custom date ranges or other sections, etc., without losing your filter settings. To see all sales again, simply select "ALL" and press save and update again (which will delete the saved value from your user meta).

== Installation ==

= Minimum Requirements =

* Requires Woocommerce

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “WooCom Role Based Reports” and click Search Plugins. Once you’ve found the plugin you can view details about it such as the point release, rating and description. Most importantly of course, you can install it by simply clicking “Install Now”.

= Manual installation =

Download and Extract the zip file and just drop the contents in the wp-content/plugins/ directory of your WordPress installation and then activate the Plugin from Plugins page.

== Changelog ==
**Version 0.0.3**

*   Modified inline CSS for form container to make the position absolute so that it is still usable on smaller screens.
*   Tested with WordPress 5.5.1 and WooCommerce 4.5.0

**Version 0.0.2**

*   Moved the form to the bottom right of the page, as WooCommerce 4.0.0 puts some horrible admin bar over the top of the admin notice area, which was hiding the form in its previous location

**Version 0.0.1**

*   Initial release
