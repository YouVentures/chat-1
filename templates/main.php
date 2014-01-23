<?php 
\OCP\Util::addStyle('chat', 'main');
\OCP\Util::addScript('chat', 'vendor/angular/angular.min');
\OCP\Util::addScript('chat', 'classes');
\OCP\Util::addScript('chat', 'main');
\OCP\Util::addScript('chat', 'handlers');
?>
<div ng-controller="ConvController" ng-app="myApp" id="chat-wrapper">
	<div id="loading-panel" class="panel">
		<div id="loading-panel-img">
			&nbsp;
		</div>
	</div>
	<div id="empty-panel" class="panel">
		Start Chatting!<br>
		<button id="empty-panel-new-conv" ng-click="newConv()">New Conversation</button>
	</div>
	<div id="chat-panel" class="panel">
		<ul id="app-navigation" >
			<li ng-click="newConv()">
				New Conversation</li>
			</li>
			<li ng-click="makeActive(conv.id)" ng-repeat="conv in convs" class="conv-list-item" id="conv-list-{{ conv.id }}">
				{{ conv.name }} <span id="conv-new-msg-{{ conv.id }}" class="conv-new-msg">&nbsp;</span>
			</li>
		</ul>
		<div id="chat-window">
			<header id="chat-window-header">
				<button class="header-right" ng-click="invite()" id="chat-invite">Add Person</button>
				<button class="header-right" ng-click="leave()" id="chat-leave">Leave </button>
			</header>
			<section ng-click="focusMsgInput()" id="chat-window-body">
				<div id="chat-window-msgs">
					<div class="chat-msg-container" ng-repeat="msg in convs[activeConv].msgs">
						<div class="chat-msg-time">
							{{ msg.time.hours }} : {{ msg.time.minutes }}
						</div>
						<div class="chat-msg-{{ msg.align }}">
							<div class="icon-{{ msg.user }}">
							</div>
							<p>
								{{ msg.msg }}										
							</p>
						</div>
					</div>
				</div>
			</section>
			<footer id="chat-window-footer">
				<form ng-submit="sendChatMsg()"> 
					<input ng-focus="" ng-blur="" ng-model="chatMsg" autocomplete="off" type="text" id="chat-msg-input" placeholder="Chat message">
					<input id="chat-msg-send" type="submit"  value="Send" />
				</form>
			</footer>
		</div>
	</div>
</div>
