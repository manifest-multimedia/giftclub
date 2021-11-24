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

set('writable_mode', 'chown');

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
set('writable_dirs', []);
//set('allow_anonymous_stats', false);

// Hosts

host('3.25.130.254')
    ->user('giftclub')
    ->port(22)
    ->identityFile('c://ssh/giftclubglobal')
    ->forwardAgent(true)
        ->set('deploy_path', '/var/www/giftclubglobal.com');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

set('authorization', '');

task('notify', function(){
    
    // SEND SMS
    $destination="233549539417"; 
    $message="Application Successfully Deployed for GiftClub Digital"; 
    $response= SMSnotify($destination, $message); 

    $destination="233204179139"; 
    $message="Hello Johnson, a System Update has been successfully deployed to giftclubglobal.com."; 
    $response= SMSnotify($destination, $message); 

    write('Sending SMS Notification');
    
    print_r($response);
    
    }); 


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

// after('success', 'notify');