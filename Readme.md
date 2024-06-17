
# Symfony 6.3 with implemented Security

Register, login and logout with email confirmation.
### Installation

* `cp .env.example .env`
* `composer install`
* [optional] `php bin/console regenerate-app-secret` - to update `APP_SECRET` hash
* edit `.env` (`.env.local`?) for `DB`, `APP_ENV` and `MAILER_DSN` credentials
* `php bin/console d:d:d --if-exists --force && php bin/console do:da:cr && php bin/console do:sch:cr`
