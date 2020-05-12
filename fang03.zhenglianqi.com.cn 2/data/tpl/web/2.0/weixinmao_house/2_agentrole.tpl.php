<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agentrole',array('op' =>'display'))?>">经纪人入驻套餐列表</a></li>
	<li<?php  if(empty($toplist['id']) && $operation == 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agentrole',array('op' =>'post'))?>">添加经纪人入驻套餐</a></li>
	<?php  if(!empty($toplist['id']) &&  $operation == 'post') { ?><li  class="active"><a href="<?php  echo $this->createWebUrl('agentrole',array('op' =>'post','id'=>$adv['id']))?>">编辑企业套餐</a></li><?php  } ?>
</ul>

<?php  if($operation == 'display') { ?>






<div class="main">
	<div class="panel panel-info">
	<div class="panel-heading">（将所有经纪人数据同步到指定等级，请谨慎操作）</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
			<input type="hidden" name="m" value="weixinmao_house" />
			<input type="hidden" name="do" value="agentrole" />
			<input type="hidden" name="op" value="updaterole" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
				<div class="col-xs-8 col-sm-8 col-lg-9">
<select class="form-control tpl-category-parent we7-select" id="roleid" name="roleid">
				<option value="0">请选择同步等级</option>
				<?php  if($list ) { ?>
				<?php  if(is_array($list)) { foreach($list as $vo) { ?>
				<option value="<?php  echo $vo['id'];?>"><?php  echo $vo['title'];?></option>
				<?php  } } ?>
				<?php  } ?>
				
			</select>					
				</div>
					<div class="col-xs-4 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 同步所有经纪人</button>
				</div>
			</div>
		
		</form>
	</div>
</div>




<div class="main panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">ID</th>
					<th>级别</th>	
					 <th>标题</th>				
					<th>金额</th>
					<th>有效天数</th>
					<th>发布租房数</th>
					<th>发布二手房数</th>
					<th>入驻初始化</th>
					<th>显示</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $vo) { ?>
				<tr>
					<td><?php  echo $vo['id'];?></td>
					<td><?php  echo $vo['sort'];?></td>
					<td><?php  echo $vo['title'];?></td>
					<td><?php  echo $vo['money'];?></td>
					<td><?php  echo $vo['days'];?></td>
					<td><?php  echo $vo['lethousenum'];?></td>
					<td><?php  echo $vo['oldhousenum'];?></td>
					<td><?php  if($vo['isinit']==1) { ?>
								<span class='label label-success'>是</span>
								<?php  } else { ?>
								<span class='label label-danger'>否</span>
								<?php  } ?></td>
					<td><?php  if($vo['enabled']==1) { ?>
								<span class='label label-success'>是</span>
								<?php  } else { ?>
								<span class='label label-danger'>否</span>
								<?php  } ?></td>
					<td style="text-align:left;">
						<a href="<?php  echo $this->createWebUrl('agentrole', array('op' => 'post', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('agentrole', array('op' => 'delete', 'id' => $vo['id']))?>"class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
		<?php  echo $pager;?>
	</div>
</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php  } else if($operation == 'post') { ?>

<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
		<input type="hidden" name="id" value="<?php  echo $toplist['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				经纪人入驻套餐设置
			</div>
			<div class="panel-body">
					<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>级别</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="sort" class="form-control" value="<?php  echo $toplist['sort'];?>" />数字越大级别越高
					</div>
				</div>

					<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>标题</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='title' name="title" class="form-control" value="<?php  echo $toplist['title'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>金额</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='money' name="money" class="form-control" value="<?php  echo $toplist['money'];?>" />
					</div>
				</div>
					<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>发布出租房数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='lethousenum' name="lethousenum" class="form-control" value="<?php  echo $toplist['lethousenum'];?>" />
					</div>
				</div>
					<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>发布二手房数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='oldhousenum' name="oldhousenum" class="form-control" value="<?php  echo $toplist['oldhousenum'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>有效天数</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='days' name="days" class="form-control" value="<?php  echo $toplist['days'];?>" />
					</div>
				</div>
			
			
			  <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否初始化</label>
					<div class="col-sm-9 col-xs-12">
						<label class='radio-inline'>
							<input type='radio' name='isinit' value=1' <?php  if($toplist['isinit']==1) { ?>checked<?php  } ?> /> 是
						</label>
						<label class='radio-inline'>
							<input type='radio' name='isinit' value=0' <?php  if($toplist['isinit']==0) { ?>checked<?php  } ?> /> 否
						</label>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否显示</label>
					<div class="col-sm-9 col-xs-12">
						<label class='radio-inline'>
							<input type='radio' name='enabled' value=1' <?php  if($toplist['enabled']==1) { ?>checked<?php  } ?> /> 是
						</label>
						<label class='radio-inline'>
							<input type='radio' name='enabled' value=0' <?php  if($toplist['enabled']==0) { ?>checked<?php  } ?> /> 否
						</label>
					</div>
				</div>
			</div>
		</div>
<div class="form-group col-sm-12">
	<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
	</form>
</div>

<script language='javascript'>
	function formcheck() {
		if ($("#title").isEmpty()) {
			Tip.focus("title", "请填写标题!");
			return false;
		}
		if ($("#money").isEmpty()) {
			Tip.focus("money", "请填写金额!");
			return false;
		}
		if($("#days").isEmpty() )
			{
			   Tip.focus("days", "请填写次数");
				return false;
			}
		return true;
	}
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>