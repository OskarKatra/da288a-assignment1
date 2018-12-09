<?php
    require("vendor/autoload.php");

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    class UsageLogger
    {
        var $log;

        /**
         * UsageLogger constructor.
         * @param $name
         * @throws Exception
         */
        function __construct($name) {
            $path = 'logs/logs.log';

            $this-> log = new Logger($name);
            $this-> log->pushHandler(new StreamHandler($path, Logger::INFO));
        }

        /**
         * Logs a visitor
         * @param $param
         */
        function log($param){
            $this-> log->info('id: '.$param);
        }
    }