    // @ts-nocheck
    const gulp        = require('gulp');
    const browserSync = require('browser-sync').create();
    const sass        = require('gulp-sass');
 
    

    
    gulp.task('default', ['browser-sync'], function () {
      gulp.watch(['public/*.html'], reload);
    });
    gulp.task('sass', function() {
        return gulp.src(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'])
            .pipe(sass())
            .pipe(gulp.dest("src/public/css"))
            .pipe(browserSync.stream());
    });
    
    // Move JS Files to src/js
    gulp.task('js', function() {
        return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js', 'node_modules/jquery/dist/jquery.min.js','node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/ekko-lightbox/dist/ekko-lightbox.min.js','node_modules/scrollreveal/dist/*.js','node_modules/slick-carousel/slick/slick.min.js'])
            .pipe(gulp.dest("src/public/js"))
            .pipe(browserSync.stream());
    });
    
    
    // Watch Sass & Serve
    gulp.task('serve', ['sass'], function() {
    
        browserSync.init({
            server: "./src"  
        });
    
        gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', 'src/scss/*.scss'], ['sass']);
        gulp.watch("src/*.html").on('change', browserSync.reload);
    });
    
    // Move Fonts to src/fonts
    gulp.task('fonts', function() {
      return gulp.src('node_modules/font-awesome/fonts/*')
        .pipe(gulp.dest('src/public/fonts'))
    })
    
    // Move Font Awesome CSS to src/css
    gulp.task('fa', function() {
      return gulp.src('node_modules/font-awesome/css/font-awesome.min.css')
        .pipe(gulp.dest('src/public/css'))
    })
    //lightbox css
    gulp.task('light', function() {
        return gulp.src('node_modules/ekko-lightbox/dist/ekko-lightbox.css')
          .pipe(gulp.dest('src/public/css'))
      })


    gulp.task('default', ['js','serve', 'fa', 'fonts', 'light']);

  