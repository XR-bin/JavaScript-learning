//当前模块依赖另外一个模块

define(["add"], function(add){
    function mul(x, y){
        add.ccc();
        return x * y;
    }

    return {
        mul: mul
    }
})