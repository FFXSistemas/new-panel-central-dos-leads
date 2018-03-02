# CRM Pronorth Services - CRS

[Requirements](#requirements-link)

[Configuration](#config-link)

<a name="requirements-link"></a>
## Requirements:
- PHP 7.0 (or higher)
- Composer
- NodeJs 6.00 (higher)
- Gulp
- Gulp-CLI

## Installation:

Follow the following steps:
```bash
composer install
chmod 777 storage 
```
<a name="config-link"></a>
## Configuration:

All sensible data configuration is located at .env file or at machine ENV, the .env file must be something like:

### .env
```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:8KkRVb40lDSpmeiA2ACcplzFUoJ3+Kpm5LNTvEfV0gU=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

BDATA_USER=
BDATA_PASSWORD=

BOT_MAIL_SERVER=
BOT_MAIL_LOGIN=
BOT_MAIL_PASS=

BOT_SCHEDULE_SERVER=
BOT_SCHEDULE_LOGIN=
BOT_SCHEDULE_PASS=

SMS_USER=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER="mailgun"
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=null

MAILGUN_DOMAIN=
MAILGUN_SECRET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

```

