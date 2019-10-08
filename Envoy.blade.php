@servers(['web' => ['parfaitementwebcom@ssh039.webhosting.be']])

@setup
$root = '/data/sites/web/parfaitementwebcom/';
$path = $root . 'subsites/pwd.parfaitementweb.com';
$branch = 'master';
$artisan = $path . '/artisan';
$composer = 'composer';
$repo = 'git@github.com:parfaitementweb/pwd.git';
$php = 'php';
@endsetup

@story('deploy')
down
pull
composer
migrate
config
cache
up
@endstory

@story('init')
clone
env
migrate
seed
appkey
composer
setInProduction
@endstory

@task('sshkey:generate')
ssh-keygen -t rsa -N "" -f {{$root}}/.ssh/id_rsa
cat {{$root}}/.ssh/id_rsa.pub
@endtask

@task('sshkey:show')
cat {{$root}}/.ssh/id_rsa.pub
@endtask

@task('clone')
if [ ! -f {{ $path }}/.env ]; then
cd {{ $path }}
git clone {{ $repo }} --branch={{ $branch }} --depth=1 .
echo "Repository cloned"
else
echo "Deployment path already initialised! not cloned"
fi
@endtask

@task('env')
if [ ! -f {{ $path }}/.env ]; then
cp {{ $path }}/.env.example {{ $path }}/.env
echo "Environment file set up"
else
echo "Environment file already existing."
fi
@endtask

@task('pull')
cd {{ $path }}
git pull origin {{ $branch }}
@endtask

@task('composer')
cd {{ $path }}
{{ $composer }} install --no-interaction --prefer-dist --optimize-autoloader
@endtask

@task('migrate')
if [ -f {{ $artisan }} ]; then
cd {{ $path }}
{{ $php }} {{ $artisan }} migrate --force
else
echo "Artisan file not found!"
fi
@endtask

@task('down')
if [ -f {{ $artisan }} ]; then
cd {{ $path }}
{{ $php }} {{ $artisan }} down
else
echo "Artisan file not found!"
fi
@endtask

@task('up')
if [ -f {{ $artisan }} ]; then
cd {{ $path }}
{{ $php }} {{ $artisan }} up
else
echo "Artisan file not found!"
fi
@endtask

@task('seed')
cd {{ $path }}
{{ $php }} {{ $artisan }} db:seed
@endtask

@task('appkey')
cd {{ $path }}
{{ $php }} {{ $artisan }} key:generate
@endtask

@task('setInProduction')
cd {{ $path }}
sed -i -e 's/APP_DEBUG=true/APP_DEBUG=false/g' .env
sed -i -e 's/APP_ENV=local/APP_ENV=production/g' .env
@endtask

@task('cache')
cd {{ $path }}
{{ $php }} {{ $artisan }} cache:clear
{{ $php }} {{ $artisan }} config:clear
@endtask

@task('config')
cd {{ $path }}
{{ $php }} {{ $artisan }} config:cache
@endtask

@task('log')
cd {{ $path }}
tail -n 100 ./storage/logs/laravel.log
@endtask
