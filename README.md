# OverSeer

is a tiny package to help preview any form data before submitting it to the db.

>If you are looking to have a control over the saved content as well, you may want to give [Odin](https://github.com/ctf0/Odin) a try too.

## Installation

- `composer require ctf0/over-seer`

- (Laravel < 5.5) add the service provider.

```php
'providers' => [
    ctf0\OverSeer\OverSeerServiceProvider::class,
];
```

- install dependencies

```bash
yarn add vue form-serialize
# or
npm install vue form-serialize --save
```

- add this one liner to your main js file and run `npm run watch` to compile your `js/css` files.
    - if you are having issues [Check](https://ctf0.wordpress.com/2017/09/12/laravel-mix-es6/).

```js
require('./../vendor/OverSeer/manager')

new Vue({
    el: '#app'
})
```

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

    ```blade
    <over-seer form-id="my-form" template="posts.overseer">
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

## Notes

- because we are displaying the form content before its actually saved into the database,
it means that any `accessors, mutators, helper functions, etc...` wont be accessible, because those aren't a real model data until you actually submit the form.

- if any of your form inputs is being handled by a **WYSIWYG Editor** like `tinyMCE, CKEditor, etc..`, sadly they dont reflect the content to the original input until the form is submitted,

    however in case of `tinyMCE` we are in luck as it has [`tinyMCE.triggerSave()`](https://www.tinymce.com/docs/api/tinymce/tinymce.editormanager/#triggersave) which we use it before showing the preview, so if you are using any other editor, any PRs are welcomes :trophy:
