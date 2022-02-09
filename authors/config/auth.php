<?php
return [
   'defaults' => [
       'guard' => 'user',
       'passwords' => 'users',
   ],


   'guards' => [ 
        'user' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
       'users' => [
           'driver' => 'eloquent',
           'model' => \App\Models\User::class
       ]
   ]
];
