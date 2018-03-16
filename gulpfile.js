const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const plumber = require('gulp-plumber');
const gutil = require('gulp-util');
const jshint = require('gulp-jshint');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const autoprefixer = require('gulp-autoprefixer');
require('es6-promise').polyfill();
const rtlcss = require('gulp-rtlcss');
const rename = require('gulp-rename');
const imageMin = require('gulp-imagemin');
const inject = require('gulp-inject');
const cache = require('gulp-cache');

var onError = function (err) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

// Move Bootstrap CSS to dist/css
gulp.task('boots', function(){
  return gulp.src('node_modules/bootstrap/dist/css/bootstrap.min.css')
    .pipe(gulp.dest("./dist/css"));
});

// Move Fonts Folder to /fonts
gulp.task('fonts', function(){
  return gulp.src('node_modules/font-awesome/fonts/*')
    .pipe(gulp.dest("./fonts"));
});

// Move Font Awesome CSS to dist/css
gulp.task('fa', function(){
  return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
    .pipe(gulp.dest("./dist/css"));
});

// Move particles.js to src/js
gulp.task('particles', function(){
  return gulp.src('node_modules/particles.js/particles.js')
    .pipe(gulp.dest("./src/js"));
});

// Move Lightbox js to src/js
gulp.task('ekkojs', function(){
  return gulp.src('node_modules/ekko-lightbox/dist/ekko-lightbox.min.js')
    .pipe(gulp.dest("./src/js"));
});

// Move Lightbox css to dist/css
gulp.task('ekkocss', function(){
  return gulp.src('node_modules/ekko-lightbox/dist/ekko-lightbox.css')
    .pipe(gulp.dest("./dist/css"));
});

// Move JS Files to src/js
gulp.task('js', function(){
  return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js','node_modules/jquery/dist/jquery.min.js','node_modules/popper.js/dist/umd/popper.min.js'])
    .pipe(gulp.dest("./src/js"))
    .pipe(browserSync.stream());
});

// Compile Sass & Inject Into Browser
gulp.task('sass', function() {
  return gulp.src('./sass/**/*.scss')
   .pipe(plumber({ errorHandler: onError }))
  .pipe(sass())
  .pipe(autoprefixer())
  .pipe(gulp.dest('./'))

  .pipe(rtlcss())
  .pipe(rename({ basename: 'rtl' }))
  .pipe(gulp.dest('./'));
});

gulp.task('watch', function(){
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'http://localhost',
  });
  gulp.watch('./sass/**/*.scss', ['sass'])
  gulp.watch('./js/*.js', ['js', reload]);
  gulp.watch('images/src/*', ['images', reload]);
 });

// Optimize Images and move to /dist/images
gulp.task('imageMin', () =>
   gulp.src('src/images/*')
   .pipe(cache(imagemin({
      optimizationLevel: 5,
      progressive: true,
      interlaced: true
   })))
   .pipe(gulp.dest('dist/images'))
);

gulp.task('default', ['sass', 'watch']);
