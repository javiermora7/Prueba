<?php

return array(
    // set your paypal credential
    'client_id' => 'AZMDQGjEYMav4WhPs7pazmdwyqdoBZTnfkv_lv-wq4xVWXe3SIfd7vZDWg2RKcKWdXxYVVxObHie0rIR',
    'secret' => 'EFizA39PDOWRKO-fXZgF4B3LA2syJbUM9zBaZAfHAtmtfyjksjDGwITt6hvdyV36D8ECiIoKRDo-7ycl',

    /**
     * SDK configuration
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);

 ?>
