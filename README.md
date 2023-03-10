<!-- write title Mardira Framework -->

# Mardira Framework

<!-- Description here -->

Mardira Framework is a PHP framework Model Controller Based for building web applications and APIs. It is designed to be simple, and fast.

<!-- total download repository -->

![Total Downloads](https://img.shields.io/packagist/dt/mardira/mardira-framework?color=e&style=for-the-badge)

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
  - [Start Server](#start-server)
  - [Create Controller](#create-controller)
  - [Create Model](#create-model)
  - [Create Migration](#create-migration)
  - [Run Migration](#run-migration)
  - [Refresh Migration](#refresh-migration)
  - [Refresh Migration With Seed](#refresh-migration-with-seed)
  - [Create Seeder](#create-seeder)
  - [Run Seeder](#run-seeder)
  - [Run Seeder Specific](#run-seeder-specific)
  - [Create .env](#create-env)
  - [Create Authetication](#create-authetication)
  - [Refresh Authetication](#refresh-authetication)

## Requirements

- PHP >= 7.4
- MySQL >= 5.7.8
- Apache >= 2.4.41
- Composer >= 2.0.9

## Installation

<!-- Installation here -->

### Clone

- Clone this repo to your local machine using `git clone

``` shell
  git clone https://github.com/Bootcamp-STMIK-Mardira-Indonesia/mardira-framework.git
```


> Then, install the dependencies using composer

```shell
composer install
```

> or

```shell
composer update
```

### Setup

> You can create a new project using composer

```shell
composer create-project mardira/mardira-framework <your_project_name>
```

## Usage

### Start Server

```shell
php mardira serve
```

> or

```shell
php mardira serve --port=<your_port>
```

### Create Controller

```shell
php mardira make:controller ControllerName
```

### Create Model

```shell
php mardira make:model ModelName
```

### Create Migration

```shell

php mardira make:migration create_table_table_name
```

### Run Migration

```shell
php mardira migrate
```

### Refresh Migration

```shell
php mardira migrate:refresh
```

### Refresh Migration With Seed

```shell
php mardira migrate:refresh --seed
```

### Create Seeder

```shell
php mardira make:seeder SeederName
```

### Run Seeder

```shell
php mardira db:seed
```

### Run Seeder Specific

```shell
php mardira db:seed --class=SeederName
```

### Create .env

```shell
php mardira make:env
```

### Create Authetication

```shell
php mardira make:auth
```

### Refresh Authetication

```shell
php mardira make:auth --refresh
```

## Support

Reach out to me at one of the following places!

- Website at <a href="https://demostmikmi.com" target="_blank">`demostmikmi.com`</a>
