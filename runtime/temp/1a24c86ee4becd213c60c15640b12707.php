<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:50:"./themes/default/member/order_backend\history.html";i:1618966408;}*/ ?>
<?php if (isset($error)) { ?>
<div class="alert alert-error">
	<?php echo $error; ?>
</div>
<?php } if (isset($success)) { ?>
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<?php echo $success; ?>
</div>
<?php } ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <td class="left"><b>生成日期</b></td>
      <td class="left"><b>订单附言</b></td>
      <td class="left"><b>状态</b></td>
      <td class="left"><b>通知会员</b></td>
    </tr>
  </thead>
  <tbody>
    <?php if ($histories) { foreach ($histories as $history) { ?>
    <tr>
      <td class="left"><?php echo $history['date_added']; ?></td>
      <td class="left"><?php echo $history['comment']; ?></td>
      <td class="left"><?php echo $history['status']; ?></td>
      <td class="left"><?php echo $history['notify']; ?></td>
    </tr>
    <?php } } else { ?>
    <tr>
      <td class="center" colspan="20">没有记录</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

