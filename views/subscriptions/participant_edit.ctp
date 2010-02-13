<div class="subscriptions form">
<?php echo $form->create('Subscription');?>
	<fieldset>
 		<legend><?php __('Edit Subscription');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('user_id');
		echo $form->input('event_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Subscription.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Subscription.id'))); ?></li>
		<li><?php echo $html->link(__('List Subscriptions', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Payments', true), array('controller' => 'payments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Payment', true), array('controller' => 'payments', 'action' => 'add')); ?> </li>
	</ul>
</div>