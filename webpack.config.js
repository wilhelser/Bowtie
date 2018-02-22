const path = require('path')
const webpack = require('webpack')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const UglifyJSPlugin = require('uglifyjs-webpack-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const WebpackBuildNotifierPlugin = require('webpack-build-notifier')

const config = {
	entry: {
    app: './assets/js/app.js',
    admin: './assets/js/admin.js',
    login: './assets/js/login.js'
  },
	output: {
		filename: 'js/[name].js',
		path: path.resolve(__dirname, './assets/dist'),
		publicPath: '/wp-content/themes/bowtie/',
	},
	resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      'vue$': 'vue/dist/vue.esm.js',
      '@': path.join(__dirname, '.')
    }
  },
	module: {
		rules: [
			{
        test: /\.vue$/,
        loader: 'vue-loader',
        options: {
					loaders: {
			      scss: 'vue-style-loader!css-loader!sass-loader', // <style lang="scss">
			      sass: 'vue-style-loader!css-loader!sass-loader?indentedSyntax' // <style lang="sass">
			    }
        }
      },
			{
				test: /\.scss$/,
				use: ExtractTextPlugin.extract({
					fallback: 'style-loader',
					use: [ 'css-loader', 'postcss-loader', 'sass-loader' ]
				})
			},
			{
        test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2)$/,
        loader: 'file-loader',
        options: {
					name: '[path][name].[ext]',
					useRelativePath: false,
					emitFile: false // Prevents files from moving since they're correctly referenced
        }
      },
			{
				test: /\.js$/,
				include: [
					path.resolve(__dirname, 'assets/js'),
					path.resolve(__dirname, 'node_modules/foundation-sites/js')
				],
				loader: 'babel-loader',
				options: {
					presets: ['env']
				}
			}
		],
	},
	plugins: [
		new WebpackBuildNotifierPlugin({
			sound: 'Funk',
			successSound: 'Pop'
		}),
		new BrowserSyncPlugin({
			host: 'localhost',
      port: 3000,
<<<<<<< HEAD
			proxy: 'http://bowtie-vagrant.test',
=======
			proxy: 'https://bowtie-vagrant.test',
>>>>>>> 354a1e7e65899bb979aca846cdaff374a252882e
      files: [
        '**/*.php',
        '**/*.html'
      ]
		}),
		new ExtractTextPlugin({
			filename: 'css/[name].css',
			// publicPath: '/'
		})
	],
	devtool: 'source-map'
}

if (process.env.NODE_ENV === 'production') {
	config.plugins.push(
		new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '"production"'
      }
    }),
		new UglifyJSPlugin({
			sourceMap: true,
		}),
		new OptimizeCssAssetsPlugin()
	)
}

module.exports = config
