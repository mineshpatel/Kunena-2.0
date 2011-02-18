<?php
/**
 * @version $Id: default.php 4211 2011-01-16 15:09:56Z xillibit $
 * KunenaLatest Module
 * @package Kunena latest
 *
 * @Copyright (C) 2010-2011 www.kunena.org. All rights reserved
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 */
defined ( '_JEXEC' ) or die ( '' );
?>
<?php
if ( $this->params->get ( 'sh_topiciconoravatar' ) == 1 ) : ?>
<li class="klatest-avatar">
	<?php
	$user = KunenaFactory::getUser ( ( int ) $this->message->userid );
	echo CKunenaLink::GetProfileLink ( $user->userid, $user->getAvatarLink ( '', $this->params->get ( 'avatarwidth' ), $this->params->get ( 'avatarheight' ) ) );
	?>
</li>
<?php elseif ( $this->params->get ( 'sh_topiciconoravatar' ) == 0 ) : ?>
<li class="klatest-topicicon">
	<?php echo CKunenaLink::GetThreadPageLink ( 'view', $this->topic->category_id, $this->topic->id, $this->message_position, intval($this->config->messages_per_page), $this->topicIcon($this->topic), $this->message->id ) ?>
</li>
<?php endif; ?>

<li class="klatest-subject">
	<?php
	if ($this->topic_ordering == 'ASC') {
		echo CKunenaLink::GetThreadPageLink ( 'view', $this->topic->category_id, $this->topic->id, $this->pages*$this->config->messages_per_page, intval($this->config->messages_per_page), $this->escape ( JString::substr ( $this->message->subject, '0', $this->params->get ( 'titlelength' ) ) ), $this->message->id );
	} else {
		echo CKunenaLink::GetThreadPageLink ( 'view', $this->topic->category_id, $this->topic->id, 0, intval($this->config->messages_per_page), $this->escape ( JString::substr ( $this->message->subject, '0', $this->params->get ( 'titlelength' ) ) ), $this->message->id );
	}
	if ($this->topic->unread) {
		echo '<sup class="knewchar">(' . JText::_($this->params->get ( 'unreadindicator' )) . ')</sup>';
	}
	if ($this->params->get ( 'sh_sticky' ) && $this->topic->ordering) {
		echo $this->getIcon ( 'ktopicsticky', JText::_('MOD_KUNENALATEST_STICKY_TOPIC') );
	}
	if ($this->params->get ( 'sh_locked' ) && $this->topic->locked) {
		echo $this->getIcon ( 'ktopiclocked', JText::_('COM_KUNENA_GEN_LOCKED_TOPIC') );
	}
	if ($this->params->get ( 'sh_favorite' ) && $this->topic->getUserTopic()->favorite) {
		echo $this->getIcon ( 'kfavoritestar', JText::_('COM_KUNENA_FAVORITE') );
	}
	?>
</li>
<?php if ($this->params->get ( 'sh_firstcontentcharacter' )) : ?>
<li class="klatest-preview-content"><?php echo KunenaHtmlParser::stripBBCode($this->message->message, $this->params->get ( 'lengthcontentcharacters' )); ?></li>
<?php endif; ?>
<?php if ($this->params->get ( 'sh_category' )) : ?>
<li class="klatest-cat"><?php echo JText::_ ( 'MOD_KUNENALATEST_IN_CATEGORY' ).' '.CKunenaLink::GetCategoryLink ( 'showcat', $this->category->id, $this->escape ( $this->category->name ) ); ?></li>
<?php endif; ?>
<?php if ($this->params->get ( 'sh_author' )) : ?>
<li class="klatest-author"><?php echo JText::_ ( 'MOD_KUNENALATEST_POSTED_BY' ) .' '. CKunenaLink::GetProfileLink ( $this->message->userid, $this->escape ( $this->message->name ) ); ?></li>
<?php endif; ?>
<?php if ($this->params->get ( 'sh_time' )) : ?>
<li class="klatest-posttime"><?php $override = $this->params->get ( 'dateformat' ); echo CKunenaTimeformat::showDate($this->message->time, $override ? $override : 'config_post_dateformat');?></li>
<?php endif; ?>