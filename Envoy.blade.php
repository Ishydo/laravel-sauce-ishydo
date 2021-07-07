@servers(['prod' => ['user@yourapp.com']])

@story('deploy')
    update-code
    install-dependencies
    migrate
    clean
    rerun-queues
    build-frontend
@endstory

@task('update-code')
    cd /httpdocs/yourapp
    git pull origin master
@endtask

@task('install-dependencies')
    cd /httpdocs/yourapp
    composer install
@endtask

@task('migrate')
    cd /httpdocs/yourapp
    php artisan migrate --force
@endtask

@task('clean')
    cd /httpdocs/yourapp
    composer dump-autoload -o
    php artisan route:clear
    php artisan config:clear
    php artisan cache:clear
@endtask

@task('rerun-queues')
    cd /httpdocs/yourapp
    php artisan queue:restart
@endtask

@task('build-frontend')
    source /.nvm/nvm.sh
    nvm use 15
    cd /httpdocs/snapwinit
    npm run production
@endtask