## PPWP2 - A Pirate Party Material Design Lite WordPress Theme

PPWP2 is a Material Design WordPress theme that uses Sass, Gulp etc. and of course Material Design Lite. 

![screenshot](https://i.imgur.com/CEWNtZa.png)
[Live Demo](https://pirateparty.org.au)

### Usage

#### Installation

1. Download the theme
2. Extract ppwp2 directory into your `/wp-content/themes/` directory
3. Activate the Theme through the 'Appearance' menu in WordPress

#### For the developers

After you've downloaded PPWP2, and run `npm install` and `gulp` from the command line you can start using gulp.

For customization, basic knowledge of the command line and the following dependencies are required to use this theme:

- MDL ([http://www.getmdl.io/](http://www.getmdl.io/))
- Node ([http://nodejs.org/](http://nodejs.org/)) -`npm install`
- Gulp ([http://gulpjs.com/](http://gulpjs.com/)) - `npm install --global gulp`

#### Future Plans
- Allow customisable branding.
- Clean up the horrid sass
- Allow Admin editable home page blocks.

Do you have an idea? PRs welcome. 

#### Gulp

##### 1) Navigate to your new theme
`cd /your-project/wordpress/wp-content/themes/your-new-theme`

##### 2) Gulp tasks available:

`gulp` - Automatically handle changes to CSS, javascript, php, and image optimization. Also Livereload!

`gulp scripts` - Concatenate and minify javascript files

`gulp sass` - Compile, prefix, and minify CSS files

`gulp zip` - Creates a zipped file in the root of the theme. Ignores the node_modules directories.

### Contributors
- [Tom Randle](https://github.com/Rundll)

### Credits
- [Brad Williams](https://github.com/braginteractive) - original theme developer
- [Mark Constable](https://github.com/markc) - original theme github updater
