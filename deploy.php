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
add('writable_dirs', []);
//set('allow_anonymous_stats', false);

// Hosts

host('3.25.91.240')
    ->user('ubuntu')
    ->become('root')
    ->port(22)
    ->identityFile('~/.ssh/giftclub.pem')
    ->forwardAgent(true)
        ->set('deploy_path', '/var/www/giftclubglobal.com');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

