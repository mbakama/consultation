<?php
namespace App\Lib;
    
    use Pusher\Pusher;

    class PusherFactory 
    {
        public static function make()
        {
            return new Pusher(
                env('PUSHER_APP_ID'),
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                array(
                    'cluser'=>env('PUSHER_APP_CLUSTER'),
                    'encrypted'=>true,
                ) 
                );
        } 
    }
    
?>