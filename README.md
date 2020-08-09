## PHP Logger to log every single request which helps you to tighten security by analyzing the requests made to your website.

This script was developed out of pain as there is no such script yet available for logging all the request because of that reason this script came to life so we can trace mailicious request, code injections, spammers ip and the request url and data they are submitting, thus we can prevent and fix the issue.


### How it works?
Simply Install the plugin and change the Plugin settings according to your needs. After you enabled the settings it will start logging all the request made to your php website.

The script logs al the request under `tmp` directory.

## How to Use
Download the zip file from the url https://github.com/khanakiaphp/logger/releases/download/0.0.1/logger.zip and unzip it to the root directory
```
include( __DIR__ . '/logger/index.php' );
$logger = new \LoggerPhp();
$logger->start();
```
Params if `$saveHtml=true` then it will save the HTML output of the website. Right saving html output is supported only for WordPress website.

**NOTE:** if you are using WordPress then place the code at the very bottom of `wp-config.php` file.

## Fix Japense hack
Have you every wondered when somebody googles your site and you started seeing japense meta keywords and tilte. But now you do not know how to track the request and trace at what point exactly our HTML output is modified by the hacked.

That's why `saveHtml` came to rescue it will save all the request html in html files and will map the Request ID with $id.html files so you can know against which request that html files was hacked. and it will be easy to trace the hackers.

## Contribute

If you would like to contribute to the project, please fork it and send us a pull request.  Please add tests
for any new features or bug fixes.

## Stay in touch

* Author - [Aman Khanakia](https://twitter.com/mrkhanakia)
* Website - [https://khanakia.com](https://khanakia.com/)

## License

This script is [MIT licensed](LICENSE).
