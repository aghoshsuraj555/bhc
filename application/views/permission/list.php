<div class="mx-auto">
    <?php echo form_open_multipart('permission', array('id' => 'form')); ?>
    <div class="table-heading d-flex align-items-center justify-content-between p-2">
        <p class="fs-2">Permissions</p>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover table-responsive-sm">
            <thead>
                <th scope="col">Permission Name</th>
                <?php
                foreach ($roles as $role) {
                ?>
                    <th scope="col" class="text-center"><?php echo $role['name']; ?></th>
                <?php
                }
                ?>
            </thead>
            <tbody>
                <?php
                foreach ($permissions as $key => $permission) {
                ?>
                    <tr>
                        <td><?php echo $permission['name']; ?></td>
                        <?php foreach ($roles as $rolekey => $role) {
                            if ($role['id'] == 1) $checked = 'checked';
                            if ($role['id'] != 1) {
                                if (in_array($permission['id'], array_map('current', $access[$role['id']])))
                                    $checked = 'checked';
                                else
                                    $checked = '';
                            } else {
                                $checked = 'checked';
                            }
                        ?>
                            <td align="center">
                                <div class="checkbox checkbox-success m-t-0"><input type="checkbox" class="accessbox" id="role<?php echo $rolekey ?>-<?php echo $key ?>" name="roleid<?php echo $role['id']; ?>[]" <?php echo $checked ?> <?php echo ($role['id'] == 1) ? 'disabled="disabled"' : '' ?> value="<?php echo $permission['id']; ?>" /><label for="role<?php echo $rolekey ?>-<?php echo $key ?>"></label></div>
                            </td>
                        <?php
                        }
                        ?>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="table-heading d-flex align-items-center justify-content-between p-2">
        <p class="fs-2">Menu Permissions</p>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover table-responsive-sm">
            <thead>
                <th scope="col">Menu</th>
                <?php
                foreach ($roles as $role) {
                ?>
                    <th scope="col" class="text-center"><?php echo $role['name']; ?></th>
                <?php
                }
                ?>
            </thead>
            <tbody>
                <?php
                foreach ($menus as $key => $menu) {
                ?>
                    <tr>
                        <td><?php echo $menu['name']; ?></td>
                        <?php foreach ($roles as $rolekey => $role) {
                            if ($role['id'] == 1) $checked = 'checked';
                            if ($role['id'] != 1) {
                                if (in_array($menu['id'], array_map('current', $menu_access[$role['id']])))
                                    $checked = 'checked';
                                else
                                    $checked = '';
                            } else {
                                $checked = 'checked';
                            }
                        ?>
                            <td align="center">
                                <div><input type="checkbox" class="accessbox checkbox-lg" id="menurole<?php echo $rolekey ?>-<?php echo $key ?>" name="menu_roleid<?php echo $role['id']; ?>[]" <?php echo $checked ?> <?php echo ($role['id'] == 1) ? 'disabled="disabled"' : '' ?> value="<?php echo $menu['id']; ?>" /><label for="menu_role<?php echo $rolekey ?>-<?php echo $key ?>"></label></div>
                            </td>
                        <?php
                        }
                        ?>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex align-items-center justify-content-end pe-5 my-4">
        <input class="btn button-primary" type="submit" value="Submit">
    </div>
    <?php echo form_close(); ?>
</div>
