<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | When using the "HasPermissions" trait from this package, we need to know
    | which Eloquent model should be used to retrieve your permissions.
    | You can change the model classes if needed, but the default is fine for
    | most use cases.
    |
    */

    'models' => [

        'permission' => Spatie\Permission\Models\Permission::class,
        'role' => Spatie\Permission\Models\Role::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    |
    | You can change the default table names used by the package to suit your
    | application. The default values work for most cases, but you can customize
    | them if necessary.
    |
    */

    'table_names' => [

        'roles' => 'roles',
        'permissions' => 'permissions',
        'model_has_permissions' => 'model_has_permissions',
        'model_has_roles' => 'model_has_roles',
        'role_has_permissions' => 'role_has_permissions',
    ],

    /*
    |--------------------------------------------------------------------------
    | Column Names
    |--------------------------------------------------------------------------
    |
    | You can change the names of the pivot columns if you'd like to customize
    | the structure of the database.
    |
    */

    'column_names' => [
        'role_pivot_key' => null,  // default 'role_id',
        'permission_pivot_key' => null, // default 'permission_id',
        'model_morph_key' => 'model_id',  // You can change it if you're using UUIDs for primary keys
        'team_foreign_key' => 'team_id',  // Change if your model uses another foreign key for teams
    ],

    /*
    |--------------------------------------------------------------------------
    | Permission Checking
    |--------------------------------------------------------------------------
    |
    | Set this to false if you want to implement custom logic for checking
    | permissions instead of using the default "gate" checking method.
    |
    */

    'register_permission_check_method' => true,

    /*
    |--------------------------------------------------------------------------
    | Octane Listener
    |--------------------------------------------------------------------------
    |
    | When enabled, the package will refresh permissions on every Octane request.
    | Most applications do not need this, but it may be useful when using Octane
    | or Laravel Vapor.
    |
    */

    'register_octane_reset_listener' => false,

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | Enable events for role and permission assignment/unassignment.
    | You can create listeners for these events if needed.
    |
    */

    'events_enabled' => false,

    /*
    |--------------------------------------------------------------------------
    | Teams Feature
    |--------------------------------------------------------------------------
    |
    | Set this to true if you want to implement teams in your app using the
    | 'team_foreign_key' to associate roles and permissions with teams.
    |
    */

    'teams' => false,

    'team_resolver' => \Spatie\Permission\DefaultTeamResolver::class,

    /*
    |--------------------------------------------------------------------------
    | Passport Client Credentials Grant
    |--------------------------------------------------------------------------
    |
    | Set to true if you want to use Passport Client Credentials for checking
    | permissions.
    |
    */

    'use_passport_client_credentials' => false,

    /*
    |--------------------------------------------------------------------------
    | Permission and Role in Exception Messages
    |--------------------------------------------------------------------------
    |
    | Set to true if you want to include the permission and role names in exception
    | messages for better debugging (this can be an information leak, so false by default).
    |
    */

    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,

    /*
    |--------------------------------------------------------------------------
    | Wildcard Permissions
    |--------------------------------------------------------------------------
    |
    | By default, wildcard permissions are disabled. If you want to enable them,
    | set this to true and adjust the `permission.wildcard_permission` class as needed.
    |
    */

    'enable_wildcard_permission' => false,

    /*
    |--------------------------------------------------------------------------
    | Cache Settings
    |--------------------------------------------------------------------------
    |
    | You can set the expiration time and cache key for storing permissions and roles.
    | By default, permissions are cached for 24 hours.
    |
    */

    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'spatie.permission.cache',
        'store' => 'default',  // Use the default cache driver as set in config/cache.php
    ],

];
