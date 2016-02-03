<?php if (!defined('THINK_PATH')) exit();?><div id="class-list-cover">
  <div>加载中...</div>
</div>
<table class='table' id="class-table">
  <thead>
    <tr>
      <th>#</th>
      <th>班级名</th>
      <th>班主任</th>
      <th>入学时间</th>
      <th class='actions'>
        操作
      </th>
    </tr>
  </thead>
  <tbody>
  <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
      <td><?php echo ($vo['id']); ?></td>
      <td><?php echo ($vo['classname']); ?></td>
      <td><?php echo ($vo['headmaster']); ?></td>
      <td><?php echo ($vo['attendan']); ?></td>
      <td class='action'>
<!--         <a class='btn btn-success' data-toggle='tooltip' href='#' title='Zoom'>
          <i class='icon-zoom-in'></i>
        </a> -->
        <a class='btn btn-info' href='#' onclick="showChangeModal(<?php echo ($vo['id']); ?>,this)" classname="<?php echo ($vo['classname']); ?>" 
            headmaster="<?php echo ($vo['headmaster']); ?>" attendan="<?php echo ($vo['attendandate_id']); ?>">
          <i class='icon-edit'></i>
        </a>
        <a class='btn btn-danger' href='#' onclick="showDeleteModal(<?php echo ($vo['id']); ?>)">
          <i class='icon-trash'></i>
        </a>
      </td>
    </tr><?php endforeach; endif; ?>
  </tbody>
</table>
<div class='panel-footer'>
  <ul class='pagination pagination-sm'>
    <li>
      <a href='#' onclick="Load(<?php echo ($page-1); ?>)">«</a>
    </li>

    <?php $pagingIsLoaded = false; if($page <= 4){ $pagestart = 1; $pageend = $pagecount < 8 ? $pagecount + 1 : 9; }else if($page >= $pagecount - 4){ $pagestart = $pagecount - 7; $pageend = $pagecount + 1; }else{ $pagestart = $page - 4; $pageend = $page + 4; } ?>

    <?php $__FOR_START_170364995__=$pagestart;$__FOR_END_170364995__=$pageend;for($i=$__FOR_START_170364995__;$i < $__FOR_END_170364995__;$i+=1){ ?><li <?php echo $page==$i?"class='active'":'';?>>
        <a href='#' onclick="Load(<?php echo ($i); ?>)"><?php echo ($i); ?></a>
      </li><?php } ?>

    <li>
      <a href='#' onclick="Load(<?php echo ($page+1); ?>)">»</a>
    </li>

  </ul>
  <div class='pull-right'>
    当前展示的是 <?php echo ($page); ?> 页，共 <?php echo ($pagecount); ?> 页
  </div>
</div>
<script type="text/javascript">setRecords(<?php echo ($records); ?>)</script>