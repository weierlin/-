<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>社区首页</title>
	<!-- Bootstrap Core CSS -->
	<link href="/Template/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="/Template/css/style.css" rel='stylesheet' type='text/css' />
	<link href="/Template/css/base.css" rel='stylesheet' type='text/css' />
	
	<script src="/Template/js/jquery.min.js"></script>

	<!-- Graph CSS -->
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
			
				<!-- 面包屑 -->
				<nav class="navbar navbar-default navbar-static-top" style="margin-left: 30px;margin-top: 20px;position: relative;z-index: 1" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="/index.php">首页</a>
						</div>
						<div>
							<ul id="nav" class="nav navbar-nav">
								<li><a href="/index.php?m=admin&c=file&a=fileList">文件列表(<span style="color: #d58512;"><?php echo ($fileCount); ?></span>)</a></li>
								<li><a href="/index.php?m=admin&c=file&a=imgList">照片列表(<span style="color: #d58512;"><?php echo ($imgCount); ?></span>)</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- 面包屑结束 -->
			
			<hr size="5px">
			<!-- 内容 -->
			<div class="courst-content" style="padding: 10px;height: 540px;">
				<div class="courst-contenr-border">
					<!-- 操作 -->
					<div class="courst-operate" style="padding: 0px;margin-top: 5%;" >
						<div class="operate-item">
									<span class="input-group-btn">
										<button  id="addFile" class="btn btn-success" style="border-radius: 10%;font-size: 12px">+&nbsp;添加</button>
										<button  style="margin-left: 30px;border-radius: 10%;font-size: 12px" class="btn btn-success ">导入</button>
									</span>
						</div>
						<div class="operate-search">
							<div class="header-search" style="font-size: 12px">
								<div class="input-group col-md-8" >
									<input style="font-size: 12px;height: 31px;" type="text" name="searchContent" class="form-control"placeholder="请输入字段名" / >
									<span class="input-group-btn">
                                <button class="btn btn-primary" style="font-size: 12px;" id="searchButton">查找</button>
                            </span>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<!-- 操作结束 -->
					<div class="renwu">
						<!-- 任务列表 -->
						<div class="task">
							<div class="taskContent">
								<?php if($fileInfo != null): ?><!-- 任务一 -->
									<?php if(is_array($fileInfo)): $i = 0; $__LIST__ = $fileInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fileInfo): $mod = ($i % 2 );++$i;?><div class="taskItemContent fileListItem">
											<div class="container" style="padding:0px;" >
												<span>发送人&nbsp;<span style="font-size: 12px;color: #d58512">:&nbsp;<?php echo ($fileInfo["uploadadmin"]); ?></span></span><br>
												<a href="/index.php?m=admin&c=file&a=fileDown&id=<?php echo ($fileInfo["id"]); ?>" style="margin-left: 18%" id="task" ><?php echo ($fileInfo["filename"]); ?></a>
											</div>
											<div class="taskOperate">
												<span>time&nbsp;<span style="font-size: 12px;color: #d58512">:&nbsp;<?php echo ($fileInfo["uploadtime"]); ?></span></span>
												<?php if($_SESSION['admin']['isadmin']== 1): ?><button style="font-size: 10px;" type="button" class="btn btn-primary"
															data-toggle="button" id="fileDelBut" attr-id="<?php echo ($fileInfo["id"]); ?>">删除
													</button>
												<?php else: endif; ?>

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
	<script src="/Template/js/jquery.min.js"></script>
	<script src="/Template/js/bootstrap.min.js"></script>
	<script src="/Public/js/dialog.js"></script>
	<script src="/Public/js/dialog/layer.js"></script>
	<script src="/Public/js/admin/file/fileDel.js"></script>


	

	<!--导航条-->
	<script>
		//添加函数
		$('#addFile').on('click',function () {
			window.location.href='/index.php?m=admin&c=file&a=addFile';
		});
		//搜索函数
		$('#searchButton').on('click',function () {
			var searchContent = $('input[name="searchContent"]').val();
			//不是数字那就是名字来查
			window.location.href='/index.php?m=admin&c=search&a=file&fileName='+searchContent;
		})

		$(document).ready(function(){

			$("#nav > li a").each(function(){
				$this = $(this).parents('#nav > li');
				if(this.href==window.location.href){
					$this.addClass("active");
				}
			});
		});

	</script>

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