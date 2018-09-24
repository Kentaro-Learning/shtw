<?php

    /**
     * Configuration for the "HTTP Very Basic Auth"-middleware
     */
    //////////////////実際に上げるときは、gitignoreのファイルに追記する
    return [
        // Username
        'user'              => 'admin',

        // Password
        'password'          => '1dR0Hk8F',

        // Environments where the middleware is active. Use "*" to protect all envs
        'envs'              => [
            '*'
        ],

        // Message to display if the user "opts out"/clicks "cancel"
        'error_message'     => 'You have to supply your credentials to access this resource.',

        // Message to display in the auth dialiog in some browsers (mainly Internet Explorer).
        // Realm is also used to define a "space" that should share crentials.
        'realm'             => 'Basic Auth',

        // If you prefer to use a view with your error message you can uncomment "error_view".
        // This will superseed your default response message
        // 'error_view'        => 'very_basic_auth::default'
    ];