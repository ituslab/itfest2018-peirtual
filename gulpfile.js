const
  gulp = require('gulp'),
  concat = require('gulp-concat'),
  order = require('gulp-order'),
  plumber = require('gulp-plumber'),
  sass = require('gulp-sass'),
  uglify = require('gulp-uglify'),
  cssMinify = require('gulp-csso');

gulp.task('sass', () => {
  gulp.src('src/sass/main.scss')
  .pipe(plumber())
  .pipe(sass())
  .pipe(cssMinify())
  .pipe(gulp.dest('assets/css'))
});

gulp.task('js', () => {
  gulp.src('src/js/**/*.js')
  .pipe(plumber())
	.pipe(order([
		"src/js/**/*.js"
	], { base: './' }))
  .pipe(concat('main.js'))
  .pipe(uglify()) // {mangle: true}
  .pipe(gulp.dest('assets/js/'));
});

gulp.task('watch', () => {
  gulp.watch('src/sass/**/*.scss', ['sass']);
  gulp.watch('src/js/**/*.js', ['js']);
});

gulp.task('build', [
  'sass',
  'js'
]);

gulp.task('default', ['watch']);
