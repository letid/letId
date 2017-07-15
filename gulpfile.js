/**
* gulp sass
* gulp script
* gulp test
* gulp watch
*/
//DEFAULT
var path=require('path'),Argv=require('minimist')(process.argv);
//COMMON PACKAGE
var fs=require('fs-extra'),clc=require('cli-color'),extend=require('node.extend');
//REQUIRE PACKAGE
var gulp=require('gulp'),sass=require('gulp-sass'),minifyCss=require('gulp-minify-css'),uglify=require('gulp-uglify'),concat=require('gulp-concat'),include=require('gulp-include');
// REQUIRE DATA
var Package=JSON.parse(fs.readFileSync('package.json'));
// GULP
// var rootDevelopment=Package.config.common.development.root;
// var rootAssets=path.join(rootDevelopment,Package.config.common.development.assets);
// var App=Package.config.app;
var configAssetRoot=Package.config.common.asset.root;
var configPublicRoot=Package.config.common.public.root;
var configDevelopmentRoot=Package.config.common.development.root;
// var rootAssets=path.join(rootDevelopment,Package.config.common.development.assets);

// var config=function() {
//     if (Argv.app) {
//         return Package.config.app.indexOf(Argv.app);
//     }
// }
var rootAssets=path.join(configAssetRoot,Argv.app), rootAsset=path.join(rootAssets,configDevelopmentRoot);

var rootDevelopments=path.join(configAssetRoot,Argv.app), rootDevelopment=path.join(rootDevelopments,configDevelopmentRoot);
// var rootDevelopment='app/lethil/resource', rootAssets='app/lethil/resource';
/*
AssetSASS:{
  debugInfo: true,
  lineNumbers: false,
  errLogToConsole: true,
  // sourceComments: "normal",//normal, map
  outputStyle: "compact"//compact, compressed, expanded
},
AssetJS:{
  //mangle:false,
  output:{
    beautify: true, 
    comments:"license"
  },
  compress:true,
  //outSourceMap: true,
  preserveComments:"license"
},
*/
// NOTE: SASS
gulp.task('sass', function () {
  return gulp
    .src(path.join(rootAsset,'sass','*([^A-Z0-9-]).scss'))//!([^A-Z0-9-])
    .pipe(sass(
        {
            debugInfo: true,
            lineNumbers: true,
            errLogToConsole: true,
            //sourceComments: 'map',//normal, map
            outputStyle: 'expanded'//compressed, expanded
        }
    ).on('error', sass.logError))
    .pipe(gulp.dest(path.join(rootDevelopment,'css')));
});
// NOTE: SCRIPT
gulp.task('script',function(){
    gulp.src(path.join(rootAsset,'javascript','*([^A-Z0-9-]).js'))
    //.pipe(concat('all.min.js'))
    .pipe(include().on('error', console.log))
    .pipe(uglify({
        //mangle:false,
        output:{
            beautify: true,
            comments:'license'
        },
        compress:false,
        //outSourceMap: true,
        preserveComments:'license'
    }).on('error', console.log))
    .pipe(gulp.dest(path.join(rootDevelopment,'js')));
});
// NOTE: WATCH
gulp.task('watch', function() {
    gulp.watch(path.join(rootAsset,'sass','*.scss'), ['sass']);
    gulp.watch(path.join(rootAsset,'javascript','*.js'), ['script']);
});
// NOTE: TASK
gulp.task('default', ['watch']);
