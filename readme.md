# La Remise en

DellCashback Program for Dell Technologies Products

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

-   PHP
-   Webserver (apache/nginx)
-   Composer
-   Mysql

### Installing

#### Setting up the repo

```
git clone https://gitlab.com/cloudyfox/software/clients/aximpro/laravel/la-remise-en.git
cd la-remise-en
composer install
```

#### Setting up database

```
cp .env.example .env
php artisan key:generate
# update .env with correct database values
```

#### Migrating database and seeding

```
php artisan migrate --seed
```

## Build, Test, Deploy Cycle

### Building the project

This process consists of creating continuous builds after every commit and pushing the built images into the container registry.
Images built from the staging branch are tagged with 'staging' label and images built from the production branch are tagged with 'production' label.

### Running the tests

Test are run using a mysql image as a service from a docker container.

```
./vendor/bin/phpunit
```

### Deployment

The Application will be running on the AWS Fargate containers. Containers are orchestrated using Elastic Container Service(ECS).
When the deployment process is run on staging or production, the task definition in ECS is updated and then the service gets updated.

#### S3 Cloudfront Sync

Assets will be synced to S3 bucket and Cloudfront cache will be invalidated

Staging URL: https://staging.laremiseenplus.com

Production URL: https://laremiseenplus.com

## Built With

-   [Laravel 6](https://laravel.com/) - The web framework used
-   [Composer](https://getcomposer.org/) - Dependency Management

## Credentials for Website

#### Staging

- https://staging.laremiseenplus.com/login
- email: admin@laremise.com
- password: WRGcF@B09^#202Og4A
