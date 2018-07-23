# OverSeer

[![Latest Stable Version](https://img.shields.io/packagist/v/ctf0/over-seer.svg)](https://packagist.org/packages/ctf0/over-seer) [![Total Downloads](https://img.shields.io/packagist/dt/ctf0/over-seer.svg)](https://packagist.org/packages/ctf0/over-seer)

A tiny package to help preview any form data before submitting to the db.

>If you are looking to have a control over the saved content as well, you may want to give [Odin](https://github.com/ctf0/Odin) a try too.

<br>

## Installation

- `composer require ctf0/over-seer`

- (Laravel < 5.5) add the service provider.

    ```php
    'providers' => [
        ctf0\OverSeer\OverSeerServiceProvider::class,
    ];
    ```

- publish the package assets with

    `php artisan vendor:publish --provider="ctf0\OverSeer\OverSeerServiceProvider"`

- install dependencies

    ```bash
    yarn add vue form-serialize
    # or
    npm install vue form-serialize --save
    ```

- add this one liner to your main js file and run `npm run watch` to compile your `js/css` files.
    - if you are having issues [Check](https://ctf0.wordpress.com/2017/09/12/laravel-mix-es6/).

    ```js
    window.Vue = require('vue')
    
    require('../vendor/OverSeer/manager')

    new Vue({
        el: '#app'
    })
    ```

<br>

## Usage

- add an id to the form you want to collect its content, ex.

    ```html
    <form action="..." method="..." id="my-form">
        ...
    </form>
    ```

- then add the vue component anywhere near that form
    + `form-id` is the id you gave to your form, in that case `my-form`
    + `template` is where you want to display the data, ex `views/posts/overseer`
    + `title` optional url title, so instead of just `my.app/overseer` it would be `my.app/overseer/my-awesome-title`

    ```blade
    <over-seer form-id="my-form"
        template="posts.overseer"
        title="my-awesome-title"
        csrf="{{ csrf_token() }}">

        <button>Preview</button>
    </over-seer>
    ```

- now in the view where we will display our data, we can access it like

    ```blade
    // for single values
    {{ $data->title }}

    // for nested values
    {{ $data->body->en }}
    ```

    just like you would usually do with any model.

<br>

## Notes for `WYSIWYG Editors`

- we currently support `tinyMCE` but if you are using any other editor, PRs are welcome :trophy:
