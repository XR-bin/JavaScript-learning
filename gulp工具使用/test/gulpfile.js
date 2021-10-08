/* 
    commonJS规范
    1、require() 将这个模块引入  
    2、使用这个模块上的函数
*/

const gulp = require("gulp");


//编写第一个任务
/* 
    task函数：用于创建函数
    第一个参数：任务的名字  自定义
    第二个参数：回调函数，任务执行的功能

    【注意】没有异步操作的任务需要传入一个自身回调函数结束任务
*/
// gulp.task("hello", myHello => {
//     console.log("hello world");
//     myHello();
// });



/* 
    重要的几个函数
        gulp.src()  找到源文件路径
        gulp.dest() 找到目的文件路径 【注】如果设置的这个目的文件路径不存在，会自动创建
        pipe()      理解程序运行管道
*/
gulp.task("copy-html", function(){
    return gulp.src("index.html").pipe(gulp.dest("dist/"))
    .pipe(connect.reload());
})



/* 
    2、静态文件
    拷贝图片
*/
gulp.task("images", function(){
    // return gulp.src("img/*.jpg").pipe(gulp.dest("./dist/images"));
    // return gulp.src("img/*.{jpg,png}").pipe(gulp.dest("dist/images"));

    //只拷贝了内部的文件夹，内部的图片没拷贝
    // return gulp.src("img/*/*").pipe(gulp.dest("dist/images"));
    return gulp.src("img/**/*").pipe(gulp.dest("dist/images"))
    .pipe(connect.reload());
})


/* 
    3、拷贝多个文件到一个目录中
*/
gulp.task("data", function(){
    return gulp.src(["json/*.json", "xml/*.xml", "!xml/04.xml"])
    .pipe(gulp.dest("dist/data"))
    .pipe(connect.reload());
})



/* 
    监听，如果监听到文件有改变，会自动去执行对应的任务，更新数据
*/
gulp.task("watch", function(){
    /* 
        第一个参数，是文件监听的路径
        第二个参数，我们要去执行的任务

        gulp.series：按照顺序执行
        gulp.parallel：可以并行计算
    */
    gulp.watch("index.html", gulp.series("copy-html"));
    gulp.watch("img/**/*", gulp.series("images"));
    gulp.watch(["json/*.json", "xml/*.xml", "!xml/04.xml"], gulp.series("data"));
});


//sass转css
const sass = require('gulp-sass')(require('sass'));
//压缩css  gulp-minify-css
const minifyCSS = require("gulp-minify-css");
//重命名插件 gulp-rename
const rename = require("gulp-rename");

gulp.task("Mysass", function(){
    return gulp.src("stylesheet/index.scss")
    .pipe(sass())
    .pipe(gulp.dest("dist/css"))
    .pipe(minifyCSS())
    .pipe(rename("index.min.css"))
    .pipe(gulp.dest("dist/css"))
    .pipe(connect.reload());
})


/* 
    处理js文件的插件
    gulp-concat  合并文件
    gulp-uglify  压缩.js文件
*/
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");

gulp.task("scripts", function(){
    return gulp.src("javascript/*.js")
    .pipe(concat("index.js"))
    .pipe(gulp.dest("dist/js"))
    .pipe(uglify())
    .pipe(rename("index.min.js"))
    .pipe(gulp.dest("dist/js"))
    .pipe(connect.reload());
})



/* 
    gulp-connect 启动一个服务器
*/
const connect = require("gulp-connect");
gulp.task("server", function(){
    connect.server({
        root: "dist", //设置跟目录
        port: 8888,
        livereload: true //启动实时刷新功能
    })
})



/* 
    4、一次性执行多个任务的操作

    gulp.series：按照顺序执行
    gulp.parallel：可以并行计算
*/
gulp.task("build", gulp.parallel("copy-html", "images", "data" ,"watch", "server", Myfun => {
    console.log("开始监听");
    Myfun();
}), end => {
    console.log("结束监听");
    end();
});











// 【注意】gulp4的创建任务方式已经改变，虽然旧方式还可以用，但也要了解新方式


function defaultTask(cb) {
    // place code for your default task here
    console.log("123");
    cb();
}
  
exports.my = defaultTask

//任务是defaultTask，cmd写的指令是gulp my

