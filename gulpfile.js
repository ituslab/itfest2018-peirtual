const
  gulp = require('gulp'),
  babel = require('gulp-babel'),
  jsMinify = require('gulp-babel-minify'),
  concat = require('gulp-concat'),
  order = require('gulp-order'),
  plumber = require('gulp-plumber'),
  gsass = require('gulp-sass'),
  cssMinify = require('gulp-csso'),
  del = require('del');

const app = {
  sass: {
    src: 'src/sass/main.scss',
    path: 'src/sass/**/*.scss',
    dest: 'assets/css/'
  },
  script: {
    src: 'src/js/**/*.js',
    dest: 'assets/js/',
    order: [
      "src/js/jquery/jquery.min.js",
      "src/js/materialize/materialize.min.js",
      "src/js/aos/aos.js",
      "src/js/**/*.js"
    ]
  }
}

const clean = () => {
  return del([
    'assets/js/',
  ]);
};

const sass = () => {
  return gulp.src(app.sass.src)
  .pipe(plumber())
  .pipe(gsass())
  .pipe(cssMinify())
  .pipe(gulp.dest(app.sass.dest))
};

const script = () => {
  return gulp.src(app.script.src)
  .pipe(babel())
  .pipe(plumber())
	.pipe(order(app.script.order, { base: './' }))
  .pipe(concat('main.js'))
  .pipe(jsMinify({
    mangle: {
      keepClassName: true
    }
  }))
  .pipe(gulp.dest(app.script.dest));
};

const watch = () => {
  build();
  gulp.watch(app.sass.path, sass);
  gulp.watch(app.script.src, script);
}

const build = gulp.series(clean, gulp.parallel(sass, script));

gulp.task('build', build)
gulp.task('default', watch);
