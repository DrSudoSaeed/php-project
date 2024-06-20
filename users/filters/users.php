<!-- // The developer of this project is Saeed.
// Copying is possible with reference to the source.
// Ways of communication with Saeed :
// email: drsudosaeed@gmail.com
// telegram: @iioove
// instagram: sudosaeed -->
<?php foreach ($fil as $key => $item): ?>
        <tr>
        <th scope="row"><?= ++$key ?></th>
        <!-- ******************************************************************* -->
        <?php if($_SESSION['role'] == 'super'){ ?>
        <td>
        <?php if($item->role == "user"){ ?>
        <a id="nokhat" onclick="chengeUsername();" href="<?= $links ?>&usernames=<?= $item->username ?>"><code style="color:black;"><?= $item->username ?></code> </a>
            <?php } ?>
        </td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengeEmail();" href="<?= $links ?>&email=<?= $item->email ?>"><code><?= $item->email ?></code></a></td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengeMobile();" href="<?= $links ?>&mobile=<?= $item->mobile ?>"><code style="color:blue;"><?= $item->mobile ?></code></a></td>
        <!-- ******************************************************************* -->
        <td><a id="nokhat" onclick="chengePass();" href="<?= $links ?>&password=<?= $item->password ?>"><code><?= $item->password ?></code></a></td>
        <!-- ******************************************************************* -->
        <?php if($_SESSION['role'] == "super"){ ?>
        <!-- ******************************************************************* -->
        <td><a class="btn btn-primary"  onclick="chengeRole();" href="<?= $links ?>&usernrole=<?=$item->username?>&roleu=<?= $item->role ?>">تغییر نقش کاربر</a></td>
        <!-- ******************************************************************* -->
        <?php if($item->role == "super"){ ?>
            <td><p class='alert alert-danger'>شما نمیتوانید سوپر یوزر هارا حذف کنید</p></td>
        <?php }else{ ?>
        <td><a href="<?=$links?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a></td>
        <?php } ?>
        <?php }else{ ?>
            <td class="alert alert-primary"><p class="btn btn-danger">شما دسترسی تغییر و حذف کاربران را ندارید:(</p></td>
        <?php } ?>
    
        <?php }else{ ?>
  
            <?php if($_SESSION['role'] == "super"){ ?>
        <!-- ******************************************************************* -->
        <td><a class="btn btn-primary"  onclick="chengeRole();" href="<?= $links ?>&usernrole=<?=$item->username?>&roleu=<?= $item->role ?>">تغییر نقش کاربر</a></td>
        <!-- ******************************************************************* -->
        <?php if($item->role == "super"){ ?>
            <td><p class='alert alert-danger'>شما نمیتوانید سوپر یوزر هارا حذف کنید</p></td>
        <?php }else{ ?>
        <td><a href="<?=$links?>&delete=<?= $item->id ?>&del=ok" class="btn btn-danger">حذف</a></td>
        <?php } ?>
        <?php }else{ ?>
            <td class="alert alert-primary"><p class="btn btn-danger">شما دسترسی تغییر و حذف کاربران را ندارید:(</p></td>
        <?php } ?>
    <?php } ?>
    <?php endforeach; ?>
