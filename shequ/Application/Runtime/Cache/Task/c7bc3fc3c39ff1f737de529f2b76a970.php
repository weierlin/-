<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>任务列表</title></title>
	<!-- Bootstrap Core CSS -->
	<link href="/Template/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="/Template/css/style.css" rel='stylesheet' type='text/css' />
	<link href="/Template/css/base.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<!-- //lined-icons -->
	<script src="/Template/js/jquery-1.10.2.min.js"></script>
	<style type="text/css">
		.modal-dialog-box{
			width: 1000px;
			height: 100%;
		}
		.pagination{
			padding: 0;
			margin: 0;
		}
	</style>
</head>
<body style="font-size: 12px;">
<div class="page-container" style="min-width: 80%;">
	<!--/content-inner-->
	<div class="left-content">
		<div class="inner-content">
			<!-- header-starts -->
			<div class="header-section">
				<!-- top_bg -->
				<div class="top_bg">
					<div class="header_top">
						<div class="top_right">
							<ul>
								<li><a href="">联系电话：17720743412</a></li>|
								<li><a class="mouse-a" data-toggle="modal" data-target="#help">帮助</a></li>|
								<li><a href="/index.php?m=home&c=login&a=logout">退出</a></li>
							</ul>
						</div>
						<div class="top_left">
							<input type="hidden" id="isAdmin" value="<?php echo ($_SESSION['admin']['isadmin']); ?>">
							<span style="color: white;cursor: pointer" class="glyphicon glyphicon-bell" onclick="javascript:location.href='/index.php?m=task&c=list&a=index' "></span>
							<?php if($taskCount == 0): else: ?>
								<sup style="color: red"><?php echo ($taskCount); ?></sup><?php endif; ?>
							<span style="color: white;margin-left: 15px;cursor: pointer;font-size: 14px" onclick="javascript:location.href='/index.php?m=admin&c=information&a=index&id=<?php echo ($_SESSION['admin']['id']); ?>'">个人中心</span>
						</div>
						<div class="clearfix"> </div>
					</div>

				</div>
			</div>

			<div class="clearfix"></div>

					
    <nav class="navbar navbar-default navbar-static-top" style="margin-left: 30px;margin-top: 20px;position: relative;z-index: 1" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index.php">首页</a>
            </div>
            <div>
                <ul class="nav navbar-nav">

                    <?php if($_SESSION['admin']['isadmin']== 1): ?><li><a href="/index.php?m=task&c=list&a=verify">待审核(<span style="color: #d58512;"><?php echo ($verifyCount); ?></span>)</a></li>
                    <?php else: ?>
                        <li><a href="/index.php?m=task&c=list&a=index">未读任务(<span style="color: #d58512;"><?php echo ($indexCount); ?></span>)</a></li>
                        <li class="active"><a href="/index.php?m=task&c=list&a=completing">待处理(<span style="color: #d58512;"><?php echo ($completingCount); ?></span>)</a></li><?php endif; ?>
                    <li><a href="/index.php?m=task&c=list&a=register">登记事件(<span style="color: #d58512;"><?php echo ($registerCount); ?></span>)</a></li>
                    <li><a href="/index.php?m=task&c=list&a=completed">已经完成(<span style="color: #d58512;"><?php echo ($completedCount); ?></span>)</a></li>
                </ul>
            </div>
        </div>
    </nav>

			<!-- 头部结束 -->

			<hr size="5px">
			
    <!-- 内容 -->
    <div class="courst-content" style="padding: 10px;height: 540px;">
        <div class="courst-contenr-border">
            <div class="renwu">
                <!-- 任务列表 -->
                <div class="task">
                    <div class="taskTitle">
                        待处理列表
                    </div>
                    <div class="taskContent">
                        <hr>
                        <?php if($taskInfo != null): ?><!-- 任务一 -->
                            <?php if(is_array($taskInfo)): $i = 0; $__LIST__ = $taskInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$taskInfo): $mod = ($i % 2 );++$i;?><div class="taskItemContent">
                                    <div class="container" style="cursor: pointer;padding:5px;" onclick="javascript:location.href='/index.php?m=task&c=information&a=index&id=<?php echo ($taskInfo["id"]); ?>'" >
                                        <span>编号&nbsp;：&nbsp;<?php echo ($taskInfo["id"]); ?></span><br>
                                        <input type="hidden" id="receiveId" value="<?php echo ($taskInfo["id"]); ?>">
                                        <span style="margin-left: 80px;" id="task" ><?php echo (getEventType($taskInfo["eventtype"])); ?></span>
                                    </div>
                                    <div class="taskOperate">
                                        <span><?php echo ($taskInfo["starttime"]); ?></span>
                                    </div>
                                </div>
                                <hr><?php endforeach; endif; else: echo "" ;endif; ?>

                            <!-- 分页 -->
                            <div class="page">
                                <ul class="pagination">
                                    <?php echo ($pageRes); ?>
                                </ul>
                            </div>
                            <!-- 分页结束 -->
                    </div>
                </div>
                <!-- 任务列表结束 -->
                <?php else: ?>
                没有记录<?php endif; ?>
            </div>
        </div>
    </div>
    <!-- 内容结束 -->
    <div style="margin-top: 20px;">

    </div>


			<!-- 内容结束 -->


			<!-- <!-- 帮助（Modal） -->
			<div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								&times;
							</button>
							<h4 class="modal-title" id="myModalLabel" style="text-align: center">
								帮助中心
							</h4>
						</div>
						<div class="modal-body" style="text-align: center">
							关于该软件，必须配置有flash的插件，最好是用当下流行的浏览器，谷歌，火狐等，尽量不要使用ie
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭
							</button>
						</div>
					</div><!-- /.modal-content
    </div><!-- /.modal -->
					<!-- </div> -->
					<!--帮助结束-->
				</div>
			</div>
		</div>


		<!-- 左边菜单 -->
		<div class="sidebar-menu" style="min-width: 14%;">
			<div class="menu">
				<ul id="menu" >
					<li><a><span class="glyphicon glyphicon-asterisk"></span>&nbsp;<span>菜单管理</span></a></li>

					<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<span>添加信息</span> <span class="fa fa-angle-right" style="float: right">&gt;</span></a>

					</li>

					<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;<span> 人员</span> <span class="fa fa-angle-right" style="float: right">&gt;</span></a>

					</li>

					<li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;<span> 房屋</span><span class="fa fa-angle-right" style="float: right">&gt;</span></a>

					</li>

					<li><a href="#"><span class="glyphicon glyphicon-plane"></span>&nbsp;<span>车辆</span><span class="fa fa-angle-right" style="float: right">&gt;</span></a>

					</li>

					<li><a href="#"><span class="glyphicon glyphicon-envelope"></span>&nbsp;<span>任务</span><span class="fa fa-angle-right" style="float: right">&gt;</span></a>

					</li>

			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!-- Bootstrap Core JavaScript -->
	<script src="/Template/js/bootstrap.min.js"></script>
	<script src="/Public/js/dialog/layer.js"></script>
	<script src="/Public/js/dialog.js"></script>

	

	<script type="text/javascript">
		<!--定时向后台访问，看有没有未读或者未处理事件-->
		var num = Math.round(Math.random()*90+60);
		//循环执行，每隔60-150秒钟执行一次showMsgIcon()
		window.setInterval(taskTip, 5000*num);
		function taskTip(){
			$isAdmin = $('#isAdmin').val();
			postData={
				'isAdmin':$isAdmin,
			}
			url = '/index.php?m=home&c=index&a=task';
			$.post(url,postData,function (result) {
				if(result.status == 0){
					window.location.reload();
				}else if(result.status == 1){
					layer.open({
						content : result.message,
						icon : 1,
						yes : function(){
							clearInterval(taskTip);
							location.href='/index.php?m=task&c=list&a=index';
						},
					});
				}else if(result.status == 2){
					layer.open({
						content : result.message,
						icon : 1,
						yes : function(){
							clearInterval(taskTip);
							location.href='/index.php?m=task&c=list&a=completing';
						},
					});
				}
				else if(result.status == 3){
					layer.open({
						content : result.message,
						icon : 1,
						yes : function(){
							clearInterval(taskTip);
							location.href='/index.php?m=task&c=list&a=verify';
						},
					});
				}
			},"JSON");
		}

	</script>
</body>
</html>