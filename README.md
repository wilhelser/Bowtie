# Bowtie
## The Infinite Agency

This is Bowtie, the starter theme for The Infinite Agency based on Foundation for Sites, version 6.4.x.


## Prerequisites
* Node.js 7.x.x and npm 5.x.x
* Webpack 3.x.x


## How to get started
1. Clone or [download](https://github.com/TheInfiniteAgency/bowtie/archive/master.zip "Download the Bowtie Zip") the project onto your `themes` directory `(./wp-content/themes)`
2. From the theme directory, run `npm install`.
3. Update the proxy url in `webpack.config.js` to your local dev install.
4. Run `npm start` to begin watching your files. Or run `npm run build` to generate your dist files.

## Webpack & BrowserSync
Webpack will handle SASS compiling, vendor-prefixing, CSS/JS minification and trigger BrowserSync for browser reloading.

All asset references within your SASS files will need to be referenced absolutely from the theme root, ex `(/assets/images/logo.png)`.

You may use `import '@/assets/...'` to import a file relative to the theme root in your JS files, making it easier to move them around.

## Foundation

Foundation's JS plugins are disabled by default. Uncomment the `foundation.js` import from `/assets/js/app.js` and edit the file to register the necessary plugins.
