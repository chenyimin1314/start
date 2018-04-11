# localStorage教程

## localStorage是什么？ 
> 就是html5的本地存储中的永久存储，除非把硬盘里面的那些本地存储的数据删除，不然即使重启电脑，数据都还在的

## localStorage存取值
```javascript
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script>
//基本数据类型 存值, 第一个参数是键，第二个参数是值
localStorage.setItem('a', 1);
//基本数据类型 取值
localStorage.getItem('a');

//引用数据类型 存值, 第一个参数是键，第二个参数是值
localStorage.setItem('c', JSON.stringify([1,2,3]) );
//引用数据类型 取值
try{
  JSON.parse( localStorage.getItem('c') );
}catch(e){
  console.log('json字符串格式不对，转换报错！');
}
</script>
</body>
</html>
```
