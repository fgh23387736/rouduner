<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/layui/css/layui.css">
</head>
<body style="padding: 10px;">
	<form class="layui-form layui-form-pane" action="" lay-filter="example">
  <div class="layui-form-item">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-inline">
      <input type="text" name="name" lay-verify="required" placeholder="姓名" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">手机</label>
    <div class="layui-input-inline">
      <input type="number" name="phone"  lay-verify="" placeholder="手机" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">金额</label>
    <div class="layui-input-inline">
      <input type="number" name="money"  lay-verify="" placeholder="金额" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea" name="remark" ></textarea>
    </div>
  </div>
  <div class="layui-form-item ">
  	<div class="layui-btn-container">
	  	<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="add-left" id="addleft">增加节点</button>
	    <button class="layui-btn" lay-submit="" lay-filter="save">保存</button>
	    <button class="layui-btn layui-btn-danger" lay-submit="" lay-filter="delete">删除</button>
	    <!-- <button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="add-right" id="addright">增加右节点</button> -->
	</div>
  </div>
</form>
          
</body>
</html>
<script type="text/javascript" src="/layui/layui.js"></script>
<script type="text/javascript">
	layui.use(['layer','form'],function () {
		var layer = layui.layer,
		form = layui.form,
		$ = layui.jquery;
		var nodeId = {{ $id }}
		var theData = parent.datascource
		var dataList = parent.dataList
		var nowNode = getTheNodeById(theData,nodeId);
		var windowIndex = parent.layer.getFrameIndex(window.name); //获取窗口索引

		//监听提交
		form.on('submit(add-left)', function(data){
			if(isLeft){
				if(nowNode.children == undefined){
					nowNode.children = [];
				}
				if(nowNode.children[0] == undefined || nowNode.children[0] == null){
					nowNode.children[0] = {
						name : '无',
						phone : '',
						money : '',
						remark : '',
						id : getId()
					}
				}
				nowNode.children[1] = {
					name : '无',
					phone : '',
					money : '',
					remark : '',
					id : getId()
				};
				parent.save(closeThisIframe());
			}
			return false;
		});
		form.on('submit(save)', function(data){
			nowNode.name = data.field.name;
			nowNode.phone = data.field.phone;
			nowNode.money = data.field.money;
			nowNode.remark = data.field.remark;
			parent.save(closeThisIframe());
			return false;
		});
		form.on('submit(delete)', function(data){
			layer.confirm('删除后其下所有节点都将会被删除，确定删除？', {
			  	btn: ['确定','取消'] //按钮
			}, function(){
			  	nowNode.children = []
				nowNode.name = '无'
				nowNode.phone = ''
				nowNode.money = ''
				nowNode.remark = ''
				parent.save(closeThisIframe());
			}, function(){
			  
			});
			return false;
		});
		form.on('submit(add-right)', function(data){
			if(isRight){
				if(nowNode.children == undefined){
					nowNode.children = [];
				}
				if(nowNode.children[0] == undefined || nowNode.children[0] == null){
					nowNode.children[0] = {
						name : '无',
						phone : '',
						money : '',
						remark : '',
						id : getId()
					}
				}
				nowNode.children[1] = {
					name : '无',
					phone : '',
					money : '',
					remark : '',
					id : getId()
				};
				parent.save(closeThisIframe());
				}
			
			return false;
		});
		function getId(){
			return (new Date().getTime()) * 1000 + Math.floor(Math.random() * 1001);
		}
		function closeThisIframe(){
			parent.layer.close(windowIndex);
		}
		function getTheNodeById(node,id){
			if(node.id == id){
				return node;
			}else{
				if(node.children != undefined){
					for (var i = node.children.length - 1; i >= 0; i--) {
						var theNode = getTheNodeById(node.children[i],id);
						if(theNode != undefined){
							return theNode;
						}
					}
					return undefined;
				}else{
					return undefined;
				}
			}
		}
		var isLeft = true;
		var isRight = true;
		function init(){
			//表单初始赋值
			// console.log(theData)
			isLeft = true;
			isRight = true;
			if(nowNode != undefined){
				form.val('example', {
					"name": nowNode.name // "name": "value"
					,"phone": nowNode.phone
					,"money": nowNode.money
					,"remark": nowNode.remark //复选框选中状态
				})
			}

			if(nowNode.children != undefined){
				if(nowNode.children.length > 0){
					$('#addleft').addClass("layui-btn-disabled");
					isLeft = false;
					if(nowNode.children.length > 1){
						$('#addright').addClass("layui-btn-disabled");
						isRight = false;
					}
				}
			}
			
		}

		init();
	});
</script>