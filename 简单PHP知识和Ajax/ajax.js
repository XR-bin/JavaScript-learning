 /* 
  method: 传输方式   get或post
  url:  地址
  data: 数据
  success:  数据下载成功以后执行的函数
  error:    数据下载失败以后执行的函数
*/
function $ajax({method='get', url, data, success, error}){
  var xhr = null;
  try{
    xhr = new XMLHttpRequest();
  } catch(error){
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
  }
  
  if(data){
    data = queryString(data);
  }
  
  if(method === 'get' && data){
    url += '?' + data;
  }
  
  xhr.open(method, url, true);
  
  if(method === 'get'){
    xhr.send();
  } else {
    xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded")
    xhr.send(data);
  }
  
  xhr.onreadystatechange = function(){
    //readyState为4时，表示数据接收完成并解析好了
    if(xhr.readyState == 4){
      //接收到的内容
      // alert(xhr.responseText + "  " +xhr.status);
      if(xhr.status === 200){
        if(success){
          // 回调函数
          success(xhr.responseText);
        }
      }
      else{
        if(error){
          // 回调函数
          error("Error:" + xhr.status);
        }
      }
    }
  }
}

function queryString(obj){
  var str="";
  
  for(let i in obj){
    str += i + '=' + obj[i] + '&'
  }
  
  return str.substr(0, str.length-1);
}
