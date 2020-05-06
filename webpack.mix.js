const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");
const sveltePreprocess = require("svelte-preprocess");
require("laravel-mix-svelte");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").svelte({
    preprocess: sveltePreprocess({ postcss: true }),
    customElement: true,
    tag: null // to get rid of "no custom element tag name" warning because we are defining components tag name it in app.js file. otherwise you would have to put "<svelte:options tag={null} />" in all of your custom elements.
});

mix.sass("resources/sass/app.scss", "public/css").options({
    processCssUrls: false,
    postCss: [tailwindcss("tailwind.config.js")]
});
