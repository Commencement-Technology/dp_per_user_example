<?php 

function setDatabaseForUser($userId)
{
    $databasePath = database_path("users/{$userId}.sqlite");

    $databaseDir = database_path('users');

    if (!file_exists($databaseDir)) {
      mkdir($databaseDir, 0755, true); // Creates the users directory if it doesn’t exist
    }

    if (!file_exists($databasePath)) {
        touch($databasePath); // Creates the database if it doesn’t exist
    }


    // Dynamically set the database connection
    config(['database.connections.sqlite_user.database' => $databasePath]);
    DB::purge('sqlite_user');
    DB::reconnect('sqlite_user');
}


function initializeUserDatabase($userId)
{
    setDatabaseForUser($userId);

    Artisan::call('migrate', [
        '--database' => 'sqlite_user',
        '--force' => true,
    ]);
}