let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');
let concat = require('gulp-concat');
let uglify = require('gulp-uglify');
let hash = require('gulp-hash-filename');


const cssLogin = [
    "resources/assets/login-pro/bootstrap/css/bootstrap.min.css",
    "resources/assets/login-pro/dist/css/AdminLTE.min.css",
    "plugins/iCheck/square/blue.css",
]

const jsLogin = [
    "resources/assets/login-pro/bootstrap/js/bootstrap.min.js",
    "resources/assets/login-pro/plugins/jQuery/jquery-2.2.3.min.js",
    "resources/assets/login-pro/plugins/iCheck/icheck.min.js"
]

const cssList = [
    // Theme
    "resources/assets/css/login.css",
]

const cssAdminList = [
    "resources/assets/css/admin/bootstrap.css",
    "resources/assets/css/admin/style.css",
    "resources/assets/css/admin/animate.css",
    "resources/assets/css/font-awesome/css/font-awesome.css",
    "resources/assets/css/admin/plugins/dataTables/datatables.min.css",
]

const jsList = [
    // Jquery and Dependencies
    "resources/assets/js/jquery-1.11.3.min.js",
    "resources/assets/js/jquery.watermark.min.js",
]

const jsAdminList = [
    // Jquery and Dependencies
    "resources/assets/js/admin-js/jquery-3.1.1.min.js",
    "resources/assets/js/admin-js/bootstrap.js",
    "resources/assets/js/admin-js/plugins/metisMenu/jquery.metisMenu.js",
    "resources/assets/js/admin-js/plugins/slimscroll/jquery.slimscroll.js",
    "resources/assets/js/admin-js/inspinia.js",
    "resources/assets/js/admin-js/plugins/pace/pace.min",
    "resources/assets/js/admin-js/plugins/dataTables/datatables.min.js",
    "resources/assets/js/admin-js/jquery.mask.min.js",
]

const resources = [
    "resources/assets/img/",
    "resources/assets/fonts/",
    "resources/assets/css/patterns",
    "resources/assets/patterns"
]

const webAssetsDir = 'public/build/'

gulp.task('cssLogin', function () {
    gulp.src(cssLogin)
        .pipe(concat('login.css'))
        .pipe(cleanCSS({debug: true}))
        .pipe(gulp.dest(webAssetsDir+'css/'))
})

gulp.task('buildCssAdmin', function () {
    gulp.src(cssAdminList)
        .pipe(concat('sea-admin.css'))
        .pipe(cleanCSS({debug: true}))
        .pipe(gulp.dest(webAssetsDir+'css/'))
})

gulp.task('jsLogin', function () {
    gulp.src(jsLogin)
        .pipe(concat('login.js'))
        .pipe(uglify())
        .pipe(gulp.dest(webAssetsDir+'js/'))
})

gulp.task('buildJsAdmin', function () {
    gulp.src(jsAdminList)
        .pipe(concat('sea-admin.js'))
        .pipe(uglify())
        .pipe(gulp.dest(webAssetsDir+'js/'))
})

gulp.task('copyResources', function () {
    resources.forEach(function (res) {
        gulp.src(res+'**/*')
            .pipe(gulp.dest(webAssetsDir+res.split("/")[2]))
    })
})

gulp.task('default', ['cssLogin', 'jsLogin','buildCssAdmin', 'buildJsAdmin','copyResources'])