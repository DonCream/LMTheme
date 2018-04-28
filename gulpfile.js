const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const plumber = require('gulp-plumber');
const gutil = require('gulp-util');
const jshint = require('gulp-jshint');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const cssnano = require('gulp-cssnano');
const rtlcss = require('gulp-rtlcss');
const rename = require('gulp-rename');
const imageMin = require('gulp-imagemin');
const inject = require('gulp-inject');
const cache = require('gulp-cache');
const groupmq = require('gulp-group-css-media-queries');
const purify = require('gulp-purify-css');
require('es6-promise').polyfill();

var onError = function(err) {
    console.log('An error occurred:', gutil.colors.yellow(err.message));
    gutil.beep();
    this.emit('end');
  },
  reload = browserSync.reload;

// Move Waypoints to ./src/js folder
gulp.task('ways', function() {
  return gulp.src('node_modules/waypoints/shortcuts/jquery.waypoints.min.js')
    .pipe(gulp.dest("./src/js"));
});

// Concat and minify js files and move to /dist/js
gulp.task('js', function() {
  return gulp.src('./src/js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(concat('app.js'))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./dist/js'))
    .pipe(browserSync.stream());
});

// Optimize Images and move to /dist/images
gulp.task('imageMin', function() {
  gulp.src('./src/img/*')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(cache(imageMin({
      optimizationLevel: 5,
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest('./images'))
    .pipe(browserSync.stream());
});

// Remove unused css
gulp.task('purify', function() {
  return gulp.src('src/*.css')
    .pipe(purify(['src/*.js', 'src/*.html']))
    .pipe(gulp.dest('./dist/'));
});

// Minify css and create sourcemaps
gulp.task('min', function() {
  return gulp.src('style.css')
    .pipe(sourcemaps.init())
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('src'));
});

// Compile Sass & Inject Into Browser
gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
    .pipe(plumber({
      errorHandler: onError
    }))
    .pipe(sass({
      indentType: 'tab',
      indentWidth: 1,
      outputStyle: 'expanded',
    }))
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false,
      })
    ]))
    .pipe(groupmq())
    .pipe(gulp.dest('./'))
    .pipe(rtlcss())
    .pipe(rename({
      basename: 'rtl'
    }))
    .pipe(gulp.dest('./'));
});

// Watch Sass & Server
gulp.task('serve', ['sass'], function() {
  browserSync.init({
    server: "~/Websites/Ubuntu-Server/www/webjelly"
  });

  gulp.watch(['./src/*.html'], ['sass']).on('change', reload);
  gulp.watch(['./sass/**/*.scss'], ['sass']).on('change', reload);
  gulp.watch(['./src/js/*.js'], ['js']).on('change', reload);
  gulp.watch(['images/src/*'], ['imageMin']).on('change', reload);
  gulp.watch(['/*.php'], ['sass']).on('change', reload);
});

gulp.task('start', ['boots', 'fonts']);
