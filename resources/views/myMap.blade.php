<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
    body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
    </style>
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=eUhunS9G5GnnvbkHu3ECps57nR8l1Gkx"></script>
    <title>地图展示</title>
</head>
<body>
    <div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(118.195087,39.646809), 10);  // 初始化地图,设置中心点坐标和地图级别
    //添加地图类型控件
    map.addControl(new BMap.MapTypeControl({
        mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));     
    map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

    function addMarker(point,name){
      var marker = new BMap.Marker(point);
      map.addOverlay(marker);

    var opts = {
      position : point,    // 指定文本标注所在的地理位置
      offset   : new BMap.Size(0, 0)    //设置文本偏移量
    }
    var label = new BMap.Label(name, opts);  // 创建文本标注对象
        label.setStyle({
             color : "red",
             fontSize : "12px",
             height : "20px",
             lineHeight : "20px",
             fontFamily:"微软雅黑"
         });
    map.addOverlay(label);
    }

    var myMap = [
        {
            name : "遵化市天鑫堂大药房",
            point : "1117.985063,40.135535"
        },
        {
            name : "滦县益康药店",
            point : "118.663387,39.666077"
        },
        {
            name : "唐山博康商贸有限公司博康医药商场",
            point : "118.136812,39.636129"
        },
        {
            name : "滦县聚德堂药店",
            point : "118.351481,39.837699"
        },
        {
            name : "滦县益寿堂药店",
            point : "118.600271,39.762938"
        },
        {
            name : "唐山市路北区金海药店",
            point : "118.17947,39.638151"
        },
        {
            name : "滦县新城晨光南里社区卫生服务站",
            point : "118.704201,39.744833"
        },
        {
            name : "滦县新城万年青药店",
            point : "118.701286,39.750637"
        },
        {
            name : "迁安市送康药店",
            point : "118.717704,40.021958"
        },
        {
            name : "滦县德鑫药店",
            point : "118.713101,39.757106"
        },
        {
            name : "遵化市众康大药房",
            point : "117.97131,40.213494"
        },
        {
            name : "迁西县新集镇便民药房",
            point : "118.41601,40.097131"
        },
        {
            name : "滦县众康药店",
            point : "118.506085,39.612048"
        },
        {
            name : "遵化市地北头聚兴堂大药房",
            point : "117.986518,39.942843"
        },
        {
            name : "迁西县佳和大药房",
            point : "118.305231,40.151277"
        },
        {
            name : "滦县响堂永安堂诊所",
            point : "118.744377,39.71188"
        },
        {
            name : "唐山市路北区全行大药房",
            point : "118.128455,39.6263"
        },
        {
            name : "迁西县洒河人民大药房",
            point : "118.258298,40.332927"
        },
        {
            name : "迁西县景忠大药房",
            point : "118.304722,40.147733"
        },
        {
            name : "唐山市路南区冀东医药商场",
            point : "118.149292,39.622284"
        },
        {
            name : "遵化市礼来大药房",
            point : "117.970382,40.205796"
        },
        {
            name : "唐山市路北区保信大药房",
            point : "118.167463,39.631883"
        },
        {
            name : "唐山市路南区天顺大药房",
            point : "118.176251,39.636421"
        },
        {
            name : "遵化市圣源堂大药房",
            point : "117.976652,40.198183"
        },
        {
            name : "唐山市路北区康瑞药店",
            point : "118.178396,39.63886"
        },
        {
            name : "唐山市金象大药房",
            point : "118.310328,40.147437"
        },
        {
            name : "迁西县金康大药房",
            point : "118.322592,40.153089"
        },
        {
            name : "迁西县仁和大药房",
            point : "118.313312,40.150504"
        },
        {
            name : "唐山市路南区八方大药房",
            point : "118.132845,39.62645"
        },
        {
            name : "唐山市路南区恒星药房",
            point : "118.15015,39.618526"
        },
        {
            name : "唐山市路北区顺天大药房",
            point : "118.134088,39.620504"
        },
        {
            name : "唐山市路南区康民大药房",
            point : "118.143021,39.602794"
        },
        {
            name : "迁西县龙马大药房",
            point : "118.32022,40.146439"
        },
        {
            name : "迁安市福林堂药房",
            point : "118.814035,40.151343"
        },
        {
            name : "迁安市百草堂药房",
            point : "118.54673,40.059763"
        },
        {
            name : "迁西县罗屯镇天健大药房",
            point : "118.572886,40.187511"
        },
        {
            name : "滦县张各庄康力药房",
            point : "118.607092,39.631075"
        }
    ];

    for (var i = 0; i < myMap.length; i++) {
        
        var point = new BMap.Point(myMap[i].point.split(',')[0], myMap[i].point.split(',')[1]);
        addMarker(point,myMap[i].name);
    }
</script>

</html>
