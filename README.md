# Meridian Africa Theme

A custom WordPress theme for Meridian Africa.

## Description

This theme is built on the Underscores (_s) starter theme framework and customized for Meridian Africa's specific needs.

## Features

* Custom header support
* Custom logo support
* Custom background support
* Navigation menus
* Widget-ready sidebar
* Translation ready
* HTML5 markup
* Responsive design ready

## Development

### Requirements

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Setup

Install dependencies:

```sh
$ composer install
$ npm install
```

### Available CLI Commands

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

## License

This theme is licensed under the GPL v2 or later.

## Credits

Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
