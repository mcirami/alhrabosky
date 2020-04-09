var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    cssnano = require('gulp-cssnano'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    //imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    //notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    del = require('del'),
    neat = require('node-neat');

gulp.task('styles', function() {
  //return gulp.src('scss/**/*.scss')
  return sass('scss/**/*.scss', { style: 'expanded' })
    //.pipe(plugins.plumber())
    //.pipe(sass())
    .on('error', function(err) {
      gutil.log(err);
      this.emit('end');
    })
    
    .pipe(autoprefixer(
      {
        browsers: [
          '> 1%',
                    'last 2 versions',
                    'firefox >= 4',
                    'safari 7',
                    'safari 8',
                    'IE 8',
                    'IE 9',
                    'IE 10',
                    'IE 11'
        ],
        cascade: false
      }
    ))
    .pipe(gulp.dest('css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('css'))
    .pipe(livereload())
    //.pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
  return gulp.src('js/main.js')
   // .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(concat('built.js'))
    .pipe(gulp.dest('js'))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(livereload())
   // .pipe(notify({ message: 'Scripts task complete' }));
});
/*
gulp.task('images', function() {
  return gulp.src('images/*')
    .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
    .pipe(gulp.dest('images'))
    .pipe(livereload())
   // .pipe(notify({ message: 'Images task complete' }));
});
*/
gulp.task('php', function() {
  return gulp.src('*.php')
  .pipe(gulp.dest(''))
  .pipe(livereload())
 // .pipe(notify({ message: 'PHP task complete' }));
});

gulp.task('html', function() {
  return gulp.src('*.html')
  .pipe(gulp.dest(''))
  .pipe(livereload())
 // .pipe(notify({ message: 'HTML task complete' }));
});

gulp.task('clean', function() {
   // return del(['css', 'js', 'images']);
    return del(['css', 'js']);
});

gulp.task('clear', function (done) {
  return cache.clearAll(done);
});

gulp.task('default', function() {
   // gulp.start('styles', 'scripts', 'images');
    gulp.start('styles', 'scripts');
});

gulp.task('watch', function() {

  // Create LiveReload server
  livereload.listen();

  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('js/*.js', ['scripts']);
  //gulp.watch('images/*', ['images']);
  gulp.watch('*.html', ['html']);
  gulp.watch('*.php', ['php']);
  
});

