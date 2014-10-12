<div ng-if="view.elements.chat" >
	<section ng-click="focusMsgInput()" id="chat-window-body">
		<div id="chat-window-msgs">
			<div
				class="chat-msg-container"
				ng-repeat="(key, msg) in convs[active.conv].msgs | orderBy:'timestamp'"
				ng-class="{'chat-msg-container-border': $parent.convs[active.conv].msgs[key-1].contact.id !== msg.contact.id}"
			>
				<div
					ng-if="$parent.convs[active.conv].msgs[key-1].contact.id !== msg.contact.id"
					class="chat-msg-time"
				>
					{{ msg.time.hours }} : {{ msg.time.minutes }}
				</div>
				<div class="chat-msg">
					<div
						class="msg-avatar-container"
					>
						<div
							ng-if="$parent.convs[active.conv].msgs[key-1].contact.id !== msg.contact.id"
							data-size="40"
							data-id="{{ msg.contact.id }}"
							isonline="{{ $parent.$parent.contactsObj[msg.contact.id].online }}"
							data-displayname="{{ msg.contact.displayname }}"
							data-addressbook-backend="{{ msg.contact.address_book_backend }}"
							data-addressbook-id="{{ msg.contact.address_book_id  }}"
							avatar
							online
                            tipsy
                            title="{{ msg.contact.displayname }}"
						>
						</div>
						<div>
							<!--
							This is a place holder div for the green dot which is used to indicate the online status of the contact
							-->
							&nbsp;
						</div>
					</div>
					<p class="chat-msg-msg" ng-bind-html="msg.msg | enhanceText">
						&nbsp;
					</p>
				</div>
			</div>
		</div>
	</section>
	<footer id="chat-window-footer">
		<form id="chat-msg-form" ng-submit="sendChatMsg()">
			<img
				ng-click="view.showEmojiPopover()"
				src=" <?php echo \OCP\Util::imagePath('chat', 'emoji/smile.png'); ?>"
				class="chat-msg-emoji-button emoji-no-hide"
				>
			<div class="chat-msg-send-button" >
				<button  type="submit"><div class="icon-play">&nbsp;</div></button>
			</div>
			<div id="chat-msg-input">
				<textarea  id="chat-msg-input-field" autocomplete="off" ng-model="fields.chatMsg"  ng-enter="sendChatMsg()" placeholder="<?php p($l->t('Chat Message')); ?>"></textarea>
			</div>
		</form>
	</footer>
	<div ng-if="view.elements.emojiContainer" id="emoji-container" class="emoji-no-hide">
		<div
			id="emoji-container-search"
            class="emoji-no-hide"
		>
			<input placeholder="Search" id="emoji-search" type="text" class="emoji-no-hide" ng-model="emojiSearch">
		</div>
		<ul id="emoji-list" class="emoji-no-hide">
			<li ng-click="addEmoji(emoji.name)" ng-repeat="emoji in emojis | filter:emojiSearch" class="emoji-no-hide">
				<img title="{{ emoji.name }}" src="{{ emoji.url }}" class="ec-emoji emoji-no-hide"">
			</li>
		</ul>
	</div>
</div>