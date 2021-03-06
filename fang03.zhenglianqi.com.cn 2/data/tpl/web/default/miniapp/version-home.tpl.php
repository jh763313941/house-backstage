<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="welcome-container" id="js-wxapp-home-welcome" ng-controller="WxappWelcomeCtrl" ng-cloak>
	<div class="panel we7-panel wxapp-procedure <?php  if($_W['account']['type_sign'] == 'phoneapp') { ?>hidden<?php  } ?>">
		<div class="panel-body">
			<div class="procedure-top">
				<span class="title-lg"><?php  echo ACCOUNT_TYPE_NAME?></span>
				<span class="title-md">使用流程和开发简述</span>
			</div>
			<div class="procedure-diagram">
				<div class="procedure">
					<div>
						<div class="icon"><span class="wi wi-shopping-cart"></span></div>
						<div>购买<?php  echo ACCOUNT_TYPE_NAME?>应用</div>
						<div class="arrow"><span class="wi wi-step-arrows"></span></div>
					</div>
					<div>
						<div class="icon"><span class="wi wi-small-routine"></span></div>
						<div>新建<?php  echo ACCOUNT_TYPE_NAME?></div>
						<?php  if(TYPE_SIGN == WXAPP_TYPE_SIGN) { ?>
							<div><a href="<?php  echo url('wxapp/post/design_method')?>" class="color-default" target="_blank">去新建></a></div>
						<?php  } else { ?>
							<div><a href="<?php  echo url('account/create', array('sign' => TYPE_SIGN))?>" class="color-default" target="_blank">去新建></a></div>
						<?php  } ?>
						<div class="arrow"><span class="wi wi-step-arrows"></span></div>
					</div>
					<div>
						<div class="icon"><span class="wi wi-publish"></span></div>
						<div>上传版本</div>
						<div class="arrow"><span class="wi wi-step-arrows"></span></div>
					</div>
					<div>
						<div class="icon"><span class="wi wi-setting-wxapp"></span></div>
						<div><?php  echo ACCOUNT_TYPE_NAME?>设置</div>
						<div class="arrow"><span class="wi wi-step-arrows"></span></div>
					</div>
					<div>
						<div class="icon"><span class="wi wi-account"></span></div>
						<div>到<?php  echo ACCOUNT_TYPE_NAME?>提交审核</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 公告 start -->
	<div class="panel we7-panel">
		<div class="panel-heading">
			<h4>公告</h4>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active">
					<a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" >系统公告</a>
				</li>
				
				<li role="presentation" >
					<a href="#we7notice" aria-controls="we7notice" role="tab" data-toggle="tab" >微擎公告</a>
				</li>
				
			</ul>
			<a href="./index.php?c=article&a=notice-show" class="color-default more">更多</a>
		</div>
		<div class="panel-body">
			<div class="tab-content" >
				<div class="tab-pane active"  id="notice">
					<ul class="list-group notice-statistics">
						<li class="list-group-item" ng-repeat="notice in notices" ng-if="notices">
							<a ng-href="{{notice.url}}" class="text-over" target="_blank" ng-style="{'color': notice.style.color, 'font-weight': notice.style.bold ? 'bold' : 'normal'}" ng-bind="notice.title"></a>
							<span class="pull-right color-gray" ng-bind="notice.createtime"></span>
						</li>
						<div class="we7-empty-block" ng-if="!notices">
							暂无公告
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- 公告 end -->
	
	<div class="panel we7-panel">
		<div class="panel-heading">
			<h4>推荐应用</h4>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" :ng-class="{active: key == 'recommend'}" ng-click="changeTab(key)" ng-repeat="(key, item) in recommend"><a href="{{'#' + key}}" role="tab" aria-controls="{{key}}" data-type="{{key}}" data-toggle="tab" >{{item.name}}</a></li>
			</ul>
			<a href="http://s.w7.cc/" target="_blank" class="more">去市场</a>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane " :ng-class="{active: key == 'recommend'}"  id="{{key}}" ng-repeat="(key, item) in recommend">
					<div class="app-statistics">
						<div class="left-box">
							<div id="{{key + '-app-carousel'}}" class="carousel slide recommend-app-carousel" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="{{'#' + key + '-app-carousel'}}" data-slide-to="{{index}}"  ng-class="{active: index == 0}" ng-repeat="(index, ad) in item.ads"></li>
								</ol>
								<div class="carousel-inner" role="listbox">
									<div class="item advertising-box" ng-class="{active: index == 0}" ng-repeat="(index, ad) in item.ads">
										<a ng-href="{{ad.url}}" target="_blank">
											<img ng-src="{{ad.cdn_logo}}" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="go-store" ng-if="key != 'recommend' && item.ads.length == 0">
								<div class="icon">
									<img ng-src="{{'resource/images/welcome/' + item.icon + '-icon.png'}}" alt="">
								</div>
								<div class="name">
									{{item.name}}
								</div>
								<div class="title">
									网罗市场最新应用，更快了解最新应用
								</div>
								<a href="//s.w7.cc" class="btn btn-primary">去应用市场</a>
							</div>
						</div>
						<div class="right-box">
							<a ng-href="{{'//s.w7.cc/module-'+app.aid+'.html'}}" target="_blank" class="app-item" ng-repeat="app in item.list">
								<div class="app-item-box">
									<div class="info">
										<div class="logo">
											<img ng-src="{{app.cdn_logo + '?imageView2/5/w/60/h/60/format/png'}}" alt="">
										</div>
										<div class="text-over">
											<div class="name text-over" ng-bind="app.title"></div>
											<div class="time" ng-bind="'下载次数' + app.down_count" ng-if="key != 'new-app'"></div>
											<div class="time" ng-bind="'更新时间' + app.last_upgrade_time" ng-if="key == 'new-app'"></div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
<script>
	angular.module('wxApp').value('config', {
		family: "<?php  echo IMS_FAMILY?>",
		notices: <?php echo !empty($notices) ? json_encode($notices) : 'null'?>,
		'apiLink': '//api.w7.cc',
	});
	angular.bootstrap($('#js-wxapp-home-welcome'), ['wxApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>