wpPlugins
=========

# Interaction 3rd Semester Spring 2014 

WordPress (WP) is a CMS sample. Since WP is made by PHP and MySQL you can hack your own extensions. The learning objectives are:

* Be able to write your own widgets and plugins.
* Be able to theme from barebone theme or via child themes
* Know how to use the $wpdb class
* Be able to use API, OOP and know some security issues concerning WP

On http://petj.mmdeal.dk you will find the relevant materials for the classes.

### Install your plugin (easy)

The easy way to install your .php file

1. Download the zip file.
2. In the WordPress Dashboard > Plugins > Install
3. Choose from file.
4. Install from your local file.

### Install plugin via ftp (advanced)

If you ftp to WP the plugins are stored in:

    /wp-content/plugins

You can upload files directly and make the folder via ftp (e.g. in FileZilla). Something like this should do the trick. Make a folder in the plugins directory:

    /wp-content/plugins/myFancyPlugin

After that you upload your plugin files. The plugin should be visible. All you have to do is to activate it in the plugins list in the Dashboard of WP.

## The files

| Description | URL |
| ----------- | --- |
| Simple hello world shortcode plugin |  https://github.com/asathoor/wpPlugins/blob/master/mojn.php |
| A $wpdb API sample | https://github.com/asathoor/wpPlugins/blob/master/petjWpdbSample.php |
| Shortcode sample (display current year) |https://github.com/asathoor/wpPlugins/blob/master/petjYear.php |
