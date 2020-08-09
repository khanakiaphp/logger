<?php
// include( __DIR__ . '/../logger/index.php' );
require_once(__DIR__.'/vendor/autoload.php');
require_once(__DIR__.'/inc/functions.php');

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Symfony\Component\Filesystem\Filesystem;
global $kuid;
$kuid = uniqid();

Class LoggerPhp {
    function __construct($saveHtml=false) {
        // $this->saveHtml = $saveHtml;
        if(class_exists('WP') && $saveHtml) {
            add_action('get_header', function() {
                ob_start(array($this, 'saveHtml'));
            });
        }
    }

    function start() {
        $logger = new Logger('channel-name');
        $logger->pushHandler(new StreamHandler(__DIR__.'/tmp/app-'.date('Y-m-d').'.log', Logger::DEBUG));
        $logger->info('Request', getFinalData());

        // $this->saveHtml();
    }

    /**
     * Save Wordpress Page as HTML
    */
    function saveHtml($html) {
        global $kuid;
        $fileSystem = new Filesystem();
        $filePath = __DIR__.'/tmp/files/'.$kuid.'.html';
        $fileSystem->dumpFile($filePath, $html);   
        return $html;
    }
}
?>