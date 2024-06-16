
# Symfony 6.3 with implemented Security

Register, login and logout with email confirmation.
### Installation

`cp .env.example .env && php bin/console regenerate-app-secret`

edit .env (.env.local?) for DB and mailer credentials

`composer install && php bin/console do:da:cr && php bin/console do:sch:cr`
