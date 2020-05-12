<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li <?php  if($operation == 'display') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'display'))?>">经纪人列表</a></li>
  	<li <?php  if($operation == 'agent_setting') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'agent_setting'))?>">佣金比例设置</a></li>
    <li <?php  if($operation == 'agent_team') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'agent_team'))?>">经纪人团队管理</a></li>
	<li <?php  if($operation == 'agent_guest') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'agent_guest'))?>">经纪人客户管理</a></li>



	
	<li<?php  if(empty($area['id']) && $operation == 'post') { ?> class="active" <?php  } ?>><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'post'))?>">添加经纪人</a></li>


	<?php  if(!empty($agent['id']) &&  $operation == 'post') { ?><li  class="active"><a href="<?php  echo $this->createWebUrl('agent',array('op' =>'post','id'=>$agent['id']))?>">编辑经纪人</a></li><?php  } ?>
</ul>

<?php  if($operation == 'display') { ?>
<div class="main panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">ID</th>
					<th>排序</th>	
                  <th>套餐</th>	
					<th>城市</th>					
					<th>姓名</th>
					<th>电话</th>
					<th>微信</th>
                  	<th>公司</th>
					<th>二手房</th>
					<th>出租房</th>
				
					<th>创建时间</th>
					<th>状态</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $vo) { ?>
				<tr>
					<td><?php  echo $vo['id'];?></td>
					<td><?php  echo $vo['sort'];?></td>
                  <td><span class="label label-success"><?php  echo $vo['agentrolename'];?></span></td>
					<td><?php  echo $vo['cityname'];?></td>
					<td><?php  echo $vo['name'];?></td>
					<td><?php  echo $vo['tel'];?></td>
					<td><?php  echo $vo['qq'];?></td>
                  <td><?php  echo $vo['companyname'];?></td>
					<td><?php  echo $vo['oldhousecount'];?></td>
					<td><?php  echo $vo['lethousecount'];?></td>
		
					<td><?php  echo date('Y-m-d',$vo['createtime']);?></td>
					<td> <?php  if($vo['enabled'] == 1) { ?> <span class="label label-success">审核通过</span><?php  } else { ?> <span class="label label-danger">待审核</span><?php  } ?></td>
					<td style="text-align:left;">
                      	<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'editagent', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改套餐">修改套餐</a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'post', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'delete', 'id' => $vo['id']))?>"class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
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


<?php  } else if($operation == 'agent_team') { ?>

<div class="main panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">ID</th>
                  <th>团队人数</th>	
					<th>城市</th>					
					<th>姓名</th>
					<th>电话</th>
					<th>QQ</th>
                  	<th>公司</th>

				
					<th>创建时间</th>
					<th>状态</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $vo) { ?>
				<tr>
					<td><?php  echo $vo['id'];?></td>
                  <td><span class="label label-success"><?php  echo $vo['mark'];?></span></td>
					<td><?php  echo $vo['cityname'];?></td>
					<td><?php  echo $vo['name'];?></td>
					<td><?php  echo $vo['tel'];?></td>
					<td><?php  echo $vo['qq'];?></td>
                  <td><?php  echo $vo['companyname'];?></td>
		
		
					<td><?php  echo date('Y-m-d',$vo['createtime']);?></td>
					<td> <?php  if($vo['enabled'] == 1) { ?> <span class="label label-success">审核通过</span><?php  } else { ?> <span class="label label-danger">待审核</span><?php  } ?></td>
					<td style="text-align:left;">
                      	<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'editagent', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改套餐">修改套餐</a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'post', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'delete', 'id' => $vo['id']))?>"class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
              		
              
              		
              <?php  if(is_array($vo['teamlist'])) { foreach($vo['teamlist'] as $v) { ?>
										
              
              						<tr>
					<td>---------</td>
					<td></td>
                  <td><span class="label label-success"><?php  echo $vo['agentrolename'];?></span></td>
					<td><?php  echo $vo['cityname'];?></td>
					<td><?php  echo $vo['name'];?></td>
					<td><?php  echo $vo['tel'];?></td>
					<td><?php  echo $vo['qq'];?></td>
                  <td><?php  echo $vo['companyname'];?></td>
		
		
					<td><?php  echo date('Y-m-d',$vo['createtime']);?></td>
					<td> <?php  if($vo['enabled'] == 1) { ?> <span class="label label-success">审核通过</span><?php  } else { ?> <span class="label label-danger">待审核</span><?php  } ?></td>
					<td style="text-align:left;">
                      	<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'editagent', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改套餐">修改套餐</a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'post', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'delete', 'id' => $vo['id']))?>"class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
              
              
										
							<?php  } } ?>
              
              		
              
              
              
              
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


<?php  } else if($operation == 'agent_guest') { ?>


<div class="main panel panel-default">
	<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">ID</th>
        				
					<th>姓名</th>
					<th>电话</th>
				
					<th>预约房源</th>
					<th>所属经纪人</th>
				
					<th>创建时间</th>
					<th >操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $vo) { ?>
				<tr>
					<td><?php  echo $vo['id'];?></td>
					<td><?php  echo $vo['name'];?></td>
					<td><?php  echo $vo['tel'];?></td>
					<td><span class="label label-success"><?php  echo $vo['houseplan'];?></span><?php  echo $vo['title'];?></td>
                 	<td><?php  echo $vo['agentname'];?></td>
		
					<td><?php  echo date('Y-m-d',$vo['createtime']);?></td>
					<td style="text-align:left;">
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'post', 'id' => $vo['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="修改"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('agent', array('op' => 'delete', 'id' => $vo['id']))?>"class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="删除"><i class="fa fa-times"></i></a>
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
<?php  } else if($operation == 'editagent') { ?>



<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1" onsubmit='return formcheck2()'>

 
 

<div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>套餐列表</label>
	<div class="col-sm-8 col-xs-12">
		<select class="form-control tpl-category-parent we7-select" id="agentroleid" name="agentroleid" >
					
					<option value="0">请选择套餐</option>
						<?php  if(is_array($agentrolelist)) { foreach($agentrolelist as $vo) { ?>
				<option value="<?php  echo $vo['id'];?>" ><?php  echo $vo['title'];?></option>
				<?php  } } ?>
				

				</select>
	</div>
</div>

      
      
 

<input type="hidden" name="id" id="id" value="<?php  echo $id;?>"/>
<div class="form-group">


			<input type="submit" name="submit" value="立即修改" class="btn btn-primary col-lg-1" style="margin-left:300px;" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
</form>
</div>

<?php  } else if($operation == 'agent_setting') { ?>

<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
		<input type="hidden" name="id" value="<?php  echo $agent['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				佣金比例设置
			</div>
			<div class="panel-body">
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>佣金占比</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='rate4' name="rate4" class="form-control" value="<?php  echo $agent['rate4'];?>" />
					</div>
				</div>
			

              
              <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>分销一级比例</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='rate1' name="rate1" class="form-control" value="<?php  echo $agent['rate1'];?>" />
					</div>
				</div>
              
              <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>分销二级比例</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='rate2' name="rate2" class="form-control" value="<?php  echo $agent['rate2'];?>" />
					</div>
				</div>
              
                  <div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>分销三级比例</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='rate3' name="rate3" class="form-control" value="<?php  echo $agent['rate3'];?>" />
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
	

	
		return true;
	}
</script>


<?php  } else if($operation == 'post') { ?>

<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit='return formcheck()'>
		<input type="hidden" name="id" value="<?php  echo $agent['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				经纪人设置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="sort" class="form-control" value="<?php  echo $agent['sort'];?>" />
					</div>
				</div>
              
              <div class="form-group">
	
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>所属城市</label>
	<div class="col-sm-8 col-xs-12">
		<select class="form-control tpl-category-parent we7-select" id="cityid" name="cityid">
				<option value="0">请选择所属城市</option>
					<?php  if(is_array($citylist)) { foreach($citylist as $vo) { ?>
				<option value="<?php  echo $vo['id'];?>" <?php  if($agent['cityid'] == $vo['id']) { ?> selected <?php  } ?>><?php  echo $vo['name'];?></option>
				<?php  } } ?>
				
				
			</select>
	</div>
</div>
              
              
                           <div class="form-group">
	
		<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>关联楼盘</label>
	<div class="col-sm-8 col-xs-12">
		<select class="form-control tpl-category-parent we7-select" id="houseid" name="houseid">
				<option value="0">请选择关联楼盘</option>
					<?php  if(is_array($newhouselist)) { foreach($newhouselist as $vo) { ?>
				<option value="<?php  echo $vo['id'];?>" <?php  if($agent['houseid'] == $vo['id']) { ?> selected <?php  } ?>><?php  echo $vo['housename'];?></option>
				<?php  } } ?>
				
				
			</select>
	</div>
</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>姓名</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='name' name="name" class="form-control" value="<?php  echo $agent['name'];?>" />
					</div>
				</div>
				<div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>照片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('thumb', $agent['thumb'])?>
                    </div>
                </div>
                 <div class="form-group">
	<label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
	<div class="col-sm-9 col-xs-12">
		<textarea cols="70" rows="8" name="intro" id="intro"><?php  echo $agent['intro'];?></textarea>

	</div>
</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>电话</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='tel' name="tel" class="form-control" value="<?php  echo $agent['tel'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>qq</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='qq' name="qq" class="form-control" value="<?php  echo $agent['qq'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>中介地址</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id='address' name="address" class="form-control" value="<?php  echo $agent['address'];?>" />
					</div>
				</div>
			<!--
			    <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style="color:red">*</span>详情</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_ueditor('content', $agent['content'])?>
                    </div>
                </div>
               -->
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否审核通过</label>
					<div class="col-sm-9 col-xs-12">
						<label class='radio-inline'>
							<input type='radio' name='enabled' value=1' <?php  if($agent['enabled']==1) { ?>checked<?php  } ?> /> 是
						</label>
						<label class='radio-inline'>
							<input type='radio' name='enabled' value=0' <?php  if($agent['enabled']==0) { ?>checked<?php  } ?> /> 否
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
	
		if ($("#name").val()=='') {
			util.message("请输入姓名");
			return false;
		}
		
		if ($("#tel").val()=='') {
		    util.message("请输入手机号");
			return false;
		}
	

		return true;
	}
</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>