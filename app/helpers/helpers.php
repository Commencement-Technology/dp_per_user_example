<?php 

function setDatabaseForUser($userId)
{
    $databasePath = database_path("users/{$userId}.sqlite");

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