/* 
    遵从AMD规范
*/
define(function() {
    function add(x,y){
        return x + y;
    }
    function show(){
        console.log("hello world");
    }
    function ccc(){
        console.log("在mul中要去使用的函数")
    }

    // 对外暴露
    return {
        outAdd: add,
        outShow: show,
        ccc: ccc
    }
});