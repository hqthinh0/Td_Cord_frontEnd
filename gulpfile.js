const gulp = require('gulp');
const gulpIf = require('gulp-if');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const htmlmin = require('gulp-htmlmin');
const cssmin = require('gulp-cssmin');
const uglify = require('gulp-uglify');
const imagemin = import('gulp-imagemin');
const concat = require('gulp-concat');
const jsImport = require('gulp-js-import');
const sourcemaps = require('gulp-sourcemaps');
const htmlPartial = require('gulp-html-partial');
const fileinclude = require('gulp-file-include');
const clean = require('gulp-clean');
const isProd = process.env.NODE_ENV === 'prod';

const htmlFile = ['src/*.html', 'src/**/*.html'];

function html() {
	return gulp
		.src(htmlFile)
		.pipe(
			fileinclude({
				prefix: '@@',
				basepath: 'src/partials/',
			}),
		)
		.pipe(
			gulpIf(
				isProd,
				htmlmin({
					collapseWhitespace: true,
				}),
			),
		)
		.pipe(gulp.dest('html'));
}

function css() {
	return gulp
		.src('src/assets/sass/style.scss')
		.pipe(gulpIf(!isProd, sourcemaps.init()))
		.pipe(
			sass({
				includePaths: ['node_modules'],
			}).on('error', sass.logError),
		)
		.pipe(gulpIf(!isProd, sourcemaps.write()))
		.pipe(gulpIf(isProd, cssmin()))
		.pipe(gulp.dest('html/assets/css/'));
}

function js() {
	return gulp
		.src(['src/assets/js/*.js'])
		.pipe(
			jsImport({
				hideConsole: true,
			}),
		)
		.pipe(concat('all.js'))
		.pipe(gulpIf(isProd, uglify()))
		.pipe(gulp.dest('html/assets/js'));
}

function componentsJs() {
	return gulp
		.src(['src/assets/js/components/*.js'])
		.pipe(
			jsImport({
				hideConsole: true,
			}),
		)
		.pipe(gulpIf(isProd, uglify()))
		.pipe(gulp.dest('html/assets/js/components/'));
}

function img() {
	return gulp.src('src/assets/images/**').pipe(gulp.dest('html/assets/images/'));
}

function mailer() {
	return gulp.src(['src/assets/mailer/*.php']).pipe(gulp.dest('html/assets/mailer/'));
}

function php() {
	return gulp.src(['src/**/*.php']).pipe(gulp.dest('html'));
}

function serve() {
	browserSync.init({
		port: 8888,
		open: true,
		server: './html',
	});
}

function browserSyncReload(done) {
	browserSync.reload();
	done();
}

function watchFiles() {
	gulp.watch('src/**/*.html', gulp.series(html, browserSyncReload));
	gulp.watch('src/assets/**/*.scss', gulp.series(css, browserSyncReload));
	gulp.watch('src/assets/**/*.js', gulp.series(js, browserSyncReload));
	gulp.watch('src/assets/js/**/*.js', gulp.series(componentsJs, browserSyncReload));
	gulp.watch('src/assets/images/**/*.*', gulp.series(img, browserSyncReload));
	gulp.watch('src/assets/mailer/*.php', gulp.series(mailer, browserSyncReload));
	gulp.watch('src/**/*.php', gulp.series(php, browserSyncReload));

	return;
}

function del() {
	return gulp.src('html/*', { read: false }).pipe(clean());
}

exports.css = css;
exports.html = html;
exports.js = js;
exports.componentsJs = componentsJs;
exports.img = img;
exports.mailer = mailer;
exports.mailer = php;
exports.del = del;

exports.default = gulp.parallel(html, css, js, componentsJs, img, mailer, php, watchFiles, serve);
exports.build = gulp.series(del, html, css, js, componentsJs, img, mailer, php);
