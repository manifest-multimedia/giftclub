<?php
namespace Deployer;

require 'recipe/laravel.php';


set('ssh_type', 'native'); 
set('ssh_multiplexing', false); 

// Project name
set('application', 'GiftClub');

// Project repository
set('repository', 'https://github.com/manifest-multimedia/giftclub');

// [Optional] Allocate tty for git clone. Default value is false.
//set('git_tty', true); 

//set('writable_mode', 'chown');

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
//set('writable_dirs', ['/var/www/giftclubglobal.com/app/current/bootstrap/cache']);
set('allow_anonymous_stats', false);

// Hosts

host('3.25.130.254')
    ->user('giftclub')
    // ->identityFile('c://ssh/giftclubglobal')
    ->set('deploy_path', '/var/www/giftclubglobal.com/app');    
   

    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

set('INFOBIP_SENDER', 'ManifestGH');
set('INFOBIP_AUTHORIZATION', 'App db184ed638df3de1d2d608ab8eac7ab2-81ea90e5-399f-4e23-84c5-242e959520a6');

task('notify', function(){
    
    //SEND SMS

    $destination="233244558822"; 
    $message="Dear Asare, app deployment completed successfully for app.giftclubglobal.com. Thank you."; 
    $sender=get('INFOBIP_SENDER');
    $authorization=get('INFOBIP_AUTHORIZATION');
    $response= SMSnotify($destination, $message, $sender, $authorization); 

    $destination="233204179139"; 
    $message="Deployment was successful for app.giftclubglobal.com"; 
    $sender=get('INFOBIP_SENDER'); 
    $authorization=get('INFOBIP_AUTHORIZATION');

    $response= SMSnotify($destination, $message, $sender, $authorization); 

    
    write('Sending SMS Notification');
    
    print_r($response);

    }); 


/*
task('notify', function(){
    
    // SEND SMS
    $destination="233244558822"; 
    $message="Dear Asare, your app has been successfully deployed to app.giftclubglobal.com!"; 
    $response= SMSnotify($destination, $message); 

    $destination="233204179139"; 
    $message="Hello Johnson, a System Update has been successfully deployed to giftclubglobal.com."; 
    $response= SMSnotify($destination, $message); 

    write('Sending SMS Notification');
    
    print_r($response);
    
    }); 
*/

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

//  after('success', 'notify');