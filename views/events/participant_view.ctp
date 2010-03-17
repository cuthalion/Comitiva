<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Listar Eventos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('Inscrever neste evento', true), array('controller' => 'subscriptions', 'action' => 'add',$event['Event']['id'])); ?> </li>
	</ul>
</div>
<div class="events view">
<h2><?php  __('Evento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Inscritos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['subscription_count']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Macro Evento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($event['ParentEvent']['title'], array('controller' => 'events', 'action' => 'view', $event['ParentEvent']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gratuito'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $event['Event']['free'] == TRUE ? __('Sim') : __('Não'); ?>
			&nbsp;
		</dd>
	</dl>
	
	<?php if (!empty($event['EventDate'])):?>
	<br />
	<div class="related">
		<h3><?php __('Datas');?></h3>
		
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php __('Legenda'); ?></th>
			<th><?php __('Data'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($event['EventDate'] as $eventDate):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $eventDate['desc'];?></td>
				<td><?php echo $this->Formatacao->dataHora($eventDate['date']);?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
	
	<?php if (!empty($event['EventPrice'])):?>
	<br />
	<div class="related">
		<h3><?php __('Valores');?></h3>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php __('Valor'); ?></th>
			<th><?php __('Data inicial'); ?></th>
			<th><?php __('Data final'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($event['EventPrice'] as $eventPrice):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $this->Formatacao->moeda($eventPrice['price']);?></td>
				<td><?php echo $this->Formatacao->dataHora($eventPrice['start_date']);?></td>
				<td><?php echo $this->Formatacao->dataHora($eventPrice['final_date']);?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
	
	<?php if (!empty($event['ChildEvent'])):?>
	<br />
	<div class="related">
		<h3><?php __('Sub-eventos');?></h3>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php __('Nome'); ?></th>
			<th><?php __('Descrição'); ?></th>
			<th><?php __('Gratuito'); ?></th>
			<th class="actions"><?php __('Ações');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($event['ChildEvent'] as $childEvent):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $childEvent['title'];?></td>
				<td><?php echo $childEvent['description'];?></td>
				<td><?php $childEvent['free'] == TRUE ? __('Sim') : __('Não');?></td>
				<td class="actions">
					<?php echo $html->link(__('Inscrever-se', true), array('controller' => 'subscriptions', 'action' => 'add', $childEvent['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
	<?php endif; ?>
</div>