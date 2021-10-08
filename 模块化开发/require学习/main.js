console.log("加载完成");

/* 
    引入模块 遵从AMD规范
    第一个参数，必须是数组
*/

// require(["./demo/add"], function(addObj){
//     var res = addObj.outAdd(10, 20);
//     alert(res);
//     addObj.outShow();
// }) 

require.config({
    paths: {
        // 自定义模块的名字: 引入模块的路径
        add: "./demo/add",
        mul: './demo/mul'
    }
})

require(["add", "mul"], function(addObj, mul){
    var res = addObj.outAdd(10, 20);
    alert(res);
    addObj.outShow();

    alert(mul.mul(10, 20));
})