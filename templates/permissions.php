<h1>Permission Manager</h1>
<from id="customPermissionForm">
    <?php
        $users = get_users();
        foreach ($users as $user){
            if($user->roles[0] != 'administrator') {
                ?> <p> <?php echo $user->user_nicename; ?>
                    <input type="checkbox" name="<?php echo $user->user_nicename; ?>" <?php if(user_can($user,'format-text-capability')) echo 'checked'?>>
                </p>
                <?php
            }
        }
    ?>
    <input type="button" value="Update Permissions" onclick="updatePermissions()">
</from>