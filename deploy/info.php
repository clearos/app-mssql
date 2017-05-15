<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'mssql';
$app['version'] = '1.0.0';
$app['release'] = '1';
$app['vendor'] = 'ClearFoundation';
$app['packager'] = 'ClearFoundation';
$app['license'] = 'GPLv3';
$app['license_core'] = 'LGPLv3';
$app['description'] = lang('mssql_app_description');
$app['tooltip'] = lang('mssql_app_tooltip');

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('mssql_app_name');
$app['category'] = lang('base_category_server');
$app['subcategory'] = lang('base_subcategory_database');

/////////////////////////////////////////////////////////////////////////////
// Packaging
/////////////////////////////////////////////////////////////////////////////

$app['core_requires'] = array(
    'app-base-core >= 1:1.2.6',
    'app-network-core', 
    'mssql-server >= 11.0',
);

$app['core_file_manifest'] = array( 
    'mssql-server.php'=> array( 'target' => '/var/clearos/base/daemon/mssql-server.php' ),
);

$app['core_directory_manifest'] = array(
    '/var/clearos/mssql' => array(),
);

$app['delete_dependency'] = array(
    'app-mssql-core',
    'mssql-server',
);
