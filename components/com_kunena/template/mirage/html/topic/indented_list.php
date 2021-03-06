<?php
/**
 * Kunena Component
 * @package Kunena.Template.Mirage
 * @subpackage Topic
 *
 * @copyright (C) 2008 - 2012 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<div class="kmodule topic-indented_list">
	<div class="kbox-wrapper kbox-full">
		<div class="topic-indented_list-kbox kbox kbox-color kbox-border kbox-border_radius kbox-border_radius-vchild kbox-shadow kbox-animate">
			<div class="headerbox-wrapper box-full">
				<div class="header">
				<!-- a href="#" title="Topic RSS Feed"><span class="krss-icon">Topic RSS Feed</span></a -->
				<!-- a href="#" title="View Subscribers of this Topic" class="ktopic-subsc">4 Subscribers</a -->
					<h2 class="header"><?php echo JText::_('COM_KUNENA_TOPIC') ?> <a href="#" rel="ktopic-detailsbox"><?php echo $this->displayTopicField('subject') ?></a></h2>
					<?php if ( $this->config->keywords ) : ?>
						<ul class="list-unstyled topic-taglist">
							<?php if (!empty($this->keywords)) : ?>
								<li class="topic-taglist-title"><?php echo JText::sprintf('COM_KUNENA_TOPIC_TAGS', $this->keywords) ?></li>
							<?php else: ?>
								<li class="topic-taglist-title"><?php echo JText::_('COM_KUNENA_TOPIC_NO_TAGS') ?></li>
							<?php endif ?>
							<?php if ( $this->me->userid == $this->topic->first_post_userid || $this->me->isModerator($this->topic->getCategory()) ): ?><li class="topic-taglist-edit"><a href="#" id="edit_keywords" class="link"><?php echo JText::_('COM_KUNENA_TOPIC_TAGS_ADD_EDIT') ?></a></li><?php endif ?>
						</ul>
					<?php endif ?>
				</div>
			</div>
			<?php echo $this->displayTopicActions(); ?>
			<div class="innerbox-wrapper innerspacer">
				<?php echo $this->getPagination(4); ?>
			</div>
			<div class="innerbox-wrapper kbox-full">
				<div class="topic_indented-detailsbox detailsbox">
					<ul class="list-unstyled topic-posts">
						<?php $this->displayMessages(); ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
