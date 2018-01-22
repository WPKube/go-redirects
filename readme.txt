=== Go Redirects URL Forwarder ===
Contributors:      galengidman
Tags:              redirects, redirect, affiliate, affiliate link, url mask
Requires at least: 4.7
Tested up to:      4.9.2
Requires PHP:      5.4
Stable tag:        trunk

A URL forwarder for WordPress.

== Description ==

Go Redirects is a URL forwarder plugin for WordPress that enables URLs like `http://mysite.com/go/far-far-away/` to forward to URLs like `http://someothersite.com/`. It's a great way to create clean-looking affiliate links or provide permement links for remote URLs that may change over time. It includes analytics for the number of times a URL has been forwarded.

== Screenshots ==

1. The redirect edit screen.
2. List of redirects.

== Installation ==

- **WordPress Plugins Directory**: Navigate to *Plugins* → *Add New* in the WordPress admin and search “Go Redirects.” Click *Install* and then *Activate*.
- **Zip Upload**: Navigate to *Plugins* → *Add New* → *Upload Plugin* in the WordPress admin. Browse to the .zip file containing the plugin on your computer and upload, then activate.
- **Manual FTP Upload**: Upload the plugin folder to `/wp-content/plugins/`. Navigate to *Plugins* in the WordPress admin and activate.

== Frequently Asked Questions ==

= I'm getting 404 errors when I try to visit my redirects. What do I do? =
Go to Settings → Permalinks and resave your permalink settings.

= Can I change the redirects base URL slug from `/go/` to something else? =
There is no setting to do so at this time.

== Changelog ==

[Follow development on GitHub](https://github.com/galengidman/go-redirects)
