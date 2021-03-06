# echart教程

## echart是什么？ 
> 用canvas写的，通过把一些常用的图表封装起来，比如~**折线图、饼图、柱状图、地图、股票图**~等，你只要引入echart文件，然后去[官网示例](http://echarts.baidu.com/examples.html)查找你想用的图表，就可以直接使用了


## 示例

```javascript
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
<div id="container" style="width: 100%;height:600px;"></div>

<script src="public/jquery.min.js"></script>
<script src="public/echarts.min.js"></script>
<script type="text/javascript">
    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    
    // 不同的图表区别就在于option，去官网示例可以直接拷贝 - http://echarts.baidu.com/examples.html
    var option = {};

    myChart.setOption(option);




    // 以下是折线图的option，必须在setOption之前就要赋值好
    var option = {
        title: {
//            标题文本
            text: '堆叠区域图'
        },
        tooltip : {
//            通过坐标显示提示信息
            trigger: ''
        },
        legend: {
//            图表头标识  每个数据名字要与图表数据相应的name一样
            data:['邮件营销','联盟广告','视频广告','直接访问','搜索引擎']
        },
        grid: {
//            表格距离左边 右边 下边 上边的空白
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true //这个不用管,加上即可
        },
        xAxis : [
            {
                type : 'category',
//                图表X轴左右留白
                boundaryGap : false,
//                X轴值
                data : ['周一','周二','周三','周四','周五','周六','周日']
            }
        ],
        yAxis : [
            {
                type : 'value'
            }
        ],
//        图表数据数组
        series : [
            {
                name:'邮件营销',
//                显示类型是折线，还有柱形图，饼形图等等
                type:'line',
                stack: '总量',
//                折线背景区域效果
                areaStyle: {normal: {}},
                //邮件营销的数据
                data:[720, 132, 101, 134, 90, 230, 210]
            },
            {
                name:'联盟广告',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[220, 182, 191, 234, 290, 330, 310]
            },
            {
                name:'视频广告',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[150, 232, 201, 154, 190, 330, 410]
            },
            {
                name:'直接访问',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[320, 332, 301, 334, 390, 330, 320]
            },
            {
                name:'搜索引擎',
                type:'line',
                stack: '总量',
                areaStyle: {normal: {}},
                data:[820, 932, 901, 934, 1290, 1330, 1320]
            }
        ]
    };

</script>
</body>
</html>

```

