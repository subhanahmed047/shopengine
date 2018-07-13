# Shop Engine

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

Cake PHP 3 based ecommerce Store generation with custom fields (Dynamic Database Development).


The framework's source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.

2. If Composer is installed globally, run the following command in application root
```bash
composer install
```

You should now be able to visit the path to where you installed. Make sure to change the database credentials.

## Database Configuration

The install module is disabled at the moment so you can change your database credentials by going into the following file:

`Plugins/Settings/config/datasource.json`

## Populating Database

You can either Migrate the database into the connected datasource by running the following commands from the root

`cd bin` and then
`cake bake migrate`

Otherwise you can find a database sql dump file under `config/sql` directory.

## Demo

We've decided to add more features to this repository as well as update the existing codebase. A public demo is temporarily taken off. However a few Screenshots of the system are uploaded here: `https://goo.gl/DnrTRQ`
