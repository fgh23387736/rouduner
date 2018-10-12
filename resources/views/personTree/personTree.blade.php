<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            Organization Chart Plugin
        </title>
        <link rel="icon" href="img/logo.png">
        <link rel="stylesheet" href="/jquery_orgchart/css/font-awesome.min.css">
        <link rel="stylesheet" href="/jquery_orgchart/css/jquery.orgchart.css">
        <link rel="stylesheet" href="/jquery_orgchart/css/style.css">
        <link rel="stylesheet" href="/layui/css/layui.css">
        <style type="text/css">
            .orgchart { background: white; }
        </style>
    </head>
    
    <body>
        <div id="chart-container">
        </div>
        <script type="text/javascript" src="/jquery_orgchart/js/jquery.min.js">
        </script>
        <script type="text/javascript" src="/jquery_orgchart/js/jquery.orgchart.js">
        </script>
        <script type="text/javascript" src="/layui/layui.js"></script>
        <script type="text/javascript">
            layui.use('layer', function(){
				var layer = layui.layer;
                window.oc = undefined;
                window.datascource = {
                    'name': 'Lao Lao',
                    'title': 'general manager',
                    'id':-1,
                    'children': [{
                        'name': 'Bo Miao',
                        'title': 'department manager',
                        'id':0,
                        'ppt':'888888'
                    },
                    {
                        'name': 'Su Miao',
                        'title': 'department manager',
                        'id':1,
                        'children': [{
                            'name': 'Tie Hua',
                            'id':2,
                            'title': 'senior engineer'
                        },
                        {
                            'name': 'Hei Hei',
                            'id':3,
                            'title': 'senior engineer',
                            'children': [{
                                'name': 'Pang Pang',
                                'id':4,
                                'title': 'engineer'
                            },
                            {
                                'name': 'Dan Zai',
                                'title': 'UE engineer',
                                'id':5,
                                'children': [{
                                    'name': 'Er Dan Zai',
                                    'id':6,
                                    'title': 'Intern'
                                }]
                            }]
                        }]
                    },
                    {
                        'name': 'Hong Miao',
                        'id':7,
                        'title': 'department manager'

                    },
                    {
                        'name': 'Chun Miao',
                        'id':8,
                        'title': 'department manager'
                    }]
                };

                $.ajax({
                    type: "GET",
                    url: "/personTree/getTree",
                    data: {},
                    dataType: "json",
                    success: function(data) {
                        datascource = data;
                        if(datascource == undefined || datascource == null || datascource == ''){
                            datascource = {
                                name : '无',
                                phone : '',
                                money : '',
                                remark : '',
                                id : -1
                            }
                        }
                        setChart()
                    }
                });

                window.save = function(callback) {
                    $.ajax({
                        type: "POST",
                        url: "/personTree/setTree",
                        data: {
                            data: datascource,
                            '_token': '{{csrf_token()}}'
                        },
                        dataType: "json",
                        success: function(data) {
                            // setChart()
                            // console.log(callback)
                            
                        },
                        error: function(){
                        },
                        complete: function(){
                            if(callback != undefined){
                                callback();
                                
                            }
                            setChart();
                        }
                    });
                }

                window.closeIframe = function(index){
                    layer.close(index);
                }
                window.nodeList = {};
                window.dataList = {};
                function setChart(){
                    if(nodeList[-1] != undefined && oc != undefined){
                        oc.removeNodes(nodeList[-1]);
                    }
                    window.oc = $('#chart-container').orgchart({
                        'visibleLevel': Math.pow(10,30),
                        'pan': true,
                        'data': datascource,
                        'nodeContent': 'phone',
                        'createNode': function($node, data) {
                            nodeList[data.id] = $node;
                            dataList[data.id] = data;
                            $node.on('click',
                            function(event) {
                                layer.open({
                                  type: 2,
                                  title: data.name,
                                  closeBtn: 1, //不显示关闭按钮
                                  shade: [0],
                                  area: ['400px', '430px'],
                                  offset: 'auto', 
                                  anim: 2,
                                  content: ['/personTree/eachNode/' + data.id,'no'], //iframe的url，no代表不显示滚动条
                                  end: function(){ //此处用于演示
                                    // console.log(datascource);
                                  }
                                });
                                if (!$(event.target).is('.edge, .toggleBtn')) {
                                    var $this = $(this);
                                    var $chart = $this.closest('.orgchart');
                                }
                            });
                        }
                    });
                    
                }
                
			});
        </script>
    </body>

</html>