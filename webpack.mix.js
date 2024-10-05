let mix = require('laravel-mix');

require('laravel-mix-polyfill');

if (!mix.inProduction()) {
	mix.webpackConfig({
		devtool: 'inline-source-map'
	});
}

mix
	.sourceMaps()
	.js('public/src/js/app.js', 'public/js')
	
	.sass('public/src/styles/style.scss', 'css')
	.setPublicPath('public');

mix.browserSync({
	proxy: 'http://service-boat.local/',
	ui: {
		port: 8080
	}
});

mix.options({
	postCss: [
		require('autoprefixer')({
			browsers: ['last 40 versions']
		})
	]
});
